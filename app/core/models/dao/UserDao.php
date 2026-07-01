<?php

namespace app\core\models\dao;

use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class UserDao extends BaseDao implements InterfaceDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "usuarios");
    }

    public function login(string $cuenta): array{
        $sql = "SELECT user.id, user.apellido, user.nombres, user.cuenta, user.clave, user.correo, user.perfil, user.estado, user.resetPass";
        $sql .= " FROM usuarios AS user";
        $sql .= " WHERE (cuenta = :cuenta OR correo = :cuenta)";
        $result = $this->selectQuery($sql, ["cuenta" => $cuenta]);
        if(count($result) != 1){
            throw new \Exception("El nombre de usuario o la contraseña no coinciden");
        }
        return $result[0];
    }

    public function updatePassword(array $data): void{
        $sql = "UPDATE {$this->table}";
        $sql .= " SET clave =:clave";
        $sql .= " WHERE id = :id";
        $this->updateQuery($sql, $data);
    }

    public function load(int $id): array{
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute(["id" => $id])){
            throw new \Exception("No se pudo encontrar el CLIENTE con el id:". $id);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function save(array $data): void{
        $this->validateCuenta(0, $data['cuenta']);
        $this->validateCorreo(0, $data['correo']);
        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :apellido, :nombres, :cuenta, :perfil, :clave, :correo, :estado, NOW(), :resetPass)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void{
        $sql = "UPDATE {$this->table} SET apellido=:apellido, nombres=:nombres, cuenta=:cuenta, perfil=:perfil, correo=:correo, estado=:estado, fechaAlta=NOW(), resetPass=:resetPass WHERE id=:id";
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

    public function cantUsers(): array {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";

        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute()){
            throw new \Exception("No hay elementos en la tabla");
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
                        

    }

    public function list(array $filters): array{
        $sql = "SELECT t1.id, t1.nombres, t1.apellido, t1.cuenta, t1.perfil, t1.correo, t1.estado, t1.fechaAlta, t1.resetPass
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

    public function enable(int $id): void{
        $sql = "UPDATE {$this->table} SET estado=:estado WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute(["id" => $id, "estado" => 1])){
            throw new \Exception("No se pudo encontrar el CLIENTE con el id:". $id);
        }
    }

    public function disable(int $id): void{
        $sql = "UPDATE {$this->table} SET estado=:estado WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute(["id" => $id, "estado" => 0])){
            throw new \Exception("No se pudo encontrar el CLIENTE con el id:". $id);
        }
    }

    public function reset(int $id): void{
        $sql = "UPDATE {$this->table} SET resetPass=:resetPass WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt->execute(["id" => $id, "resetPass" => 1])){
            throw new \Exception("No se pudo encontrar el CLIENTE con el id:". $id);
        }
    }

    public function resetByMail(array $data): void{
        $sql = "UPDATE {$this->table} SET resetPass=:resetPass WHERE correo = :correo";

        $parametros = [
            'correo' => $data['correo'],
            "resetPass" => 1
        ];
                
        $this->updateQuery($sql, $parametros);
    }

    public function resetPass(array $data): void{
        $sql = "UPDATE {$this->table} SET clave=:clave, resetPass=:resetPass WHERE id = :id";

        $parametros = [
            'id' => $data['id'],
            'clave' => $data['clave'],
            "resetPass" => 0
        ];
                
        $this->updateQuery($sql, $parametros);
    }

    private function validateCuenta(int $id, string $cuenta): void{
        $sql = "SELECT id FROM {$this->table} WHERE cuenta = :cuenta && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'cuenta' => $cuenta
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("La cuenta {$cuenta} ya esta siendo usada por otro usuario.");
        }
    }

    private function validateCorreo(int $id, string $correo): void{
        $sql = "SELECT id FROM {$this->table} WHERE correo = :correo && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'correo' => $correo
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("El correo {$correo} ya esta siendo usado por otro usuario.");
        }
    }

}