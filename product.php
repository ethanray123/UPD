<?php
	session_start();
	if(!isset($_SESSION['name'])){
		header("location:index.php");
	}
?>
<html>
<head>

    <title>Up Pharma Down - Drug Database</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type = 'text/css'>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Up Pharma Down - Drug Database</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>
<style>
    td .btn {
       margin-right: 5px; 
    }

    .pid {
        display: none;
    }
    <style type="text/css">
    .btn{
        color: white;
        padding: 
        background-color: #18BC9C;
        border-radius: 0px;
        font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
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
</style>
</style>
<body>
	<?php require("navbarAdmin.php"); ?>
		<div class = 'container'>
			<h3>Products</h3><br>
			<input type = 'text' id = 'search' placeholder = 'Press Enter after typing to search' class = 'form-control'>
			<table class = 'table table-bordered table-hover'>
				<div class = 'col-md-6'>
					<th>Product Name</th>
				</div>
				<div class = 'col-md-2'>
					<th>Brand</th>
				</div>
				<div class = 'col-md-2'>
					<th>Price</th>
				</div>
				<div class = 'col-md-2'>
					<th>Quantity</th>
				</div>
				<div class = 'col-md-2'>
					<th>Options</th>
				</div>
				<tbody id = 'results'>
					<?php
		                require('conn.php');
		                
		                $query = "SELECT * FROM product";
		                
		                $result = mysqli_query($conn, $query);
		                                
		                if($result) {
		                    while($row = mysqli_fetch_assoc($result)){
		                        echo "<tr><td class='pid'>{$row['product_id']}</td><td>{$row['name']}</td><td>{$row['brand']}</td><td>{$row['price']}</td><td>{$row['quantity']}</td>" .
		                            "<td><button class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></td>" . 
		                            "</tr>";
		                    }
		                }
		            ?>
				</tbody>
			</table>
			<br><br>
			<h3>Add Product</h3><br>
			<form class="form" action="addProduct.php" method="post" autocomplete="off">
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label><h4>Product Name</h4></label>
                                  <input type="text" class="form-control" name="name" placeholder="Enter a Product Name" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label><h4>Generic Name(optional)</h4></label>
                                  <input type="text" class="form-control" name="genName" placeholder="Enter Product's Generic Name">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>Brand</h4></label>
                                  <input type="text" class="form-control" name="brand" placeholder="Enter Brand Name" required>
                              </div>
                          </div> 
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>Price</h4></label>
                                  <input type="text" class="form-control" name="price" placeholder="Enter Price" required>
                              </div>
                          </div> 
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label><h4>Dosage/Content</h4></label>
                                  <input type="text" class="form-control" name="dosage" placeholder="Enter Volume" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>Quantity</h4></label>
                                 <input type="number" class="form-control" name="qty" placeholder="Enter Quantity" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label><h4>Expiry Date</h4></label>
                                  <input type="date" class="form-control" name="expiryDate" title="Enter Expiry Date" required>
                              </div>
                          </div> 
                          
                          
                          <div class="form-group">
                               <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Add to Inventory</button>
                                    <button class="btn btn-md" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>				
                    				<br><br><br><br>
                                </div>
                          </div>
                    </form>
		</div>
	<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <form id="updateform" class="form updateProd" method="POST" action="editProduct.php">
	            <input type='hidden' name='pid' id='product-pid'>
	            <div class='form-group'>
	                <label for="product-name">Product Name</label>
	                <input type="text" class="form-control" name='name' id="product-name">
	            </div>
	            
	            <div class='form-group'>
	                <label for="product-brand">Product Brand</label>
	                <input type="text" class="form-control" name='brand' id="product-brand">
	            </div>
	            
	            <div class='form-group'>
	                <label for="product-price">Product Price</label>
	                <input type="text" class="form-control" name='price' id="product-price">
	            </div>
	            
	            <div class='form-group'>
	                <label for="product-qty">Product Quantity</label>
	                <input type="text" class="form-control" name='qty' id="product-qty">
	            </div>
	            
	            <button class='btn btn-success' type='submit'>Submit</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
						var row = "<tr><td class='pid'>"+value.product_id+"</td>";
						row+="<td>"+value.name+"</td>";
						row+="<td>"+value.brand+"</td>";
						row+="<td>"+value.price+"</td>";
						row+="<td>"+value.quantity+"</td>";
						row += "<td><button class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
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

	$("#results").on("click", ".btn-danger", function() {
        if (confirm('Are you sure you want to delete this product?')) {
            var pid = $(this).parent().siblings(".pid").text();
            var par = $(this).parent().parent();
            $.ajax({
                url: "deleteProduct.php",
                data: { id: pid },
                success: function(res) {
                    if(res == 1) {
                        $(par).fadeOut();
                    } else {
                        alert("Product deletion failed! "+res);
                    }
                },
                type: "POST"
            });
        }
    });
    
    $("#results").on("click", ".btn-warning", function() {
        pidEditing = $(this).parent().siblings(".pid").text();
        
        var qty = $(this).parent().prev().text();
        var price = $(this).parent().prev().prev().text();
        var brand = $(this).parent().prev().prev().prev().text();
        var name = $(this).parent().prev().prev().prev().prev().text();
        var pid = $(this).parent().prev().prev().prev().prev().prev().text();
        
        $("#myModal #product-pid").val(pid);
        $("#myModal #product-name").val(name);
        $("#myModal #product-brand").val(brand);
        $("#myModal #product-price").val(price);
        $("#myModal #product-qty").val(qty);
        $("#myModal").modal("show");
    });
})
</script>