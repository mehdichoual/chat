<?php
/**
 * Created by PhpStorm.
 * User: EChoual
 * Date: 29/03/2018
 * Time: 21:04
 */

namespace Chat\Controllers;
use Chat\Entities\User;
use Chat\Repository\CrudRepository;

class UserController
{
    function index()
    {
        $this->verifConnected();
        $args=[];
        \Routes::RenderView('login.php', $args);
    }
    function logout(){
        $args=[];
        $crud =new CrudRepository("User","users");
        $modelUser = $crud->getObject(['id' => $_SESSION['connected']]);
        $modelUser->setConnected("0");
        $crud->updateConnect($modelUser);
        unset($_SESSION['connected']);
        \Routes::redirectUrl('/chat/user/login/');
    }
    public function verifConnected()
    {
        if (isset($_SESSION['connected'])) {
           \Routes::redirectUrl('/chat/user/login/');
        }

    }
    function register(){
        self::verifConnected();
        $args=[];
        \Routes::RenderView('register.php', $args);
    }
    function login()
    {
       // // var_dump($_SESSION);
        $args=[];
        \Routes::RenderView('login.php', $args);
    }
    function registerpost()
    {
        $args = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = clean_field($_POST['username']);
            $password = clean_field($_POST['password']);
            $user = new User();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->hashPwd();
            $user->setCreatedAt(date("d/m/Y H:i:s"));
            $user->setConnectedAt(date("d/m/Y H:i:s"));
            $crud =new CrudRepository("User","users");
            $modelUser = $crud->getObject(['username' => $user->getUsername()]);
            if ($modelUser) {
                $args["message"]="Ce nom d'utilisateur est déjà attribué";
                \Routes::RenderView('login.php', $args);
            }
            else{
                $idUser= $crud->add($user);
                $_SESSION['connected'] = $idUser;
                \Routes::redirectUrl("\chat\default\index\\");
            }

        }
    }
    function loginpost(){
        $args = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = clean_field($_POST['username']);
            $password = clean_field($_POST['password']);
            $user = new User();
            $user->setUsername($username);
            $user->setPassword($password);
            //$user->hashPwd();
            $crud =new CrudRepository("User","users");
            $modelUser = $crud->getObject(['username' => $user->getUsername()]);

            if ($modelUser) {
                if (password_verify($user->getPassword(),$modelUser->getPassword())) {
                    $_SESSION['connected'] = $modelUser->getId();
                    $modelUser->setConnected("1");
                    $modelUser->setConnectedAt(date("d/m/Y H:i:s"));
                    $crud->updateConnect($modelUser);
                    \Routes::redirectUrl('\chat\default\index\\');
                }
                else{
                    $args["message"]="Désolé :( votre nom d'utilisateur ou votre mot de passe semblent erronés.";
                    \Routes::RenderView('login.php', $args);
                }
            }
            else{

                $args["message"]="Désolé :( votre nom d'utilisateur ou votre mot de passe semblent erronés.";
                \Routes::RenderView('login.php', $args);

            }

        }
    }
    function allusers(){
        self::verifConnected();
        $args = [];
        $crud =new CrudRepository("User","users");
        // // var_dump($crud->getAll());

    }

}