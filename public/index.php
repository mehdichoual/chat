<?php
/**
 * Created by PhpStorm.
 * User: EChoual
 * Date: 29/03/2018
 * Time: 21:09
 */
require_once "../vendor/autoload.php";
require_once "../src/Controlllers/UserController.php";
require_once "../src/Controlllers/DefaultController.php";
if(!isset($_SESSION)) {
    session_start();
}
\Routes::root();
function clean_field($field)
{
    $field= htmlentities($field, ENT_QUOTES, "UTF-8");
    $field=str_replace("'", "\'", $field);
    return $field;
}