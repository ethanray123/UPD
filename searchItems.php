<?php
	require("conn.php");
	$sql = "SELECT * FROM product WHERE name LIKE '%{$_POST['query']}%' OR generic_name LIKE '%{$_POST['query']}%' OR brand LIKE '%{$_POST['query']}%'";
	$result = mysqli_query($conn, $sql); 
	
	while($row = mysqli_fetch_assoc($result)){
		$set[] = $row;
	};
	

	echo json_encode($set);
?>