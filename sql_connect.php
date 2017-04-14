<?php

$conn = mysqli_connect("localhost", "root", "", "shop");

if(!$conn){
	echo "Error connecting to database!";
	exit();
}

?>