<?php
/**
 * Created by PhpStorm.
 * User: EChoual
 * Date: 31/03/2018
 * Time: 23:45
 */

namespace Chat\Controllers;
use Chat\Entities\Message;
use Chat\Entities\User;
use Chat\Repository\CrudRepository;


class DefaultController
{
    public function verifConnected()
    {
        //echo $_SESSION['connected'];
        if (!isset($_SESSION['connected'])) {
            \Routes::redirectUrl('/chat/user/login/');
        }

    }
    function index()
    {
        self::verifConnected();
        $args=[];
        $crudUser =new CrudRepository("User","users");
        $crudMessage =new CrudRepository("Message","messages");
        $args["users"]=$crudUser->getAll([],['connected'=>'desc']);
        $args["messages"]=$crudMessage->getAll();
        $args["user"]=$crudUser->getObject(['id' => $_SESSION['connected']]);
        \Routes::RenderView('chat.php', $args);
    }
    function addmessage(){
        self::verifConnected();
        $args = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $crudUser =new CrudRepository("User","users");
            $user=$crudUser->getObject(['id' => $_SESSION['connected']]);
            $messages = clean_field($_POST['message']);
            $message = new Message();
            $message->setUsername($user->getUsername());
            $message->setMessage($messages);
            $message->setCreatedAt(date("d/m/Y H:i:s"));
            $crud =new CrudRepository("Message","messages");
            $idmessage= $crud->add($message);
            echo $idmessage;
            //\Routes::redirectUrl('/chat/default/index/');
        }
    }
}