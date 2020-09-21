<?php
namespace App\classes;

use App\classes\Database;

class Category{

	public function addCategory($data){

		$Category = $data['category'];
		$status = $data['status'];

		$sql = "INSERT INTO `category`(`category_name`, `status`) VALUES ('$Category','$status')";

		$result = mysqli_query(Database::dbcon(),$sql);

		if($result){

			$ErrorMsg = '<div class="alert alert-success" style= "text-align: center;" >'."Category Add Successfully!";
			return $ErrorMsg;

		}else{

			$ErrorMsg = '<div class="alert alert-danger" style= "text-align: center;" >' . "Category Not Save!";
			return $ErrorMsg;
			
		}
		
	}

	public function allCategory(){

		$result = mysqli_query(Database::dbcon(),"SELECT * FROM `category`");
		return $result;
	}

	public function status_active($id, $tableName){
		$sql = "UPDATE `$tableName` SET `status`= 1  WHERE `id` = '$id'";
		 mysqli_query(Database::dbcon(),$sql);
	}
	public function status_iactive($id,$tableName){
		$sql = "UPDATE `$tableName` SET `status`= 0 WHERE `id` = '$id'";
		 mysqli_query(Database::dbcon(),$sql);
	}
	public function delete($id,$tble_name){
		$sql = "DELETE FROM `$tble_name` WHERE `id` = '$id'";
		mysqli_query(Database::dbcon(),$sql);
	}

	public function showCategory($id,$tableName){

	return mysqli_query(Database::dbcon(),"SELECT * FROM `$tableName` WHERE id='$id'");
		
	}
	public function editCategory($data,$tableName){
		$id= $data['id'];
		$category_name = $data['category'];
		$status = $data['status'];
		$sql = "UPDATE `$tableName` SET `category_name`='$category_name',`status`='$status'  WHERE `id` = '$id'";
		$result = mysqli_query(Database::dbcon(),$sql);

		
		if($result) {
			$_SESSION['msg'] = '<div class="alert alert-success" style= "text-align: center;" >'."Category Updated Successfully!";
			// header('location:edit.php?id='.$id);
		}else{
			$_SESSION['msg'] = '<div class="alert alert-danger" style= "text-align: center;" >'. "Category Not Save!";
			// header('location:edit.php?id='.$id);
			
		}

	}
	public function allActiveCategory(){

		$result = mysqli_query(Database::dbcon(),"SELECT * FROM `category` WHERE `status` = 1 ");
		return $result;
	}
	public function allActivePost(){

		$result = mysqli_query(Database::dbcon(),"SELECT * FROM `blog` WHERE `status` = 1 ");
		return $result;
	}
	public function singlePost($id){
		$result = mysqli_query(Database::dbcon(),"SELECT * FROM `blog` WHERE `id` ='$id'");
		return $result;

	}
	public function CatchPost($id){

		$result = mysqli_query(Database::dbcon(),"SELECT * FROM `blog` WHERE `status` = 1 AND `cat_id` = $id");
		return $result;
	}
}

?>