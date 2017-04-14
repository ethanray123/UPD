<?php
	if(isset($_POST['tr_no'])) {
	    require('conn.php');
	    $transac_no = $_POST['tr_no'];
	    $query = "UPDATE transac SET transaction_status='PAID' WHERE transaction_no = {$transac_no}";
	    $result = mysqli_query($conn, $query);
	    
	    echo $result;
	} else {
	    echo 'USER ID NOT SET';
	}
?>