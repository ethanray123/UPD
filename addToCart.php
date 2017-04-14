<?php
require("conn.php");

$search = "SELECT * FROM product WHERE name LIKE '%{$_POST['query']}%'";

$result = mysqli_query($conn, $search);

while($row = mysqli_fetch_assoc($result)){
	$set[] = $row;
}

echo json_encode($set);

?>