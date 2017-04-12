<?php
	if(isset($_POST['id'])) {
	    require('conn.php');
	    $pid = $_POST['id'];
	    $query = "DELETE FROM product WHERE product_id = {$pid}";
	    
	    $result = mysqli_query($conn, $query);
	    
	    echo $result;
	} else {
	    echo 'PID NOT SET';
	}
?>