<?php
	require("conn.php");
	$sql = "DELETE FROM user WHERE user_id = {$_POST['query']}";
	$result = mysqli_query($conn, $sql);

	echo json_encode($result);
?>