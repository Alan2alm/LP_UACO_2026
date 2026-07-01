<?php

namespace app\core\models\dto;

use app\core\models\enums\PaymentsType;

final class SaleDto{   //cambiar los datos por los que estaran en la tabla de ventas en la BD

    private string $numero_venta, $razon_social, $forma_pago, $codigo_producto;
    private int $id, $cantidad;
    private float $total, $precio_unitario;

    public function __construct(array $data = [])
    {
        $this->setId($data['id'] ?? 0);
        $this->setNroVenta($data['numero_venta'] ?? "");
        $this->setCliente($data['razon_social'] ?? "");
        $this->setMetodoPago($data['forma_pago'] ?? "");
        $this->setCodProducto($data['codigo_producto'] ?? "");
        $this->setCantidad($data['cantidad'] ?? 0);
        $this->setPrecioUnitario($data['precio_unitario'] ?? 0.0);
        $this->setMontoTotal($data['total'] ?? 0.0);
        
    }

    /** GETTERS */

    public function getId(): int{
        return $this->id;
    }
    
    public function getNroVenta(): string{
        return $this->numero_venta;
    }

    public function getCliente(): string{
        return $this->razon_social;
    }

    public function getMetodoPago(): string{
        return $this->forma_pago;
    }

    public function getCodProducto(): string{
        return $this->codigo_producto;
    }

    public function getCantidad(): int{
        return $this->cantidad;
    }
    
    public function getPrecioUnitario(): float{
        return $this->precio_unitario;
    }

    public function getMontoTotal(): float{
        return $this->total;
    }

    /** SETTERS */

    public function setId(int $id): void{
        $this->id = ($id > 0) ? $id : 0;
    }

    public function setNroVenta(string $numero_venta): void{
        $numero_ventaTrimeado = trim($numero_venta);
        $this->numero_venta = (strlen($numero_ventaTrimeado) > 0 && strlen($numero_ventaTrimeado) <= 20) ? $numero_ventaTrimeado : "";
    }

    public function setCliente(string $razon_social): void{
        $razon_SocialTrimeado = trim($razon_social);
        $this->razon_social = (strlen($razon_SocialTrimeado) > 0 && strlen($razon_SocialTrimeado) <= 100) ? $razon_SocialTrimeado : "";
    }

    public function setMetodoPago(string $forma_pago): void{
        $FormasValidas = array_column(PaymentsType::cases(), "value");
        $this->forma_pago =  in_array($forma_pago, $FormasValidas) ? $forma_pago : "";
    }

    public function setCodProducto(string $codigo_producto): void{
        $codigo_productoTrimeado = trim($codigo_producto);
        $this->codigo_producto = (strlen($codigo_productoTrimeado) > 0 && strlen($codigo_productoTrimeado) <= 25) ? $codigo_productoTrimeado : "";
    }

    public function setCantidad(int $cantidad): void{
        $this->cantidad = $cantidad > 0 ? $cantidad : 0;
    }

    public function setPrecioUnitario(float $precio): void{
        $this->precio_unitario = $precio > 0 ? $precio : 0.0;
    }

    public function setMontoTotal(float $total): void{
        $this->total = $total > 0 ? $total : 0.0;
    }


    public function toArray(){
        return [
            'id'                     => $this->getId(),
            'numero_venta'           => $this->getNroVenta(),
            'razon_social'           => $this->getCliente(),
            'forma_pago'             => $this->getMetodoPago(),
            'codigo_producto'        => $this->getCodProducto(),
            'cantidad'               => $this->getCantidad(),
            'precio_unitario'        => $this->getPrecioUnitario(),
            'total'                  => $this->getMontoTotal()
        ];
    }

    public function toArrayForSave(){
        return [
            'numero_venta'           => $this->getNroVenta(),
            'razon_social'           => $this->getCliente(),
            'forma_pago'             => $this->getMetodoPago(),
            'codigo_producto'        => $this->getCodProducto(),
            'cantidad'               => $this->getCantidad(),
            'precio_unitario'        => $this->getPrecioUnitario(),
            'total'                  => $this->getMontoTotal()
        ];
    }

}