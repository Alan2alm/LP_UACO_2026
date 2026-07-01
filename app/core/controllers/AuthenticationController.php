<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\models\dao\UserDao;
use app\core\models\dto\UserDto;
use app\core\services\AuthenticationService;
use app\libs\http\Request;
use app\libs\http\Response;

class AuthenticationController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response){
        $title = "Inicio de Sesion";
        $bg = "bg-dark";
        array_push($this->modules, "app/js/authentication/index.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function login(Request $request, Response $response){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $service = new AuthenticationService();
        $huboError = false;
        try{    
            $service->login($user, $pass);
        }catch(\Exception $e){
            $huboError = true;
            $error = $e->getMessage();
            if($e->getCode() === 1){
                $title = "Restaurar contraseña";
                $userData = $service->userData($user, $pass);
                $identificador = $userData['id'];
                $correo = $userData['correo'];
                array_push($this->modules, "app/js/authentication/reset.js");
                $request->setController(APP_AUTHENTICATION_CONTROLLER);
                $request->setAction(APP_RESET_ACTION);
                $this->setCurrentView($request);
                require_once(APP_FILE_TEMPLATE);
            }else{
                $title = "Inicio de Sesion";
                array_push($this->modules, "app/js/authentication/index.js");
                $request->setController(APP_AUTHENTICATION_CONTROLLER);
                $request->setAction(APP_DEFAULT_ACTION);
                $this->setCurrentView($request);
                require_once (APP_FILE_TEMPLATE);
            }
            
        };

        if($huboError !== true){
            $title = "Dashboard";
            $bg = "bg-light";
            $request->setController(APP_DEFAULT_CONTROLLER);
            $request->setAction(APP_DEFAULT_ACTION);
            $this->setCurrentView($request);
            require_once(APP_FILE_TEMPLATE);
        }
    }

    public function logout(Request $request, Response $response){
        $service = new AuthenticationService();
        $service->logout();
        $title = "Inicio de Sesion";
        $bg = "bg-dark";
        array_push($this->modules, "app/js/authentication/index.js");
        $this->view = APP_AUTHENTICATION_CONTROLLER . "/" . APP_DEFAULT_ACTION . ".php";
        require_once (APP_FILE_TEMPLATE);
    }

    public function reset(Request $request, Response $response){
        $title = "Listado de Usuarios";
        $bg = "bg-light";
        array_push($this->modules, "app/js/authentication/index.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function resetPass(Request $request, Response $response){
        $data['id'] = $_POST['id'];
        $data['correo'] = $_POST['correo'];
        $data['clave'] = $_POST['clave'];
        $data = $request->getDataFromInput();
        $dto = new UserDto($data);
        $service = new AuthenticationService();
        $service->resetPass($dto);
        $response->setMessage("Se restauro el usuario con éxito.");
        $response->send();
    }

}