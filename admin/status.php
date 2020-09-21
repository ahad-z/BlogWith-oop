<?php

require_once "../vendor/autoload.php";

$catStatus = new App\classes\Category();

if(isset($_GET['active'])){
    $id = $_GET['active'];
    $tblName = $_GET['sta'];
    $catStatus->status_active($id,$tblName);
    header('location:manage-category.php');
}

if(isset($_GET['inactive'])){
    $id = $_GET['inactive'];
    $tblName = $_GET['sta'];
    $catStatus->status_iactive($id,$tblName);
    header('location:manage-category.php');
}
if(isset($_GET['Active'])){
    $id = $_GET['Active'];
    $tblName = $_GET['sta'];
    $catStatus->status_active($id,$tblName);
    header('location:manage-blog.php');
}

if(isset($_GET['inActive'])){
    $id = $_GET['inActive'];
    $tblName = $_GET['sta'];
    $catStatus->status_iactive($id,$tblName);
    header('location:manage-blog.php');
}

?>