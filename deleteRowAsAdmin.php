<?php
	if(isset($_POST['id'])) {
	    require('conn.php');
	    $user_id = $_POST['id'];
	    $query = "DELETE FROM user WHERE user_id = {$user_id}";
	    
	    $result = mysqli_query($conn, $query);
	    
	    echo $result;
	} else {
	    echo 'USER ID NOT SET';
	}
?>