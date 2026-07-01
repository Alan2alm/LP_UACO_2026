<?php

namespace app\core\models\dto;

use app\core\models\enums\UserProfile;
use app\libs\password\Password;

final class UserDto{

    private string $apellido, $nombres, $cuenta, $perfil, $clave, $correo, $fechaAlta;
    private int $id, $estado, $resetPass;

    public function __construct(array $data = [])
    {
        $this->setId($data['id'] ?? 0);
        $this->setApellido($data['apellido'] ?? "");
        $this->setNombres($data['nombres'] ?? "");
        $this->setCuenta($data['cuenta'] ?? "");
        $this->setPerfil($data['perfil'] ?? "");
        $this->setClave($data['clave'] ?? "");
        $this->setCorreo($data['correo'] ?? "");
        $this->setEstado($data['estado'] ?? 1);
        $this->setFechaAlta($data['fechaAlta'] ?? "");
        $this->setResetPass($data['resetPass'] ?? 0);
    }

    /** GETTERS */

    public function getId(): int{
        return $this->id;
    }

    public function getEstado(): int{
        return $this->estado;
    }

    public function getResetPass(): int{
        return $this->resetPass;
    }
    
    public function getApellido(): string{
        return $this->apellido;
    }

    public function getNombres(): string{
        return $this->nombres;
    }
    
    public function getCuenta(): string{
        return $this->cuenta;
    }

    public function getPerfil(): string{
        return $this->perfil;
    }

    public function getClave(): string{
        return $this->clave;
    }

    public function getCorreo(): string{
        return $this->correo;
    }

    public function getFechaAlta(): string{
        return $this->fechaAlta;
    }

    /** SETTERS */

    public function setId(int $id): void{
        $this->id = ($id > 0) ? $id : 0;
    }

    public function setEstado(int $estado): void{
        $this->estado = ($estado === 0 || $estado === 1) ? $estado : 0;
    }

    public function setResetPass(int $resetPass): void{
        $this->resetPass = ($resetPass === 0 || $resetPass === 1) ? $resetPass : 1;
    }

    public function setApellido(string $apellido): void{
        $apellidoTrimeado = trim($apellido);
        $this->apellido = (strlen($apellidoTrimeado) > 0 && strlen($apellidoTrimeado) <= 100) ? $apellidoTrimeado : "";
    }

    public function setNombres(string $nombres): void{
        $nombresTrimeado = trim($nombres);
        $this->nombres = (strlen($nombresTrimeado) > 0 && strlen($nombresTrimeado) <= 100) ? $nombresTrimeado : "";
    }

    public function setCuenta(string $cuenta): void{
        $cuentaTrimeado = trim($cuenta);
        $this->cuenta = (strlen($cuentaTrimeado) > 0 && strlen($cuentaTrimeado) <= 20) ? $cuentaTrimeado : "";
    }

    public function setPerfil(string $perfil): void{
        $perfilesValidos = array_column(UserProfile::cases(), "value"); // ['Administrador', 'Operador']
        $this->perfil =  in_array($perfil, $perfilesValidos) ? $perfil : "";
    }

    public function setClave(string $clave): void{
        $this->clave = (strlen($clave) > 0 && strlen($clave) <= 20) ? Password::hash($clave) : "";
    }

    public function setCorreo(string $correo): void{
        $correoValidado = filter_var($correo, FILTER_VALIDATE_EMAIL);
        $this->correo = $correoValidado ? $correo : "";
    }

    public function setFechaAlta(string $fechaAlta): void{
        $this->fechaAlta = (strlen($fechaAlta) === 10) ? $fechaAlta : "";
    }

    public function toArray(){
        return [
            'id'        => $this->getId(),
            'apellido'  => $this->getApellido(),
            'nombres'   => $this->getNombres(),
            'cuenta'    => $this->getCuenta(),
            'perfil'    => $this->getPerfil(),
            'clave'     => $this->getClave(),
            'correo'    => $this->getCorreo(),
            'estado'    => $this->getEstado(),
            'fechaAlta' => $this->getFechaAlta(),
            'resetPass' => $this->getResetPass()
        ];
    }

    public function toArrayForSave(){
        return [
            'apellido'  => $this->getApellido(),
            'nombres'   => $this->getNombres(),
            'cuenta'    => $this->getCuenta(),
            'perfil'    => $this->getPerfil(),
            'clave'     => $this->getClave(),
            'correo'    => $this->getCorreo(),
            'estado'    => $this->getEstado(),
            'resetPass' => $this->getResetPass()
        ];
    }

    public function toArrayForUpdate(){
        return [
            'id'        => $this->getId(),
            'apellido'  => $this->getApellido(),
            'nombres'   => $this->getNombres(),
            'cuenta'    => $this->getCuenta(),
            'perfil'    => $this->getPerfil(),
            'correo'    => $this->getCorreo(),
            'estado'    => $this->getEstado(),
            'resetPass' => $this->getResetPass()
        ];
    }

    public function toArrayMail(){
        return [
            'correo'    => $this->getCorreo()
        ];
    }

    public function toArrayForResetPass(){
        return [
            'clave'     => $this->getClave(),
            'correo'    => $this->getCorreo()
        ];
    }

}