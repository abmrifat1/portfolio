<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/2017
 * Time: 12:47 AM
 */

namespace App\classes;


class Database
{
    public function db_connection(){
        $hostName="localhost";
        $userName="root";
        $password="";
        $dbName="protfolio";
        $link=mysqli_connect($hostName,$userName,$password,$dbName);

        return $link;

    }
}