<?php

namespace PHP\controllers;

use PHP\models\Dbmodel;
use PHP\includes\validator;

class Editcontroller
{


    public $loggedIn = false;

    public function __construct($user)
    {
        if ($user) {
            $this->loggedIn = true;
            $this->user= $user;
        }
    }


    public function viewedit($success)
    {
        $success;
        include 'views/edit.php';
    }

    public function editaccount()
    {
        $validate = new validator();
        $editsubmit = filter_input(INPUT_POST, 'editsubmit');
        $password = filter_input(INPUT_POST, 'password');
        $newpassword = ($validate->password(filter_input(INPUT_POST, 'password')))?filter_input(INPUT_POST, 'password'):null;
        if (isset($editsubmit)) {
            $userobj = array(
            "id" => $this->user['id'],
            "name" => ($validate->name(filter_input(INPUT_POST, 'name')))?filter_input(INPUT_POST, 'name'):null,
            "phone" => ($validate->phone(filter_input(INPUT_POST, 'phone')))?filter_input(INPUT_POST, 'phone'):null,
            "gender" => filter_input(INPUT_POST, 'gender'),
            "email" => ($validate->email(filter_input(INPUT_POST, 'email')))?filter_input(INPUT_POST, 'email'):null,
            "password" => (strlen($password)==0)?$this->user['password']:md5($newpassword),
                    );
            $editdata= new Dbmodel();
            $this->user=$editdata->update($userobj);
            return true;
        }
    }
}
