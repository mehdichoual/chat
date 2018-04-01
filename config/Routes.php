<?php
/**
 * Created by PhpStorm.
 * User: EChoual
 * Date: 29/03/2018
 * Time: 20:42
 */
class Routes
{
    public static function root()
    {
        list($domain,$project, $controller, $action) = explode('/', $_SERVER['REQUEST_URI']);
        self::execAction($controller, $action);
    }

    public static function execAction($controller, $action)
    {
        $controller=($controller)?:'default';
        $action=($action)?:'index';
        $controller=ucfirst($controller);
        $controller = "Chat\Controllers\\".$controller."Controller";
        if (class_exists($controller)) {
            $controller = new $controller();
            if (method_exists($controller, $action)) {
                $controller->$action();
            }
        }
    }
    public static function renderView($template, array $args = array())
    {
        extract($args);
        include ('../src/views/'.$template);

    }

    public static function redirectUrl($url)
    {
        header("location: $url",true,302);
        exit();
    }
}