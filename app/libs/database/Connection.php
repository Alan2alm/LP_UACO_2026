<?php
namespace app\libs\database;
/**
 * Descripción de Conexion
 * Singleton que devuelve una conexión a la base de datos.
 * @author Ing. Rasjido jose
 */
final class Connection {
    private static $connection = null;

    private function __construct(){}

    public static function get(): \PDO{
        if(self::$connection == null){
            self::$connection = new \PDO(
                DB_DSN,
                DB_USER,
                DB_PASS,
                array(
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ)
                );
        }
        return self::$connection;
    }
}
