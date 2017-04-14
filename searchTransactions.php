<?php
	require("conn.php");
	$sql = "SELECT * FROM transac WHERE date_of_transaction LIKE '%{$_POST['query']}%' OR transaction_status='{$_POST['query']}' OR consumer_id='{$_POST['query']}' OR delivery_location LIKE '%{$_POST['query']}%'";
	$result = mysqli_query($conn, $sql); 
	
	while($row = mysqli_fetch_assoc($result)){
		$set[] = $row;
	};
	

	echo json_encode($set);
?>