<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/28/2017
 * Time: 6:42 PM
 */

namespace App\classes;


class Home
{
    public function getAllPublishedMainSidebar(){
        $sql="SELECT * FROM categories WHERE publication_status=1";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            $queryResult=  mysqli_query($link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function getAllPublishedSubSidebar(){
        $sql="SELECT * FROM subcategories WHERE publication_status=1";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            $queryResult=  mysqli_query($link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function getAllPublishedHeader(){
        $sql="SELECT * FROM headers WHERE publication_status=1";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            $queryResult=  mysqli_query($link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function getAllPublishedHomeDream(){
        $sql="SELECT * FROM home_dreams WHERE publication_status=1";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            $queryResult=  mysqli_query($link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($link));
        }
    }


    public function getAllPublishedImages(){
        $sql="SELECT * FROM pictures WHERE publication_status=1";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            $queryResult=  mysqli_query($link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($link));
        }
    }
}