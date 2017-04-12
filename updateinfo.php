<?php
	session_start();
	include_once "conn.php";
	$user = mysqli_query($conn, "SELECT * FROM user WHERE user_id='".$_SESSION['user_id']."'");
	$curr = mysqli_fetch_array($user);

	if($_POST["email"]!=""){
		$edup = "SELECT email FROM user WHERE email = '{$_POST['email']}'";
		$check2 = mysqli_query($conn, $edup);
		if(mysqli_num_rows($check2) > 0){
			echo json_encode("EMAIL already exists!");
			exit();
		}
		$email = addslashes($_POST["email"]);
	}else{
		$email = addslashes($curr["email"]);
	}

	if($_POST["address"]!=""){
		$address = addslashes($_POST["address"]);
	}else{
		$address = addslashes($curr["address"]); 
	}

	if($_POST["contact_no"]!=""){
		$contact_no = $_POST["contact_no"]; 
	}else{
		$contact_no = $curr["contact_no"]; 
	}

	if($_POST['newpassword']!=""){
		if($curr["password"]==md5($_POST['oldpassword'])){
			$password = md5($_POST['newpassword']);
		}else {
			echo json_encode("PASSWORD given did not match old password");
			exit();
		}
	}else{
		$password = $curr["password"];
	} 

		$query = "UPDATE user SET email='{$email}', address='{$address}', contact_no='{$contact_no}', password='{$password}' WHERE user_id = '{$_SESSION['user_id']}'";
		$update = mysqli_query($conn, $query);

		$query = "SELECT * FROM user WHERE user_id='".$_SESSION['user_id']."'";
		$result2 = mysqli_query($conn,$query);

		while($row = mysqli_fetch_assoc($result2)){
			$set = $row;
		}

		echo json_encode($set);
?>
