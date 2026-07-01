<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\models\dto\UserDto;
use app\core\services\UserService;
use app\libs\http\Request;
use app\libs\http\Response;

class UserController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response){
        $title = "Listado de Usuarios";
        $bg = "bg-light";
        array_push($this->modules, "app/js/user/index.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function create(Request $request, Response $response){
        $title = "Crear nuevo usuario";
        $bg = "bg-dark";
        array_push($this->modules, "app/js/user/create.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function load(Request $request, Response $response){
        $data = $request->getId();
        $service = new UserService();
        $service->load($data);
        $response->setMessage("Se cargo el usuario con éxito.");
        $response->send();
    }

    public function save(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new UserDto($data);
        $service = new UserService();
        $service->save($dto);
        $response->setMessage("Se registró el usuario con éxito.");
        $response->send();
    }

    public function edit(Request $request, Response $response){
        $title = "Editar Usuario";
        $service = new UserService();
        $result = $service->load($request->getId());
        array_push($this->modules, "app/js/user/edit.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function update(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new UserDto($data);
        $service = new UserService();
        $service->update($dto);
        $response->setMessage("Se actualizo el usuario con éxito.");
        $response->send();
    }

    public function delete(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new UserDto($data);
        $service = new UserService();
        $service->delete($dto);
        $response->setMessage("Se elimino el usuario con éxito.");
        $response->send();
    }

    public function list(Request $request, Response $response){
        $service = new UserService();
        $result = $service->list($request->getDataFromInput());
        $response->setMessage("Se obtubo la lista de usuarios con éxito.");
        $response->setData($result);
        $response->send();
    }

    public function enable(Request $request, Response $response){
        $data = $request->getId();
        $service = new UserService();
        $service->enable($data);
        $response->setMessage("Se habilito el usuario con éxito.");
        $response->send();
    }

    public function disable(Request $request, Response $response){
        $data = $request->getId();
        $service = new UserService();
        $service->disable($data);
        $response->setMessage("Se deshabilito el usuario con éxito.");
        $response->send();
    }

    public function reset(Request $request, Response $response){
        $data = $request->getId();
        $service = new UserService();
        $service->reset($data);
        $response->setMessage("Se restauro el usuario con éxito.");
        $response->send();
    }

    public function resetByMail(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new UserDto($data);
        $service = new UserService();
        $service->resetByMail($dto);
        $response->setMessage("Se restauro el usuario con éxito.");
        $response->send();
    }

    public function toPdf(Request $request, Response $response){
        $title = "Documento de Lista de Usuarios";
        array_push($this->modules, "app/js/user/pdf.js");
        $index = 'pdfTemplateUsers.php';
        //$result = $request->getDataFromInput();
        $service = new UserService();
        //$request->getDataFromInput()
        $result = $service->list();
        require_once(APP_PDF_GENERATE);
    }
    
    public function suggestive(Request $request, Response $response){

    }

}