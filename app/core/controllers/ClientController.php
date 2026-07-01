<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\models\dto\ClientDto;
use app\core\services\ClientService;
use app\libs\http\Request;
use app\libs\http\Response;

class ClientController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response){
        $title = "Listado de clientes";
        $bg = "bg-light";
        array_push($this->modules, "app/js/client/index.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function create(Request $request, Response $response){
        $title = "Crear nuevo cliente";
        $bg = "bg-dark";
        array_push($this->modules, "app/js/client/create.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function load(Request $request, Response $response){
        $data = $request->getId();
        $service = new ClientService();
        $service->load($data);
        $response->setMessage("Se cargo el cliente con éxito.");
        $response->send();
    }

    public function save(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new ClientDto($data);
        $service = new ClientService();
        $service->save($dto);
        $response->setMessage("Se registró el cliente con éxito.");
        $response->send();
    }

    public function edit(Request $request, Response $response){
        $title = "Editar cliente";
        $service = new ClientService();
        $result = $service->load($request->getId());
        array_push($this->modules, "app/js/client/edit.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function update(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new ClientDto($data);
        $service = new ClientService();
        $service->update($dto);
        $response->setMessage("Se actualizo el cliente con éxito.");
        $response->send();
    }

    public function delete(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new ClientDto($data);
        $service = new ClientService();
        $service->delete($dto);
        $response->setMessage("Se elimino el cliente con éxito.");
        $response->send();
    }

    public function list(Request $request, Response $response){
        $service = new ClientService();
        $result = $service->list($request->getDataFromInput());
        $response->setMessage("Se obtubo la lista de clientes con éxito.");
        $response->setData($result);
        $response->send();
    }

    public function toPdf(Request $request, Response $response){
        $title = "Documento de Lista de Clientes";
        array_push($this->modules, "app/js/user/pdf.js");
        $index = 'pdfTemplateClients.php';
        //$result = $request->getDataFromInput();
        $service = new ClientService();
        //$request->getDataFromInput()
        $result = $service->list();
        require_once(APP_PDF_GENERATE);
    }
    
    public function suggestive(Request $request, Response $response){

    }

}