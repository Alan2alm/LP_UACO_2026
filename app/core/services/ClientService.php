<?php

namespace app\core\services;

use app\core\models\dto\ClientDto;
use app\core\models\dao\ClientDao;
use app\core\services\base\BaseService;
use app\libs\database\Connection;

final class ClientService extends BaseService{
    
    function __construct()
    {
        parent::__construct(new ClientDao(Connection::get()));
    }

    public function save(ClientDto $dto): void{
        $this->validate($dto);
        $this->dao->save($dto->toArrayForSave());
    } 

    public function update(ClientDto $dto): void{
        $this->validateForUpdate($dto);
        $this->dao->update($dto->toArrayForUpdate());
    } 

    public function delete(ClientDto $dto): void{
        $this->validateId($dto->getId());
        $this->dao->delete($dto->getId());
    } 

    public function load(int $id): array{
        $this->validateId($id);
        return $this->dao->load($id);
    } 

    public function cantItem(): array{
        return $this->dao->cantClients();
    } 

    public function list(array $filters = []): array{
        //echo json_encode($this->dao->list($filters));
        return $this->dao->list($filters);
    } 

    private function validate(ClientDto $dto): void{
        if($dto->getApellido() == ""){
            throw new \Exception("El campo apellido es obligatorio.");
        }
        if($dto->getNombres() == ""){
            throw new \Exception("El campo nombres es obligatorio.");
        }
        if($dto->getDni() == ""){
            throw new \Exception("El campo DNI es obligatorio.");
        }
        if($dto->getTipo() == ""){
            throw new \Exception("Debe especificar el tipo de cliente.");
        }
        if($dto->getRazonSocial() == ""){
            throw new \Exception("No se especificó una Razon social.");
        }
        if($dto->getCuit() == ""){
            throw new \Exception("No se especificó un Cuit válido.");
        }
        if($dto->getTelefono() == ""){
            throw new \Exception("No se especificó un Telefono valido.");
        }
        if($dto->getDomicilio() == ""){
            throw new \Exception("No se especificó un Domicilio válido.");
        }
        if($dto->getCorreo() == ""){
            throw new \Exception("No se especificó un Correo válido.");
        }
    }

    private function validateForUpdate(ClientDto $dto): void{
        if($dto->getId() == 0){
            throw new \Exception("No se especificó Id valido");
        }
        if($dto->getApellido() == ""){
            throw new \Exception("El campo apellido es obligatorio.");
        }
        if($dto->getNombres() == ""){
            throw new \Exception("El campo nombres es obligatorio.");
        }
        if($dto->getDni() == ""){
            throw new \Exception("El campo DNI es obligatorio.");
        }
        if($dto->getTipo() == ""){
            throw new \Exception("Debe especificar el tipo de cliente.");
        }
        if($dto->getRazonSocial() == ""){
            throw new \Exception("No se especificó una Razon social.");
        }
        if($dto->getCuit() == ""){
            throw new \Exception("No se especificó un Cuit válido.");
        }
        if($dto->getTelefono() == ""){
            throw new \Exception("No se especificó un Telefono valido.");
        }
        if($dto->getDomicilio() == ""){
            throw new \Exception("No se especificó un Domicilio válido.");
        }
        if($dto->getCorreo() == ""){
            throw new \Exception("No se especificó un Correo válido.");
        }
    }

    private function validateId(int $id): void{
        if($id == 0){
            throw new \Exception("No se especificó Id valido");
        }
    }
}