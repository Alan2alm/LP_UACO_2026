<?php

namespace app\core\models\dao;

use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class ItemDao extends BaseDao implements InterfaceDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "productos");
    }

    public function load(int $id): array{
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute(["id" => $id])){
            throw new \Exception("No se pudo encontrar el ITEM con el id:". $id);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function save(array $data): void{
        $this->validateCodigo(0, $data['codigo']);
        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :nombre, :codigo, :descripcion, :categoriaId, :precio, :stock)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void{
        $sql = "UPDATE {$this->table} SET nombre=:nombre, codigo=:codigo, descripcion=:descripcion, categoriaId=:categoriaId, precio=:precio, stock=:stock WHERE id=:id";
        $stm = $this->conn->prepare($sql);
        if(!$stm->execute($data)){
            throw new \Exception("No se pudo encontrar el ITEM con el id:". $data['id']);
        };
    }


    public function delete(int $id): void{
        $sql = "DELETE FROM {$this->table} WHERE id = :id"; 
        $stmt = $this->conn->prepare($sql);

        // Se añade comilla al array asociativo y se verifica el rowCount
        if(!$stmt->execute(["id" => $id])){
            throw new \Exception("No se pudo encontrar el ITEM con el id:". $id);
        };
    }

    public function list(array $filters): array{
        /*$sql = "SELECT t1.id, t1.nombre AS nombre, t1.codigo, t1.descripcion, t1.precio, t1.stock, c.nombre AS categoria FROM {$this->table} AS t1 INNER JOIN categorias AS c ON t1.categoriaId = c.id";
        $condiciones = [];
        $parametros = [];

        if (!empty($filters)) {
            foreach ($filters as $campo => $valor) {
                if ($valor !== '' && $valor !== null) {
                    $condiciones[] = "$campo = :$campo";
                }
            }
            if (!empty($condiciones)) {
                $sql .= " WHERE " . implode(" AND ", $condiciones);
            }
        }

        $sql .= " ORDER BY t1.id";
        
        return $this->selectQuery($sql, []);*/

        $sql = "SELECT t1.id, t1.nombre AS nombre, t1.codigo, t1.descripcion, t1.precio, t1.stock, c.nombre AS categoria 
        FROM {$this->table} AS t1 
        INNER JOIN categorias AS c ON t1.categoriaId = c.id"; 

        $condiciones = []; 
        $parametros = []; 

        if (!empty($filters)) { 
            foreach ($filters as $campo => $valor) { 
                // Se corrige la sintaxis y se agregan comillas al string vacío
                if ($valor !== "" && $valor !== null && $campo !== "" && $campo !== null) { 
                    // Corregido: se asigna el nombre del campo y el marcador de forma segura
                    $condiciones[] = "t1.$campo = :$campo"; 
                    // Se guardan los valores en el array de parámetros
                    //$parametros[$campo] = $valor; 
                    //$parametros["$campo"] = $valor;
                    $parametros += [ "$campo" => $valor ];
                
                }

            } 

            if (!empty($condiciones)) { 
                // Corregido: los operadores AND deben ir dentro de comillas
                $sql .= " WHERE " . implode(" AND ", $condiciones); 
            } 
        } 

        $sql .= " ORDER BY t1.id"; 

        // Se pasa el array con los valores vinculados para evitar inyecciones SQL
        return $this->selectQuery($sql, $parametros); 
    }

    private function validateCodigo(int $id, string $codigo): void{
        $sql = "SELECT id FROM {$this->table} WHERE codigo = :codigo && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'codigo' => $codigo
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("El codigo {$codigo} ya esta siendo usado por otro producto.");
        }
    }

}