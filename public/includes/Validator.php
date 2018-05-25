<?php

namespace PHP\includes;

class Validator
{
    public function name($str)
    {
        return preg_match("/^[A-z]+\s?[A-z]+$/", $str);
    }
    public function phone($str)
    {
        return preg_match("/^(\+91|0)?[1-9]{1}\d{9}$/", $str);
    }
    public function email($str)
    {
        return preg_match("/^[a-z]+\.?[a-z]+@[a-z]+\.[a-z].+\.?[a-z]?$/", $str);
    }
    public function username($str)
    {
        return preg_match("/^\w+_?\w*\S$/", $str);
    }
    public function password($str)
    {
        return preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{4,17}$/", $str);
    }
    public function confirmpassword($pass, $str)
    {
        if ($pass==$str) {
            return true;
        } else {
            false;
        }
    }
}
