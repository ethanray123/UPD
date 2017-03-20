<?php
	require("database_config.php");
	if(!empty($_POST['password']) && !empty($_POST['username'])){
		$hashpass = md5($_POST['password']);
		$username = $_POST['username'];
		$sql = "SELECT * from users WHERE username = '{$username}' and password = '{$hashpass}'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1){
			echo "LOGIN SUCCESSFUL!";
		}else{
			header("location:login.php");
		}
	}else{
		echo "you suck!";
	}
?>