<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\models\dto\SaleDto;
use app\core\services\SaleService;
use app\libs\http\Request;
use app\libs\http\Response;

class SaleController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response){
        $title = "Listado de Ventas";
        $bg = "bg-light";
        array_push($this->modules, "app/js/sale/index.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function create(Request $request, Response $response){
        $title = "Nueva Venta";
        $bg = "bg-dark";
        array_push($this->modules, "app/js/sale/create.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function save(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new SaleDto($data);
        $service = new SaleService();
        $service->save($dto);
        $response->setMessage("Se registró la venta con éxito.");
        $response->send();
    }

    public function edit(Request $request, Response $response){
        $title = "Editar Venta";
        $service = new SaleService();
        $result = $service->load($request->getId());
        array_push($this->modules, "app/js/sale/edit.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function load(Request $request, Response $response){
        $service = new SaleService();
        $result = $service->load($request->getId());
        $response->setData($result);
        $response->setMessage("Se cargo la venta con éxito.");
        $response->send();
    }

    public function update(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new SaleDto($data);
        $service = new SaleService();
        $service->update($dto);
        $response->setMessage("Se actualizo la venta con éxito.");
        $response->send();
    }

    public function delete(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new SaleDto($data);
        $service = new SaleService();
        $service->delete($dto);
        $response->setMessage("Se elimino la venta con éxito.");
        $response->send();
    }

    public function list(Request $request, Response $response){
        $service = new SaleService();
        $result = $service->list($request->getDataFromInput());
        $response->setMessage("Se obtubo la lista de ventas con éxito.");
        $response->setData($result);
        $response->send();
    }

    public function toPdf(Request $request, Response $response){
        $title = "Documento de Lista de Ventas";
        array_push($this->modules, "app/js/user/pdf.js");
        $index = 'pdfTemplateSales.php';
        //$result = $request->getDataFromInput();
        $service = new SaleService();
        //$request->getDataFromInput()
        $result = $service->list();
        require_once(APP_PDF_GENERATE);
    }
    
    public function suggestive(Request $request, Response $response){

    }

}