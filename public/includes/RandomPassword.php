<?php
namespace PHP\includes;

class RandomPassword
{
    public function generatepassword($length = 9)
    {
        $alpha =  'abcdefghijklmnopqrstuvwxyz';
        $num='0123456789';
        $sym='!@#$';
        $str = '';
        for ($i=0; $i < $length/3; $i++) {
            $str .= $alpha[mt_rand(0, 25)];
            $str .= $num[mt_rand(0, 9)];
            $str .= $sym[mt_rand(0, 3)];
        }
        return $str;
    }
}
