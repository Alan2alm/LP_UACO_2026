<?php

namespace app\core\models\dao;

use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class ClientDao extends BaseDao implements InterfaceDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "clientes");
    }

    /*public function updatePassword(array $data): void{
        $sql = "UPDATE {$this->table}";
        $sql .= " SET clave =:clave";
        $sql .= " WHERE id = :id";
        $this->updateQuery($sql, $data);
    }*/

    public function load(int $id): array{
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute(["id" => $id])){
            throw new \Exception("No se pudo encontrar el CLIENTE con el id:". $id);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function cantClients(): array {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";

        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute()){
            throw new \Exception("No hay elementos en la tabla");
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
                        

    }

    public function save(array $data): void{
        $this->validateCuit(0, $data['cuit']);
        $this->validateDNI(0, $data['dni']);
        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :apellido, :nombres, :dni, :tipo, :razon_social, :cuit, :correo, :telefono, :domicilio)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void{
        $sql = "UPDATE {$this->table} SET apellido=:apellido, nombres=:nombres, dni=:dni, tipo=:tipo, razon_social=:razon_social, cuit=:cuit, correo=:correo, telefono=:telefono, domicilio=:domicilio WHERE id=:id";
        $stm = $this->conn->prepare($sql);
        if(!$stm->execute($data)){
            throw new \Exception("No se pudo encontrar el CLIENTE con el id:". $data['id']);
        };
    }

    public function delete(int $id): void{
        $sql = "DELETE FROM {$this->table} WHERE id=:id";
        $stm = $this->conn->prepare($sql);
        if(!$stm->execute(["id" => $id])){
            throw new \Exception("No se pudo encontrar el CLIENTE con el id:". $id);
        };
    }

    public function list(array $filters): array{
        $sql = "SELECT t1.id, t1.apellido, t1.nombres, t1.dni, t1.tipo, t1.razon_social, t1.cuit, t1.correo, t1.telefono, t1.domicilio
        FROM {$this->table} AS t1"; 

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

    private function validateCuit(int $id, string $cuit): void{
        $sql = "SELECT id FROM {$this->table} WHERE cuit = :cuit && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'cuit' => $cuit
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("El cuit {$cuit} ya esta siendo usada por otro cliente.");
        }
    }

    private function validateDNI(int $id, string $dni): void{
        $sql = "SELECT id FROM {$this->table} WHERE dni = :dni && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'dni' => $dni
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("El DNI {$dni} ya esta siendo usado por otro cliente.");
        }
    }

}