<?php
if(isset($_POST['pid']) && isset($_POST['name']) && isset($_POST['brand']) && isset($_POST['price']) && isset($_POST['qty'])) {
    require('conn.php');
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    
    $query = "UPDATE product SET `name` = '{$name}', `brand`='{$brand}', `price` ='{$price}', `quantity` ='{$qty}' WHERE product_id = {$pid}";
    
    $result = mysqli_query($conn, $query);
    
    if($result) {
        header("location: product.php");
    } else {
        echo "<script>alert('Failed to edit product!'); window.location.href='product.php';</script>";
    }
} else {
    echo 'what';
}   
?>