<?php

namespace app\core\services;

use app\core\models\dao\SaleDao;
use app\core\models\dto\SaleDto;
use app\core\services\base\BaseService;
use app\libs\database\Connection;

final class SaleService extends BaseService{
    
    function __construct()
    {
        parent::__construct(new SaleDao(Connection::get()));
    }

    public function save(SaleDto $dto): void{
        $this->validate($dto);
        $this->dao->save($dto->toArrayForSave());
    } 

    public function update(SaleDto $dto): void{
        $this->validateId($dto->getId());
        $this->validate($dto);
        $this->dao->update($dto->toArray());
    }

    public function delete(SaleDto $dto): void{
        $this->validateId($dto->getId());
        $this->dao->delete($dto->getId());
    } 

    public function load(int $id): array{
        $this->validateId($id);
        return $this->dao->load($id);
    } 

    public function list(array $filters = []): array{
        return $this->dao->list($filters);
    } 

    public function cantItem(): array{
        return $this->dao->cantSales();
    } 

    public function totalSales(): array{
        return $this->dao->totalSales();
    } 

    private function validate(SaleDto $dto): void{ //cambiar dependiendo de los datos de la tabla de ventas en la base de datos.
        if($dto->getNroVenta() == ""){
            throw new \Exception("El campo <strong>Nro de Venta</strong> es obligatorio");
        }
        if($dto->getCliente() == ""){
            throw new \Exception("El campo <strong>cliente</strong> es obligatorio");
        }
        if($dto->getMetodoPago() == ""){
            throw new \Exception("El campo <strong>metodo de pago</strong> es obligatorio");
        }
        if($dto->getCodProducto() == ""){
            throw new \Exception("El campo <strong>codigo de Producto</strong> es obligatorio");
        }
        if($dto->getCantidad() == 0){
            throw new \Exception("Debe especificar  <strong>Cantidad</strong> vendida.");
        }
        if($dto->getPrecioUnitario() < 0.0){
            throw new \Exception("El <strong>precio unitario</strong> no puede ser negativo");
        }
        if($dto->getMontoTotal() < 0.0){
            throw new \Exception("El <strong>monto total</strong> no puede ser negativo");
        }
    }

    private function validateId(int $id): void{
        if($id == 0){
            throw new \Exception("No se especificó <strong>Id</strong> valido");
        }
    }

}