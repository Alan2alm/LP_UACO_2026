<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\services\SaleService;
use app\core\services\UserService;
use app\core\services\ClientService;
use app\libs\http\Request;
use app\libs\http\Response;

class HomeController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response){
        $title = "Dashboard";
        $bg = "bg-light";
        $SaleService = new SaleService();
        $cantVentas = $SaleService->cantItem();
        $total_ganancias = $SaleService->totalSales();
        $UserService = new UserService();
        $cantUsuarios = $UserService->cantItem();
        $ClientService = new ClientService();
        $cantClientes = $ClientService->cantItem();
        array_push($this->modules, "app/js/home/index.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

}