<?php
	require("conn.php");
	
	$name = addslashes($_POST["name"]);
	$email = addslashes($_POST["email"]);
	$password = addslashes($_POST["password"]);
	$password2 = addslashes($_POST["password2"]);
	$address = addslashes($_POST["address"]);
	$contact_no = addslashes($_POST["contact_no"]);
	$credit_card_no = addslashes($_POST["credit_card_no"]);
	$type = $_POST["type"];
	
	
	$edup = "SELECT email FROM user WHERE email = '$email'";
	$check = mysqli_query($conn, $edup);

	if(mysqli_num_rows($check) > 0){
		echo"<script>alert('EMAIL already exist');
					 window.location.href='index.php';
			</script>";
	}else{
		if($password == $password2){
			$password = md5($password);

			$sql = "INSERT INTO user (name, email, password, address, contact_no, credit_card_no, type) 
					VALUES ('$name', '$email', '$password', '$address', '$contact_no', '$credit_card_no', '$type')";
			$db = mysqli_query($conn, $sql);
			
			session_start();
			$user = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
			$row = mysqli_fetch_array($user);
			$_SESSION["user_id"] = $row["user_id"];
			$_SESSION["name"] = $row["name"];
			
			if($row['type']=="consumer"){
				header("Location: profile.php");
			}else if($row['type']=="admin"){
				header("Location: adminPage.php");
			}
		}else{
			echo"<script>alert('PASSWORD does not match');
			             window.location.href='index.html';</script>";
		}
	}
?>