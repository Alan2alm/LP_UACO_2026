<?php

namespace app\core\services;

use app\core\models\dao\UserDao;
use app\core\models\dto\UserDto;
use app\libs\database\Connection;
use app\libs\password\Password;

/**
 * Descripción de HomeController
 *
 * @author Ing. Jose Rasjido
 */
final class AuthenticationService{

    public function login(string $user, string $pass): void{
        $conn = Connection::get();

        //AUTENTICACIÓN DEL USUARIO

        $usuarioDao = new UserDao($conn);
        $usuario = $usuarioDao->login($user);

        if(!Password::verify($pass, $usuario["clave"])){
            throw new \Exception("El usuario o la clave es incorrecta.");
        }

        if(Password::needsRehash($usuario["clave"])){
            $usuarioDao->updatePassword([
                "clave" => Password::hash($pass),
                "id"    => $usuario["id"]
            ]);
        }

        if($usuario["estado"] !== 1){
            throw new \Exception("Su cuenta esta inactiva.");
        }
        if($usuario["resetPass"] !== 0){
            throw new \Exception("Su clave ha caducado.", 1);
        }

        $_SESSION["token"] = APP_TOKEN;
        $_SESSION["usuarioId"] = (int)$usuario["id"];
        $_SESSION["usuario"] = $usuario["nombres"];
        $_SESSION["perfil"] = $usuario["perfil"];
        $_SESSION["motivoCierreSesion"] = SESSION_FINISHED;
    }

    public function logout():void{
        session_unset();
        if (ini_get("session.use_cookies")){
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"],
            $params["domain"], $params["secure"], $params["httponly"]);
            }
        session_destroy();
    }

    public function userData(string $user, string $pass): array{
        $conn = Connection::get();

        $usuarioDao = new UserDao($conn);
        $usuario = $usuarioDao->login($user);

        return $usuario;
    }

    public function resetPass(UserDto $dto): void{
        $conn = Connection::get();

        //AUTENTICACIÓN DEL USUARIO

        $usuarioDao = new UserDao($conn);
        $this->validateId($dto->getId());
        $usuarioDao->resetPass($dto->toArray());
    } 

    private function validateId(int $id): void{
        if($id == 0){
            throw new \Exception("No se especificó <strong>Id</strong> valido");
        }
    }
}