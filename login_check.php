<?php 
	require("conn.php");
	
	$email = addslashes($_POST["email"]);
	$password = addslashes($_POST["password"]);
	$password = md5($password);
	$user = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
	
	if(!$user){
		die("Query FAILED: ". mysqli_connect_error());
	}else{
		$row = mysqli_fetch_array($user);
		if($row["email"]){
			if($password == $row['password']){
				session_start();
				$_SESSION["user_id"] = $row["user_id"];
				$_SESSION["name"] = $row["name"];

				if($row['type']=="consumer"){
					header("Location: profile.php");
				}else{
					header("Location: adminPage.php");
				}
			}else{
				echo "<script>alert('Password Incorrect'); window.location.replace('index.php');</script>";
			}
		}else{
			echo "<script>alert('Email Incorrect'); window.location.replace('index.php');</script>";
		}
	}
	
?>
