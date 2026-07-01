<?php

namespace app\core\services;

use app\core\models\dao\ItemDao;
use app\core\models\dto\ItemDto;
use app\core\services\base\BaseService;
use app\libs\database\Connection;

final class ItemService extends BaseService{
    
    function __construct()
    {
        parent::__construct(new ItemDao(Connection::get()));
    }

    public function save(ItemDto $dto): void{
        $this->validate($dto);
        $this->dao->save($dto->toArrayForSave());
    } 

    public function update(ItemDto $dto): void{
        $this->validateId($dto->getId());
        $this->validate($dto);
        $this->dao->update($dto->toArray());
    } 

    public function delete(ItemDto $dto): void{
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

    private function validate(ItemDto $dto): void{
        if($dto->getNombre() == ""){
            throw new \Exception("El campo <strong>nombre</strong> es obligatorio");
        }
        if($dto->getCodigo() == ""){
            throw new \Exception("El campo <strong>codigo</strong> es obligatorio");
        }
        if($dto->getDescripcion() == ""){
            throw new \Exception("El campo <strong>descripcion</strong> es obligatorio");
        }
        if($dto->getCategoriaId() == 0){
            throw new \Exception("Debe especificar  <strong>categoria</strong> del item.");
        }
        if($dto->getPrecio() < 0.0){
            throw new \Exception("El <strong>precio</strong> no puede ser negativo");
        }
        if($dto->getStock() < 0){
            throw new \Exception("El <strong>STOCK</strong> no puede quedar negativo");
        }
    }

    private function validateId(int $id): void{
        if($id == 0){
            throw new \Exception("No se especificó <strong>Id</strong> valido");
        }
    }

}