<?php

namespace PHP\controllers;

use PHP\models\Dbmodel;
use PHP\includes\validator;

class Logincontroller
{
    public $loggedIn = false;

    public function __construct()
    {

    }

    public static function viewlogin()
    {
        include 'views/login.php';
    }

    public function checkuser()
    {
        $validate= new validator();
        $loginsubmit= filter_input(INPUT_POST, 'loginsubmit');
        $userobj;

        if (isset($loginsubmit)) {
            $userobj= [
            "username" => ($validate->username(filter_input(INPUT_POST, 'username')))?filter_input(INPUT_POST, 'username'):null,
            "password" => ($validate->password(filter_input(INPUT_POST, 'password')))?filter_input(INPUT_POST, 'password'):null
            ];
        }
        $userobj['password']=md5($userobj['password']);
        $checklogin = new Dbmodel;
        $userlogin=$checklogin->checkuserindb($userobj);

        if (!$userlogin) {
            $error='Wrong Credentials';
            $error;
            include 'views/login.php';
        }
            $_SESSION['user_id'] = $userlogin['id'];
            $_SESSION['logged_in'] = true;
            $_SESSION['count']= 1;
            header("Location: home");
    }

    public function isLoggedin()
    {
        $loggedIn= (isset($_SESSION['logged_in']))?$_SESSION['logged_in']:null;
        if (isset($loggedIn)) {
            $checklogin = new Dbmodel;
             return $checklogin->getuserdata($_SESSION['user_id']);
        }
        return false;
    }
}
