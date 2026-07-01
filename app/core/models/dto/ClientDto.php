<?php

namespace app\core\models\dto;

use app\core\models\enums\ClientType;

final class ClientDto{

    private string $apellido, $nombres, $dni, $tipo, $razon_social, $correo, $telefono, $cuit, $domicilio;
    private int $id;

    public function __construct(array $data = [])
    {
        $this->setId($data['id'] ?? 0);
        $this->setApellido($data['apellido'] ?? "");
        $this->setNombres($data['nombres'] ?? "");
        $this->setDni($data['dni'] ?? "");
        $this->setTipo($data['tipo'] ?? "");
        $this->setRazonSocial($data['razon_social'] ?? "");
        $this->setCuit($data['cuit'] ?? "");
        $this->setCorreo($data['correo'] ?? "");
        $this->setTelefono($data['telefono'] ?? "");
        $this->setDomicilio($data['domicilio'] ?? "");
    }

    /** GETTERS */

    public function getId(): int{
        return $this->id;
    }

    public function getCuit(): string{
        return $this->cuit;
    }

    public function getDomicilio(): string{
        return $this->domicilio;
    }
    
    public function getApellido(): string{
        return $this->apellido;
    }

    public function getNombres(): string{
        return $this->nombres;
    }
    
    public function getDni(): string{
        return $this->dni;
    }

    public function getTipo(): string{
        return $this->tipo;
    }

    public function getRazonSocial(): string{
        return $this->razon_social;
    }

    public function getCorreo(): string{
        return $this->correo;
    }

    public function getTelefono(): string{
        return $this->telefono;
    }

    /** SETTERS */

    public function setId(int $id): void{
        $this->id = ($id > 0) ? $id : 0;
    }

    public function setCuit(string $cuit): void{
        $cuitTrimeado = trim($cuit);
        $this->cuit = (strlen($cuitTrimeado) > 0 && strlen($cuitTrimeado) <= 50) ? $cuitTrimeado : "";
    }

    public function setDomicilio(string $domicilio): void{
        $domicilioTrimeado = trim($domicilio);
        $this->domicilio = (strlen($domicilioTrimeado) > 0 && strlen($domicilioTrimeado) <= 255) ? $domicilioTrimeado : "";
    }

    public function setApellido(string $apellido): void{
        $apellidoTrimeado = trim($apellido);
        $this->apellido = (strlen($apellidoTrimeado) > 0 && strlen($apellidoTrimeado) <= 100) ? $apellidoTrimeado : "";
    }

    public function setNombres(string $nombres): void{
        $nombresTrimeado = trim($nombres);
        $this->nombres = (strlen($nombresTrimeado) > 0 && strlen($nombresTrimeado) <= 100) ? $nombresTrimeado : "";
    }

    public function setDni(string $dni): void{
        $dniTrimeado = trim($dni);
        $this->dni = (strlen($dniTrimeado) > 0 && strlen($dniTrimeado) <= 50) ? $dniTrimeado : "";
    }

    public function setTipo(string $tipo): void{
        $tipoEsValidos = array_column(ClientType::cases(), "value"); // ['Empresa', 'Particular']
        $this->tipo =  in_array($tipo, $tipoEsValidos) ? $tipo : "";
    }

    public function setRazonSocial(string $razon_social): void{
        $razon_socialTrimeado = trim($razon_social);
        $this->razon_social = (strlen($razon_socialTrimeado) > 0 && strlen($razon_socialTrimeado) <= 100) ? $razon_socialTrimeado : "";
    }

    public function setCorreo(string $correo): void{
        $correoValidado = filter_var($correo, FILTER_VALIDATE_EMAIL);
        $this->correo = $correoValidado ? $correo : "";
    }

    public function setTelefono(string $telefono): void{
        $this->telefono = (strlen($telefono) === 10) ? $telefono : "";
    }

    public function toArray(){
        return [
            'id'        => $this->getId(),
            'apellido'  => $this->getApellido(),
            'nombres'   => $this->getNombres(),
            'dni'    => $this->getDni(),
            'tipo'    => $this->getTipo(),
            'razon_social'     => $this->getRazonSocial(),
            'correo'    => $this->getCorreo(),
            'cuit'    => $this->getCuit(),
            'telefono' => $this->getTelefono(),
            'domicilio' => $this->getDomicilio()
        ];
    }

    public function toArrayForSave(){
        return [
            'apellido'  => $this->getApellido(),
            'nombres'   => $this->getNombres(),
            'dni'    => $this->getDni(),
            'tipo'    => $this->getTipo(),
            'razon_social'     => $this->getRazonSocial(),
            'correo'    => $this->getCorreo(),
            'cuit'    => $this->getCuit(),
            'telefono' => $this->getTelefono(),
            'domicilio' => $this->getDomicilio()
        ];
    }

    public function toArrayForUpdate(){
        return [
            'id'        => $this->getId(),
            'apellido'  => $this->getApellido(),
            'nombres'   => $this->getNombres(),
            'dni'    => $this->getDni(),
            'tipo'    => $this->getTipo(),
            'razon_social'     => $this->getRazonSocial(),
            'correo'    => $this->getCorreo(),
            'cuit'    => $this->getCuit(),
            'telefono' => $this->getTelefono(),
            'domicilio' => $this->getDomicilio()
        ];
    }
}