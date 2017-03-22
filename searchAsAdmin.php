<?php
	require("conn.php");
	
	$sql = "SELECT * FROM user WHERE name LIKE '%{$_POST['query']}%'";
	$result = mysqli_query($conn,$sql);
	
	$set = array();
	while($row = mysqli_fetch_assoc($result)){
		$set[] = $row;
	}

	header('Content-Type: application/json');
	echo json_encode($set);
?>