<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/1/2017
 * Time: 1:52 AM
 */

namespace App\classes;


class Dreams
{



    public function saveCategoryInfo($data)
    {




            extract($data);
            $link = Database::db_connection();

            $sql = "INSERT INTO home_dreams(category_description,publication_status) 
                  VALUES('$category_description','$publication_status')";

            if (mysqli_query($link, $sql)) {
                $message = "Header Save Successfully";
                return $message;
            } else {
                die('Query Problem' . mysqli_error($link));
            }
        }



    public function getAllCategoryInfo()
    {

        $link = Database::db_connection();
        $sql = "SELECT * FROM home_dreams";
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);

            return $queryResult;

        } else {
            die('Query Problem' . mysqli_error($link));
        }


    }
    public function getCategoryInfoById($id){
        $link = Database::db_connection();
        $sql="SELECT * FROM home_dreams WHERE id='$id'";
        if(mysqli_query($link,$sql)){
            $queryResult=mysqli_query($link,$sql);
            return  $queryResult;
        }else{
            die('Query Problem'.mysqli_error($link));
        }
    }
    public function updateCategoryInfo($data,$id){
        extract($data);
        $link=Database::db_connection();


            $sql="UPDATE home_dreams SET category_description='$category_description',publication_status='$publication_status'  WHERE id='$id'";
            if(mysqli_query($link,$sql)){
                header('Location:manage-home-dream.php');

            }else{
                die('Query Problem'.mysqli_error($link));
            }


    }

    public function deleteCategoryInfoById($id){
        $sql="DELETE FROM home_dreams WHERE id='$id'";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            header('Location:manage-home-dream.php');
        }
        else{
            die('Query Problem'.mysqli_error($link));
        }



    }

    public function getCategoryById($search_text){
        if ($search_text) {
            $link = Database::db_connection();

            $sql = "SELECT * FROM home_dreams WHERE category_description LIKE '%$search_text%' OR id LIKE '%$search_text%'";
            if (mysqli_query($link, $sql)) {
                $queryResult = mysqli_query($link, $sql);
                return $queryResult;
            } else {
                die('Query Problem' . mysqli_error($link));
            }
        }else{
            die('put Category Title In Search Box');
        }
    }

    public function unpublishedCategoryInfo($id){
        $sql="UPDATE home_dreams SET publication_status=0 WHERE id='$id'";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            header('Location:manage-home-dream.php');
        }
        else{
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function publishedCategoryInfo($id){
        $sql="UPDATE home_dreams SET publication_status=1 WHERE id='$id'";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            header('Location:manage-home-dream.php');
        }
        else{
            die('Query Problem'.mysqli_error($link));
        }
    }
}
