<?php

require_once "../vendor/autoload.php";

$catDelete = new App\classes\Category();

if(isset($_GET['cat'])){

    $id = $_GET['id'];
    $tbl = $_GET['cat'];

    $catDelete->delete($id,$tbl);
 	header('location:manage-category.php');
 
}
if(isset($_GET['del'])){

    $id = $_GET['id'];
    $tbl = $_GET['del'];

    $catDelete->delete($id,$tbl);
 	header('location:manage-blog.php');
 
}

?>