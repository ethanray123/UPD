<?php   
 session_start();  
 if(!isset($_SESSION['user_id']) || !isset($_SESSION['shopping_cart'])){
        header("location: index.php");
  }
 require("conn.php");
 $connect = mysqli_connect("localhost", "root", "", "uppharmadown");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           { 
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'             =>     $_POST["hidden_name"], 
                     'item_dosage'           =>     $_POST["hidden_dosage"],
                     'item_price'            =>     $_POST["hidden_price"],  
                     'item_quantity'         =>     $_POST["quantity"]  
                );  

                if(!isset($_SESSION["shopping_cart"][$count])){
                  $_SESSION["shopping_cart"][$count] = $item_array;
                }else{
                  $i=0;
                  while(isset($_SESSION["shopping_cart"][$i])){
                    $i++;
                  }
                  $_SESSION["shopping_cart"][$i] = $item_array;
                }
                echo '<script>window.location="cart.php"</script>'; 
                    
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'             =>     $_POST["hidden_name"],  
                'item_price'            =>     $_POST["hidden_price"],  
                'item_quantity'         =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
           echo '<script>window.location="cart.php"</script>';  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     $count = count($_SESSION["shopping_cart"]);
                     echo '<script>alert("'.$count.'")</script>';
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
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
                <h3 align="center">UPD Shop</h3><br />  
                
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]."  (".$values["item_dosage"].")"; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]); 

                               }  
                    
                               $query = "SELECT * FROM user WHERE user_id='{$_SESSION['user_id']}'";
                               $result = mysqli_query($conn, $query);
                                              
                               if($result) {
                                  $row = mysqli_fetch_assoc($result);
                               }
                               if((date_diff(date_create($row['dob']), date_create('today'))->y) > 59){
                                  $discount = $total * 0.20;
                               }else{
                                  $discount = 0.00;
                               }
                               $grandtotal = $total - $discount;
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Sub-Total</td>  
                               <td colspan="2" align="left">$ <?php echo number_format($total, 2); ?></td>  
                          </tr>  
                          <tr>
                               <td colspan="3" align="right">Discount</td>  
                               <td colspan="2" align="left">$ <?php echo number_format($discount, 2); ?></td>  
                          </tr>
                          <tr>
                               <td colspan="3" align="right">Grand-Total</td>  
                               <td colspan="2" align="left">$ <?php echo number_format($grandtotal, 2); ?></td>  
                          </tr>
                          <?php  
                          }  
                          foreach($_SESSION["shopping_cart"] as $keys => $values)  
                          {  
                             echo "<script>console.log('item_id:'+".$values["item_id"].");</script>";
                             echo "<script>console.log('item_quantity:'+".$values["item_quantity"].");</script>";
                          }  
                          ?>   
                     </table>  
                     <br><h3>Customer Details</h3> <br>
                     <?php
                        echo "<h4><span>Customer Name: ".$_SESSION['name']."</span>";
                        echo "<br><span>Address: ".$row['address']."</span>";
                        echo "<br><span>Mobile No.: ".$row['contact_no']."</span></h4><br>";
                     ?>
                     <form method="POST" action="addTransac.php" class="form">
                         <input type="hidden" name="dot" value="<?php echo 'date("Y/m/d")'; ?>">
                         <input type="hidden" name="transacstat" value="NOTPAID">
                         <input type="hidden" name="discount" value="<?php echo $discount; ?>">
                         <input type="hidden" name="grand_total" value="<?php echo number_format($grandtotal, 2); ?>">
                         <input type="hidden" name="delivery_location" value="<?php echo $row['address']; ?>">
                         <input class='btn btn-success' type="submit" name="addTransac" value="Confirm Purchase">
                     </form>
                     <?php
                        echo "<script>console.log('" . date("Y/m/d") . "')</script><br>";
                     ?>
                </div>  
           </div>  
  </section> 
</body>
</html>
<script src = 'js/jquery.min.js'></script>
<script>
$(document).ready(function(){
  	

});
</script>