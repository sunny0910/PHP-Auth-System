<?php
namespace PHP;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
use PHP\controllers\Homecontroller;
use PHP\controllers\Logincontroller;
use PHP\controllers\Registercontroller;
use PHP\controllers\Editcontroller;
use PHP\controllers\ForgetController;
use PHP\includes\Validator;
use PHP\models\Dbmodel;

session_start();

$url= $_SERVER['REQUEST_URI'];
$method= $_SERVER['REQUEST_METHOD'];

$login= new Logincontroller();
$user = $login->isLoggedin();
$home= new Homecontroller($user);
$register=new Registercontroller($user);
$edit= new Editcontroller($user);
$forget= new ForgetController();
$validate= new Validator();

$checklogin = new Dbmodel();
if ($user) {
    $user= $checklogin->getuserdata($_SESSION['user_id']);
}

switch ($url) {
case ($url=='/register' && $method=='POST'):
    if (!$user) {
        if ($register->checkUserexists()) {
            $register->userExists=true;
            $register->viewregister();
            break;
        }
        if (!$register->insertdata()) {
            $register->alert=true;
            $register->viewregister();
            break;
        }
        header('Location: login');
        break;
    } else {
        header('Location: home');
        break;
    }

case ($url=='/login' && $method=='POST'):
    $login->checkuser();
    break;

case ($url=='/register' && $method=='GET'):
    $register->viewregister();
    break;

case ($url=='/login' && $method=='GET'):
    if ($user) {
        header('Location: home');
    }
    $login->viewlogin();
    break;

case ($url=='/editaccount' && $method=='GET'):
    if ($user) {
        $success= false;
        $edit->viewedit($success);
    } else {
        header('Location: home');
    }
    break;

case ($url=='/editaccount' && $method=='POST'):
    $success=$edit->editaccount();
    $edit->viewedit($success);
    break;

case ($url=='/logout'):
    if ($user) {
        session_unset();
        header('Location: home');
    }
    break;

case ($url=="/home"):
    $home->viewhome();
    break;

case ($url=='/ajax/sendpassword/' && $method=='POST'):
    $forget->forgetpassword();
    break;

case ($url=='/' || $url== ''):
    $home->viewhome();
    break;

default:
    include 'includes/404.html';
    break;
}
