<?php
	require("conn.php");
	
	$name = addslashes($_POST["name"]);
	$genName = addslashes($_POST["genName"]);
	$brand = addslashes($_POST["brand"]);
	$price = addslashes($_POST["price"]);
	$dosage = addslashes($_POST["dosage"]);
	$quantity = $_POST["qty"];
	$expiryDate = $_POST["expiryDate"];
	
	
	$prodquery = "SELECT product_id FROM product WHERE name = '$name' AND dosage = '$dosage";
	$check = mysqli_query($conn, $prodquery);

	if(mysqli_num_rows($check) > 0){
		echo"<script>alert('Product Already Exists');
					 window.location.href='product.php';
			</script>";
	}else{
		$expiryCheck = date_diff(date_create($expiryDate), date_create('today'))->m;
		if($expiryCheck > 0){
			$sql = "INSERT INTO product (name, generic_name, brand, price, dosage, quantity, expiry_date) 
				VALUES ('$name', '$genName', '$brand', '$price', '$dosage', '$quantity', '$expiryDate')";
			$db = mysqli_query($conn, $sql);
			echo"<script>
					 window.location.href='product.php';
				</script>";
		}else{
			echo"<script>alert('Invalid Product Expiry Date. Product must have at least 1 month shelf life');
					 window.location.href='product.php';
				</script>";
		}
	}
?>
