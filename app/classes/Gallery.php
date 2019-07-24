<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/1/2017
 * Time: 3:05 PM
 */

namespace App\classes;


class Gallery
{
    public function saveCategoryImage()
    {

        $link = Database::db_connection();

        $directory = '../assets/gallery/';
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
        $imageUrl = Gallery::saveCategoryImage();


        if ($imageUrl) {
            extract($data);
            $link = Database::db_connection();

            $sql = "INSERT INTO pictures(category_image,publication_status) 
                  VALUES('$imageUrl','$publication_status')";

            if (mysqli_query($link, $sql)) {
                $message = "Gallery Photo Save Successfully";
                return $message;
            } else {
                die('Query Problem' . mysqli_error($link));
            }
        }


    }

    public function getAllCategoryInfo()
    {

        $link = Database::db_connection();
        $sql = "SELECT * FROM pictures";
        if (mysqli_query($link, $sql)) {
            $queryResult = mysqli_query($link, $sql);

            return $queryResult;

        } else {
            die('Query Problem' . mysqli_error($link));
        }


    }
    public function getCategoryInfoById($id){
        $link = Database::db_connection();
        $sql="SELECT * FROM pictures WHERE id='$id'";
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
            $imageUrl=Gallery::saveCategoryImage();


            $sql="UPDATE pictures SET category_image='$imageUrl',publication_status='$publication_status'  WHERE id='$id'";
            if(mysqli_query($link,$sql)){
                header('Location:manage-gallery.php');

            }else{
                die('Query Problem'.mysqli_error($link));
            }

        }else{
            $sql="UPDATE pictures SET publication_status='$publication_status'  WHERE id='$id'";
            if(mysqli_query($link,$sql)){
                header('Location:manage-gallery.php');

            }else{
                die('Query Problem'.mysqli_error($link));
            }

        }
    }

    public function deleteCategoryInfoById($id){
        $sql="DELETE FROM pictures WHERE id='$id'";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            header('Location:manage-gallery.php');
        }
        else{
            die('Query Problem'.mysqli_error($link));
        }



    }

    public function getCategoryById($search_text){
        if ($search_text) {
            $link = Database::db_connection();

            $sql = "SELECT * FROM pictures WHERE id LIKE '%$search_text%'";
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
        $sql="UPDATE pictures SET publication_status=0 WHERE id='$id'";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            header('Location:manage-gallery.php');
        }
        else{
            die('Query Problem'.mysqli_error($link));
        }
    }

    public function publishedCategoryInfo($id){
        $sql="UPDATE pictures SET publication_status=1 WHERE id='$id'";
        $link=Database::db_connection();
        if(mysqli_query($link,$sql)){
            header('Location:manage-gallery.php');
        }
        else{
            die('Query Problem'.mysqli_error($link));
        }
    }
}