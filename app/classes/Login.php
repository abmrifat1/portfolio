<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/20/2017
 * Time: 7:29 PM
 */

namespace App\classes;
use App\classes\Database;

class Login
{

    public function adminLoginCheck($data){
        $email=$data['email'];
        $password = md5($data['password']);
        $link=Database::db_connection();
        $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";

        if(mysqli_query($link,$sql)){
            $queryResult=  mysqli_query($link,$sql);
            $userInfo=mysqli_fetch_assoc($queryResult);
            if($userInfo){
                session_start();
                $_SESSION['id']=$userInfo['id'];
                $_SESSION['name']=$userInfo['name'];

                header('Location:dashboard.php');

            }else{
                $message='please use valid email address & password';
                return $message;
            }

        }else{
            die('Query Problem'.mysqli_error($link));
        }
    }
    public function adminLogout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);

        header('Location:index.php');

    }

}