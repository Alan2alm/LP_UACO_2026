<?php

namespace app\core\services;

use app\core\models\dto\UserDto;
use app\core\models\dao\UserDao;
use app\core\services\base\BaseService;
use app\libs\database\Connection;

final class UserService extends BaseService{
    
    function __construct()
    {
        parent::__construct(new UserDao(Connection::get()));
    }

    public function save(UserDto $dto): void{
        $this->validate($dto);
        $this->dao->save($dto->toArrayForSave());
    } 

    public function update(UserDto $dto): void{
        $this->validateForUpdate($dto);
        $this->dao->update($dto->toArrayForUpdate());
    } 

    public function delete(UserDto $dto): void{
        $this->validateId($dto->getId());
        $this->dao->delete($dto->getId());
    } 

    public function load(int $id): array{
        $this->validateId($id);
        return $this->dao->load($id);
    } 

    public function list(array $filters = []): array{
        //echo json_encode($this->dao->list($filters));
        return $this->dao->list($filters);
    } 

    public function enable(int $id): void{
        $this->validateId($id);
        $this->dao->enable($id);
    } 

    public function disable(int $id): void{
        $this->validateId($id);
        $this->dao->disable($id);
    } 

    public function reset(int $id): void{
        $this->validateId($id);
        $this->dao->reset($id);
    } 

    public function cantItem(): array{
        return $this->dao->cantUsers();
    } 

    public function resetByMail(UserDto $dto): void{
        $this->validateMail($dto);
        $this->dao->resetByMail($dto->toArrayMail());
    } 

    public function resetPass(UserDto $dto): void{
        $this->validateId($dto->getId());
        $this->dao->resetPass($dto->toArrayForResetPass());
    } 

    private function validate(UserDto $dto): void{
        if($dto->getApellido() == ""){
            throw new \Exception("El campo apellido es obligatorio");
        }
        if($dto->getNombres() == ""){
            throw new \Exception("El campo nombres es obligatorio");
        }
        if($dto->getCuenta() == ""){
            throw new \Exception("El campo cuenta es obligatorio");
        }
        if($dto->getPerfil() == ""){
            throw new \Exception("Debe especificar el perfil de la cuenta.");
        }
        if($dto->getClave() == ""){
            throw new \Exception("No se especificó una clave válida");
        }
        if($dto->getCorreo() == ""){
            throw new \Exception("No se especificó una dirección de correo válida");
        }
    }

    private function validateForUpdate(UserDto $dto): void{
        if($dto->getId() == 0){
            throw new \Exception("No se especificó Id valido");
        }
        if($dto->getApellido() == ""){
            throw new \Exception("El campo apellido es obligatorio");
        }
        if($dto->getNombres() == ""){
            throw new \Exception("El campo nombres es obligatorio");
        }
        if($dto->getCuenta() == ""){
            throw new \Exception("El campo cuenta es obligatorio");
        }
        if($dto->getPerfil() == ""){
            throw new \Exception("Debe especificar el perfil de la cuenta.");
        }
        if($dto->getCorreo() == ""){
            throw new \Exception("No se especificó una dirección de correo válida");
        }
    }

    private function validateId(int $id): void{
        if($id == 0){
            throw new \Exception("No se especificó Id valido");
        }
    }

    private function validateMail(UserDto $dto): void{
        if($dto->getCorreo() == ""){
            throw new \Exception("No se especificó una dirección de correo válida");
        }
    }

}