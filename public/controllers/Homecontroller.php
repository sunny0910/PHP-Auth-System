<?php
namespace PHP\controllers;

class Homecontroller
{

    public $logged = false;

    public function __construct($user)
    {
        if ($user) {
            $this->logged = true;
        }
    }

    public function viewhome()
    {
        include "views/home.php";
    }
}
