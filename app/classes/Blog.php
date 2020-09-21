<?php
namespace App\classes;
use App\classes\Database;


class Blog{

	public function postInsert($data){
		
		$files_name = $_FILES['photo']['name'];
		$files_name = explode('.',$files_name);
		$files_name = end($files_name);
		$photo_name = date('Ymdhis.').$files_name;
		$catID 	 = $data['cat_id'];
		$title   = $data['title'];
		$content = $data['content'];
		$status  = $data['status'];
		$name 	 = $data['name']; 
		

		$sql = "INSERT INTO `blog`(`cat_id`, `title`, `content`, `photo`, `name`, `status`) VALUES ('$catID','$title','$content','$photo_name','$name','$status')" ;
		$result = mysqli_query(Database::dbcon(),$sql);

		if($result){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/'.$photo_name);
			$insertmsg = "Blog Save Success!";
			return $insertmsg;
		}else{
			$insertmsg = "Blog Save failed!";
			return $insertmsg;
		}
		
	}
 
	public function allBlog(){

		$sql = "SELECT `blog`.*, `category`.`category_name` FROM `blog` INNER JOIN `category` ON `blog`.`cat_id`  = `category`.`id` ORDER BY `id` DESC ";
		$result = mysqli_query(Database::dbcon(),$sql);
		return $result;
	}
	public function showAllPost($id,$tableName){

	return mysqli_query(Database::dbcon(),"SELECT * FROM `$tableName` WHERE id='$id'");
		
	}
	public function editBlog($data){

		$catID 	 = $data['cat_id'];
		$title   = $data['title'];
		$content = $data['content'];
		$status  = $data['status'];
		$name 	 = $data['name'];
		$id 	 = $_POST['id'];
		if($_FILES['photo']['name']== NULL){

			$sql = "UPDATE `blog` SET `cat_id`='$catID',`title`='$title',`content`='$content',`name`='$name',`status`='$status' WHERE `id` = '$id'";
			$result = mysqli_query(Database::dbcon(),$sql);

			// $_SESSION['insertmsg'] = "Post Updated without Picture!";

		}else{

			$files_name = $_FILES['photo']['name'];
			$files_name = explode('.',$files_name);
			$files_name = end($files_name);
			$photo_name = date('Ymdhis.').$files_name;
			$sql = "UPDATE `blog` SET `cat_id`='$catID',`title`='$title',`content`='$content',`photo`='$photo_name',`name`='$name',`status`='$status' WHERE `id` = '$id'";
			$result= mysqli_query(Database::dbcon(),$sql);
			move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/'.$photo_name);

			// $_SESSION['insertmsg'] = "Post Updated";


		}

		if($result){

			header('location:blog_edit.php?id='.$id);

		}else{
			header('location:blog_edit.php?id='.$id);
			
		}

	}
}
?>