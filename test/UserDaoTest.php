<?php

require_once '../app/config/database.php';
require_once '../app/libs/database/Connection.php';
require_once '../app/core/models/dao/base/InterfaceDao.php';
require_once '../app/core/models/dao/base/BaseDao.php';
require_once '../app/core/models/dao/UserDao.php';
require_once '../app/core/models/enums/UserProfile.php';

use app\core\models\dao\UserDao;
use app\core\models\enums\UserProfile;

try{
    $dao = new UserDao(app\libs\database\Connection::get());
    $dao->save([
        'apellido'  => 'Fernandez',
        'nombres'   => 'Miguel',
        'cuenta'    => 'miguel.fernandez',
        // 'perfil'    => UserProfile::ADMINISTRADOR->value,
        'perfil'    => 'Vendedor',
        'clave'     => 'miclave123',
        'correo'    => 'miguel@prueba.com'
        ]);
    echo 'Usuario registrado con éxito';
}
catch(\PDOException $ex){
    echo 'Error inesperado en BD: ' . $ex->getMessage();
}
catch(\Exception $ex){
    echo 'Error inesperado: ' . $ex->getMessage();
}