<?php   
 session_start();  
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
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
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
        padding: 
        background-color: #18BC9C;
        border-radius: 0px;
        font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
    }
    #register{
        padding-top: 30px;
    }
    .btn{
        color: white;
        padding: 
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
  #adminname{
    margin-left:15px;
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
                <input type = 'text' id = 'search' placeholder = 'Press Enter after typing to search' class = 'form-control'>
                <table class="table table-bordered">
                <tr>  
                     <th>Product Name</th>
                     <th>Generic Name</th>
                     <th>Brand</th>
                     <th>Content</th>
                     <th>Expiry Date</th> 
                     <th>Price</th> 
                     <th>Quantity</th> 
                     <th>Action</th>  
                </tr> 
                <tbody id = 'results'>
                <?php  
                $query = "SELECT * FROM product ORDER BY product_id ASC";   
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <tr>
                    <form class='addcart' method="post" action="cart.php?action=add&id=<?php echo $row["product_id"]; ?>">
                     <td><h4 class="text-info"><?php echo $row["name"]; ?></h4></td>  
                     <td><?php echo $row["generic_name"]; ?></td>
                     <td><?php echo $row["brand"]; ?></td>
                     <td><?php echo $row["dosage"]; ?></td>
                     <td><?php echo $row["expiry_date"]; ?></td>
                     <td><h4 class="text-danger">$ <?php echo $row["price"]; ?></h4></td>  
                     <td><input type="number" name="quantity" class="form-control" value="1" min="1" max="<?php echo $row["quantity"]; ?>" /></td>  
                     <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" /> 
                     <input type="hidden" name="hidden_dosage" value="<?php echo $row["dosage"]; ?>" />   
                     <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /> 
                     <td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" /></td> 
                    </form> 
                </tr>   
                <?php  
                     }  
                }  
                ?>  
                </tbody>
                </table>
                <div style="clear:both"></div>  
                <br />  
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
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          
                          ?>   
                     </table>  
                     <a href="checkout.php"><button class="btn btn-success">Proceed to Checkout</button></a>
                </div>  
           </div>  
  </section> 
</body>
</html>
<script src = 'js/jquery.min.js'></script>
<script>
$(document).ready(function(){
  	$("#search").on("keyup", function(e){
		if(e.keyCode == 13){
			var searchitem = $(this).val();
			$.ajax({
				url: "searchItems.php",
				method: "POST",
				data: {query:searchitem},
				dataType:"json",
				success:function(data){
					$("#results").html("");
					
					$(data).each(function(key, value){
						var row = "<tr>";
						row+="<form class='addcart' method='post' action='cart.php?action=add&id="+value.product_id+"'>";
						row+="<td><h4 class='text-info'>"+value.name+"</h4></td>";
						row+="<td>"+value.generic_name+"</td>";
						row+="<td>"+value.brand+"</td>";
						row+="<td>"+value.dosage+"</td>";
						row+="<td>"+value.expiry_date+"</td>";
						row+="<td><h4 class='text-danger'>$ "+value.price+"</h4></td>";
						row+="<td><input type='number' name='quantity' class='form-control' value='1' min='1' max='"+value.quantity+"'/></td>";
						row+="<input type='hidden' name='hidden_name' value='"+value.name+"' />";
						row+="<input type='hidden' name='hidden_dosage' value='"+value.dosage+"' />";
						row+="<input type='hidden' name='hidden_price' value='"+value.price+"' />";
						row+="<td><input type='submit' name='add_to_cart' style='margin-top:5px;' class='btn btn-success' value='Add to Cart' /></td>";
						row+="</form>";
						row+="</tr>";
						console.log(row);
						$("#results").append(row);
					});
				},
				error: function(){
					alert("Error 404: Product Not Found");
				}
			});
		}
	});

});
</script>