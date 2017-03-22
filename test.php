<?php
	require("conn.php");
	$sql = "SELECT * FROM user WHERE name = 'Robert'";
	$result = mysqli_query($conn,$sql);
	var_dump($result);
	while($row = mysqli_fetch_assoc($result)){
		$set[] = $row;
	}
	var_dump($set);
?>