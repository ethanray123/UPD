<?php   
  session_start();  
  if(!isset($_SESSION['user_id']) || !isset($_SESSION['shopping_cart'])){
        header("location: index.php");
  }

  require("conn.php");
  $create_transac_query = "INSERT INTO transac (date_of_transaction, transaction_status, consumer_id, discount, grand_total, delivery_location) VALUES ( CURDATE(), '{$_POST['transacstat']}', {$_SESSION['user_id']}, {$_POST['discount']}, {$_POST['grand_total']}, '{$_POST['delivery_location']}')";
  $create_transac = mysqli_query($conn,$create_transac_query);
  if($create_transac){
    $transac_no_query= mysqli_query($conn,"SELECT transaction_no from transac ORDER BY transaction_no DESC LIMIT 1");
    $tr_no = mysqli_fetch_assoc($transac_no_query);
    $update_list_no = "UPDATE transac SET list_no='{$tr_no['transaction_no']}' WHERE transaction_no = '{$tr_no['transaction_no']}'";
    $update = mysqli_query($conn, $update_list_no);
    if($update){
      foreach($_SESSION["shopping_cart"] as $keys => $values)  
      {   
        $insert_list = "INSERT INTO product_list (list_no, product_id, product_qnty) VALUES ({$tr_no['transaction_no']}, {$values['item_id']}, {$values['item_quantity']})";
        $insert_list_query= mysqli_query($conn,$insert_list);
      } 
      unset($_SESSION["shopping_cart"]);
    }
  }else{
    echo "<script>alert('unsuccessful insertion into transac')</script>";
  } 
 ?> 
<!DOCTYPE html>
<style type="text/css">
    .btn{
        color: white;
        background-color: #18BC9C;
        border-radius: 0px;
        font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
    }
    #register{
        padding-top: 30px;
    }
    #navitems:hover{
        text-decoration:none;
    }
    .navbar-right{
    padding-right:15px;
    }
    td .btn {
       margin-right: 5px; 
    }
    .user_id {
        display: none;
    }
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Up Pharma Down - Drug Database</title>
	<!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>
<body class="index animated fadeIn">
  <?php require("navbar.php"); ?>
  <section><br><br>
    <div class="container">  
      <br><br>
      <h2 align="center">Transaction Successful!</h2><br />  <br>
      <h4 align="center">You successfully posted a payment to your account.</h4>
      <h4 align="center">Payment on delivery: $ <?php echo number_format($_POST['grand_total'], 2); ?></h4>
      <h4 align="center">Date Created: 
        <?php 
          date_default_timezone_set("Asia/Manila");
          echo date("Y/m/d")." ".date("h:i:sa");
        ?>
      </h4>
    </div>  
  </section> 
</body>
</html>
<script src = 'js/jquery.min.js'></script>
<script>
$(document).ready(function(){
  	

});
</script>