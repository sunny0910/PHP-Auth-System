<?php

namespace PHP\controllers;

use PHP\models\Dbmodel;
use PHP\includes\RandomPassword;
use PHP\includes\Mymail;
use PHP\includes\validator;

class ForgetController
{

    public function forgetPassword()
    {
        $validate= new validator();
        $email = ($validate->email(filter_input(INPUT_POST, 'emailid')))?filter_input(INPUT_POST, 'emailid'):null;
        $checkmail= new Dbmodel();
        $ans= $checkmail->checkemail($email);
        if ($ans['count(email)'] == 1) {
            $forget= new RandomPassword();
            $pass=$forget->generatepassword(9);
            $mail= new Mymail();
            ob_start();
            include __DIR__ .'/../views/passwordmail.php';
            $body= ob_get_clean();
            $mail->mailsender($email, $pass, $body);
            echo '{"success": "Mail sent successfully"}';
        } else {
            echo '{"error": "email not found"}';
        }
    }
}
