<?php

namespace app\core\models\dao;

use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;
use Sabberworm\CSS\Value\Value;

final class SaleDao extends BaseDao implements InterfaceDao{    //cambiar los datos por los que estaran en la tabla de ventas en la BD

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "ventas_detalle");
    }

    public function load(int $id): array{

        $sql = "SELECT vd.id,
        v.numero_venta,
        v.cliente,
        v.fecha,
        v.forma_pago,
        vd.codigo_producto,
        vd.cantidad,
        vd.precio_unitario,
        vd.total
        FROM {$this->table} AS vd
        INNER JOIN ventas AS v ON vd.venta_id = v.id
        WHERE vd.id = :id";

        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute(["id" => $id])){
            throw new \Exception("No se pudo encontrar la VENTA con el id:". $id);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function save(array $data): void {
        
        $this->validateNumeroVenta($data['numero_venta']);

        $this->validateCliente($data['razon_social']);

        $this->validateProducto($data['codigo_producto']);

        // Insertar en la tabla 'ventas'
        $sqlVenta = "INSERT INTO ventas VALUES(DEFAULT, :numero_venta, NOW(), :razon_social, :forma_pago)";
        
        $stmtVenta = $this->conn->prepare($sqlVenta);
        
        // Ejecutamos pasando el array completo. PDO ignorará los campos sobrantes que no estén en el SQL.
        $stmtVenta->execute([
            "numero_venta"        => $data['numero_venta'],
            "razon_social"        => $data['razon_social'],
            "forma_pago"          => $data['forma_pago'],
        ]);

        // Recuperamos el ID autogenerado de la venta que se acaba de crear
        $idNuevaVenta = $this->conn->lastInsertId();

        // Insertar en la tabla 'ventas_detalle'
        $sqlDetalle = "INSERT INTO {$this->table} VALUES(DEFAULT, :venta_id, :codigo_producto, :cantidad, :precio_unitario, :total)";

        $stmtDetalle = $this->conn->prepare($sqlDetalle);
        
        // Mapeamos los datos necesarios para el detalle, inyectando el ID de la venta obtenido
        $stmtDetalle->execute([
            "venta_id"        => $idNuevaVenta,
            "codigo_producto" => $data['codigo_producto'],
            "cantidad"        => $data['cantidad'],
            "precio_unitario" => $data['precio_unitario'],
            "total"        => $data['total']
        ]);
    }

    public function update(array $data): void {

        // Actualizar la tabla 'ventas_detalle'
        // Buscamos el ID del producto por su código y recalculamos el subtotal (total)
        //"INSERT INTO {$this->table} VALUES(DEFAULT, :venta_id, :codigo_producto, :cantidad, :precio_unitario, :total)";
        $sqlDetalle = "UPDATE {$this->table} SET 
        venta_id = (SELECT id FROM ventas WHERE numero_venta = :numero_venta LIMIT 1),
        codigo_producto = :codigo_producto,
        cantidad = :cantidad,
        precio_unitario = :precio_unitario,
        total = :total
        WHERE id = :id";

        $stmtDetalle = $this->conn->prepare($sqlDetalle);
        $stmtDetalle->execute([
            "id"              => $data['id'],
            "numero_venta"    => $data['numero_venta'],
            "codigo_producto" => $data['codigo_producto'],
            "cantidad"        => $data['cantidad'],
            "precio_unitario" => $data['precio_unitario'],
            "total"           => $data['total']
        ]);

        // Actualizar la tabla 'ventas' (Cabecera)
        // Usamos una subconsulta para encontrar qué venta está asociada a este detalle_id
        $sqlVenta = "UPDATE ventas SET 
        numero_venta = :numero_venta,
        forma_pago = :forma_pago,
        cliente = :cliente
        WHERE id = (SELECT id FROM ventas WHERE numero_venta = :numero_venta LIMIT 1)";

        $stmtVenta = $this->conn->prepare($sqlVenta);
        
        // Pasamos el array $data completo. PDO mapeará los marcadores correspondientes.
        $stmtVenta->execute([
            "numero_venta"    => $data['numero_venta'],
            "forma_pago"      => $data['forma_pago'],
            "cliente"         => $data['razon_social']
        ]);
    }


    public function delete(int $id): void{
        // Obtener el venta_id antes de borrar el detalle
        $sqlBuscarVenta = "SELECT venta_id FROM ventas_detalle WHERE id = :id";
        $stmtBuscar = $this->conn->prepare($sqlBuscarVenta);
        $stmtBuscar->execute(["id" => $id]);
        $detalle = $stmtBuscar->fetch(\PDO::FETCH_ASSOC);

        // Si el detalle no existe, no hay nada que borrar
        if (!$detalle) {
            throw new \Exception("No se encontró el detalle de venta con el ID: " . $id);
        }

        $idVenta = $detalle['venta_id'];

        // Borrar el elemento de la tabla 'ventas_detalle'
        $sqlDeleteDetalle = "DELETE FROM ventas_detalle WHERE id = :id";
        $stmtDeleteDetalle = $this->conn->prepare($sqlDeleteDetalle);
        if(!$stmtDeleteDetalle->execute(["id" => $id])){
            throw new \Exception("No se pudo encontrar Detalle_venta con el id:". $id);
        };

        // Borrar el elemento de la tabla 'ventas' usando el ID recuperado
        // Nota de lógica de negocio: Aquí borramos la cabecera de la venta completa.
        $sqlDeleteVenta = "DELETE FROM ventas WHERE id = :id";
        $stmtDeleteVenta = $this->conn->prepare($sqlDeleteVenta);
        if(!$stmtDeleteVenta->execute(["id" => $idVenta])){
            throw new \Exception("No se pudo encontrar la Venta con el id:". $id);
        };
    }

    public function list(array $filters): array {
        // Definimos la consulta base unificada (idéntica a la de LOAD)
        $sql = "SELECT vd.id, v.numero_venta, v.cliente, v.fecha, v.forma_pago, vd.codigo_producto, vd.cantidad, vd.precio_unitario, vd.total
        FROM ventas_detalle AS vd
        INNER JOIN ventas AS v ON vd.venta_id = v.id";

        $condiciones = [];
        $parametros = [];

        // Tu lógica original de filtros (Intacta, solo agregamos prefijos de tabla)
        if (!empty($filters)) {
            foreach ($filters as $campo => $valor) {
                if ($valor !== '' && $valor !== null) {
                    
                    // Mapeo inteligente para saber a qué tabla pertenece cada campo del filtro
                    switch ($campo) {
                        case 'razon_social':
                            $condiciones[] = "c.razon_social = :razon_social";
                            $parametros[$campo] = $valor;
                            break;
                        case 'numero_venta':
                            $condiciones[] = "v.numero_venta = :numero_venta";
                            $parametros[$campo] = $valor;
                            break;
                    }
                }
            }
            if((!empty($filters['fechaInicio']) && !empty($filters['fechaFin'])) && array_key_exists('fechaInicio', $filters) && array_key_exists('fechaFin', $filters)){
                $condiciones[] = "v.fecha BETWEEN :fechaInicio AND :fechaFin";
                $parametros['fechaInicio'] = $filters['fechaInicio'];
                $parametros['fechaFin'] = $filters['fechaFin'];
            }else if (!empty($filters['fechaInicio']) && array_key_exists('fechaInicio', $filters)){
                $condiciones[] = "v.fecha >= :fechaInicio";
                $parametros['fechaInicio'] = $filters['fechaInicio'];
            }else if (!empty($filters['fechaFin']) && array_key_exists('fechaFin', $filters)){
                $condiciones[] = "v.fecha <= :fechaFin";
                $parametros['fechaFin'] = $filters['fechaFin'];
            };

            if (!empty($condiciones)) {
                $sql .= " WHERE " . implode(" AND ", $condiciones);
            }
        }
        
        // Agregamos el ordenamiento final usando el alias de la cabecera
        $sql .= " ORDER BY v.id"; 
        
        $stmt = $this->conn->prepare($sql);

        if (!$stmt->execute($parametros)) {
            throw new \Exception("No se pudo ejecutar la consulta de LISTAR");
        }

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function cantSales(): array {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";

        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute()){
            throw new \Exception("No hay elementos en la tabla");
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
                        

    }

    public function totalSales(): array {
        $sql = "SELECT SUM(total) AS total FROM {$this->table}";

        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute()){
            throw new \Exception("No hay elementos en la tabla");
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
                        

    }

    private function validateNumeroVenta(string $numero_venta): void {
        // Buscamos si el número de venta ya existe en otra venta que NO sea la asociada a este detalle_id
        $sql = "SELECT id FROM ventas 
                WHERE numero_venta = :numero_venta";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'numero_venta' => $numero_venta
        ]);

        if ($stmt->rowCount() != 0) {
            throw new \Exception("El número de venta '{$numero_venta}' ya está siendo usado por otra transacción.");
        }
    }

    private function validateCliente(string $cliente): void {
        // Buscamos si el número de venta ya existe en otra venta que NO sea la asociada a este detalle_id
        $sql = "SELECT id FROM clientes 
                WHERE razon_social = :razon_social";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'razon_social' => $cliente
        ]);

        if ($stmt->rowCount() == 0) {
            throw new \Exception("El cliente '{$cliente}' no Existe.");
        }
    }

    private function validateProducto(string $prod): void {
        // Buscamos si el número de venta ya existe en otra venta que NO sea la asociada a este detalle_id
        $sql = "SELECT id FROM productos 
                WHERE codigo = :codigo";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'codigo' => $prod
        ]);

        if ($stmt->rowCount() == 0) {
            throw new \Exception("El producto con el codigo '{$prod}' no Existe.");
        }
    }

}