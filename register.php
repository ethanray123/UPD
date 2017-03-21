<?php
	require("conn.php");
	
	$name = addslashes($_POST["name"]);
	$email = addslashes($_POST["email"]);
	$password = addslashes($_POST["password"]);
	$password2 = addslashes($_POST["password2"]);
	$address = addslashes($_POST["address"]);
	$contact_no = addslashes($_POST["contact_no"]);
	$credit_card_no = addslashes($_POST["credit_card_no"]);
	$type = "consumer";
	
	$edup = "SELECT email FROM users WHERE email = '$email'";
	$check2 = mysqli_query($conn, $edup);

	if(mysqli_num_rows($check2) > 0){
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
			$user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
			$row = mysqli_fetch_array($user);
			$_SESSION["user_id"] = $row["user_id"];
			$_SESSION["name"] = $row["name"];
			
			header("Location: homepage.php");
		}else{
			echo"<script>alert('PASSWORD does not match');
			             window.location.href='index.html';</script>";
		}
	}
?>