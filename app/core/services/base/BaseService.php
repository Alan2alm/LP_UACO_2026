<?php

namespace app\core\services\base;

use app\core\models\dao\base\InterfaceDao;

class BaseService{

    function __construct(protected InterfaceDao $dao)
    {
        
    }

}