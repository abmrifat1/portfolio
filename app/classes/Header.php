<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/30/2017
 * Time: 2:33 PM
 */

namespace App\classes;


class Header
{
    public function saveCategoryImage()
    {

        $link = Database::db_connection();

        $directory = '../assets/images_header/';
        $imageUrl = $directory . $_FILES['category_image']['name'];

        $check = getimagesize($_FILES['category_image']['tmp_name']);

        if ($check) {
            if (file_exists($imageUrl)) {
                echo 'File Already Exits.Please try another one';
            } else {
                if ($_FILES['category_image']['size'] > 5124000) {
                    echo 'File size is too large. Maximun image size is 5md';
                } else {
                    $fileType = pathinfo($imageUrl, PATHINFO_EXTENSION);
                    if ($fileType == 'jpg' || $fileType == 'png') {
                        move_uploaded_file($_FILES['category_image']['tmp_name'], $imageUrl);

                        return $imageUrl;
                    } else {
                        echo 'File type not valid.Please upload png or jpg image';
                    }
                }

            }

        } else {
            echo 'Please use an image file';
        }

    }

    public function saveCategoryInfo($data)
    {
        $imageUrl = Header::saveCategoryImage();


        if ($imageUrl) {
            extract($data);
            $link = Database::db_connection();

            $sql = "INSERT INTO headers(category_title,category_description,category_image,publication_status) 
                  VALUES('$category_title','$category_description','$imageUrl','$publication_status')";

            if (mysqli_query($link, $sql)) {
                $message = "Header Save Successfully";
                return $message;
            } else {
                die('Query Problem' . mysqli_error($link));
            }
        }


    }

    public function getAllCategoryInfo()
    {

        $link = Database::db_connection();
        $sql = "SELECT * FROM headers";
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);

            return $queryResult;

        } else {
            die('Query Problem' . mysqli_error($link));
        }


    }
    public function getCategoryInfoById($id){
        $link = Database::db_connection();
        $sql="SELECT * FROM headers WHERE id='$id'";
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
        $imageName = $_FILES['category_image']['name'];
        if($imageName){
            unlink($image_url);
            $imageUrl=Header::saveCategoryImage();
            $sql="UPDATE headers SET category_title='$category_title',category_description='$category_description',category_image='$imageUrl',publication_status='$publication_status'  WHERE id='$id'";
            if(mysqli_query($link,$sql)){
                header('Location:manage-header.php');

            }else{
                die('Query Problem'.mysqli_error($link));
            }

        }else{
            $sql="UPDATE headers SET category_title='$category_title',category_description='$category_description',publication_status='$publication_status'  WHERE id='$id'";
            if(mysqli_query($link,$sql)){
                header('Location:manage-header.php');

            }else{
                die('Query Problem'.mysqli_error($link));
            }

        }
    }

    public function deleteCategoryInfoById($id){
        $sql="DELETE FROM headers WHERE id='$id'";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            header('Location:manage-header.php');
        }
        else{
            die('Query Problem'.mysqli_error($link));
        }



    }

    public function getCategoryById($search_text){
        if ($search_text) {
            $link = Database::db_connection();

            $sql = "SELECT * FROM headers WHERE category_title LIKE '%$search_text%'";
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
        $sql="UPDATE headers SET publication_status=0 WHERE id='$id'";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            header('Location:manage-header.php');
        }
        else{
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function publishedCategoryInfo($id){
        $sql="UPDATE headers SET publication_status=1 WHERE id='$id'";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            header('Location:manage-header.php');
        }
        else{
            die('Query Problem'.mysqli_error($link));
        }
    }
}