<?php
namespace App;

use PDO;

class cnx {
     
    
    const HOST = 'localhost';    
    const USER = 'root';    
    const PASSWORD = '';    
    const DB_NAME = 'mvc';

/**
 *  l'instance de PDO que retourne la sigleton
 *  @var \PDO
 */
    private static $instance;
    
    private function __contruct(){}
    
 /**
 * return PDO
 */
    public static function getInstance() {
        if(is_null(self::$instance)) {
            self::$instance = new \PDO(
                  'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME,
                  self::USER,
                  self::PASSWORD,
                    [
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,          
                    ]
                  );
        }
        return self::$instance;
    }
    
}
