<?php

namespace PHP\controllers;

use PHP\models\Dbmodel;
use PHP\includes\validator;
use PHP\includes\Mymail;
use PHP\includes\RandomPassword;

class Registercontroller
{
    public $data;
    public $loggedIn = false;
    public $userExists= false;
    public $alert= false;

    public function __construct($user)
    {
        if ($user) {
            $this->loggedIn = true;
        }
    }

    public function viewregister()
    {
        include_once "views/register.php";
    }

    public function insertdata()
    {
        $validate= new validator();
        $registersubmit= filter_input(INPUT_POST, 'registersubmit');
        if (isset($registersubmit)) {
            $data= array(
            "name" => ($validate->name(filter_input(INPUT_POST, 'name')))?filter_input(INPUT_POST, 'name'):null,
            "phone" => ($validate->phone(filter_input(INPUT_POST, 'phone')))?filter_input(INPUT_POST, 'phone'):null,
            "gender" => filter_input(INPUT_POST, 'gender'),
            "email" => ($validate->email(filter_input(INPUT_POST, 'email')))?filter_input(INPUT_POST, 'email'):null,
            "username" => ($validate->username(filter_input(INPUT_POST, 'username')))?filter_input(INPUT_POST, 'username'):null,
            "password" => ($validate->password(filter_input(INPUT_POST, 'password')))?filter_input(INPUT_POST, 'password'):null
                );
            if (!$validate->confirmpassword(filter_input(INPUT_POST, 'confirmpassword'), $data['password'])) {
                return false;
            }
            $data['password']=md5($data['password']);
            $insertdata= new Dbmodel();
            $insertdata->insert($data);
            echo "<script> $('.load').show(); </script>";
            $mail= new Mymail();
            ob_start();
            include __DIR__ .'/../views/welcomemail.php';
            $body= ob_get_clean();
            $email= $data['email'];
            $pass= $data['password'];
            $mail->mailsender($email, $pass, $body);
            echo "<script> $('.load').hide(); </script>";
            return true;
        }
    }

    public function checkUserexists()
    {
        $verify= array(
        "email" => filter_input(INPUT_POST, 'email'),
        "phone" => filter_input(INPUT_POST, 'phone'),
        "username" => filter_input(INPUT_POST, 'username')
            );
        $checkUser= new Dbmodel();
        if (!$checkUser-> checkUserexists($verify)) {
            return false;
        } else {
            return true;
        }
    }
}
