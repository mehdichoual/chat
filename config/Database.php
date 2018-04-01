<?php
/**
 * Created by PhpStorm.
 * User: EChoual
 * Date: 29/03/2018
 * Time: 20:49
 */
class Database
{
    private static $instance = NULL;



    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $DBhost="localhost";
            $DBname="ilyeum_chat";
            $DBUser="root";
            $DBPwd="";
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=ilyeum_chat','root', '', $pdo_options);
        }
        return self::$instance;
    }
}