<?php
	$conn = mysqli_connect("localhost", "root", "", "uppharmadown");
	if(!$conn){
		echo "Not Connecting to the database";
		exit();
	}
?>