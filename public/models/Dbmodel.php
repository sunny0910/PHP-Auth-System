<?php

namespace PHP\models;

use PHP\DbConnection;
use PHP\schema;
use php\includes\Registercontroller;
use \PDO;

class Dbmodel
{

    public function insert($data)
    {
        $DBH=DbConnection::getInstance();
        $conn=$DBH->getConnection();
        $STH= $conn->prepare("insert into user (`name`, `phone`, `gender`, `email`, `username`, `password`) value (:name, :phone, :gender, :email, :username, :password);");
        try {
            $STH->execute($data);
        } catch (PDOException $e) {
        }
    }

    public function checkuserindb($userobj)
    {
        $DBH=DbConnection::getInstance();
        $conn=$DBH->getConnection();
        $STH= $conn->prepare("select id, username, password from user where username=:username and password=:password;");

        $STH->setFetchMode(PDO::FETCH_ASSOC);
        try {
            $STH->execute($userobj);
            $user;
            return $user=$STH->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getuserdata($user_id)
    {
        $DBH=DbConnection::getInstance();
        $conn=$DBH->getConnection();
        $STH= $conn->prepare("select id, name, phone, gender, email, username, password from user where id=:user_id;");
        $STH->bindParam(':user_id', $user_id);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        try {
            $STH->execute();
            return $STH->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update($update)
    {
        $DBH= DbConnection::getInstance();
        $conn = $DBH-> getConnection();
        $STH= $conn->prepare("update user set name= :name, phone= :phone, gender= :gender, email= :email, password= :password where id=:id");
        try {
            $STH->execute($update);
            return $this->getuserdata($update['id']);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function checkemail($email)
    {
        $DBH= DbConnection::getInstance();
        $conn = $DBH-> getConnection();
        $STH= $conn->prepare("select count(email) from user where email=:email");
        $STH->bindParam(':email', $email);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        try {
            $STH->execute();
            $ans;
            return $ans=$STH->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function checkUserexists($verify)
    {
        $DBH= Dbconnection::getInstance();
        $conn = $DBH->getConnection();
        $STH1= $conn->prepare("select email from user where email=:email");
        $STH2= $conn->prepare("select phone from user where phone=:phone");
        $STH3= $conn->prepare("select username from user where username=:username");

        $STH1->bindParam(':email', $verify['email']);
        $STH2->bindParam(':phone', $verify['phone']);
        $STH3->bindParam(':username', $verify['username']);


        $STH1->setFetchMode(PDO::FETCH_ASSOC);
        $STH2->setFetchMode(PDO::FETCH_ASSOC);
        $STH3->setFetchMode(PDO::FETCH_ASSOC);

        try {
            $STH1->execute();
            $STH2->execute();
            $STH3->execute();
            if ($STH1->rowCount()==0 || $STH2->rowCount()==0 || $STH3->rowCount()==0) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
