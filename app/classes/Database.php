<?php

namespace App\classes;


class Database{

	public function dbcon(){

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "blog";
	$link = mysqli_connect($host,$user,$pass,$db);

	return $link;

	}

}

?>