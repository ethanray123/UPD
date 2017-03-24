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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

 <?php
	require("conn.php");
	$sql = "SELECT * FROM product";
	session_start();
	if(isset($_SESSION['user_id'])){
		$x = $_SESSION['user_id'];
	}else{
		$x = -1 ;
	}
 ?>
</head>
<body>
	<section class = 'searchsec'>
		<div class = 'container'>
			<input type = 'text' id = 'search' placeholder = 'Press Enter after typing to search' class = 'form-control'>
			<table id = 'myTable' class = 'table table-bordered table-hovered'>
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
					<th>Options</th>
				</div>
				<tbody id = 'results'>
				</tbody>
			</table>
		</div>
		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	      	<center>
	        <p><strong>Product Name</strong></p>
	        <input type='text' class='pname' value=''>
	        <p><strong>Product Brand</strong></p>
	        <input type='text' class='pbrand' value=''>
	        <p><strong>Product Price</strong></p>
	        <input type='text' class='pprice' value=''>
	        <p><strong>Product Quantity</strong></p>
	        <input type='text' class='pquantity' value=''><br>
	        <button class='btn btn-success btn1'>Submit</button>
	   		</center>
	      </div>
	    </div>
	  </div>
	</div>
	</section>
</body>
</html>

<script src = 'js/jquery.min.js'></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	var arrayOfData = [];
	var i;
	var z = false;
	$("#search").on("keyup", function(e){
		if(e.keyCode == 13){
			var searchitem = $(this).val();
			//console.log(searchitem);
			$.ajax({
				url: "searchItems.php",
				method: "POST",
				data: {query:searchitem},
				dataType:"json",
				success:function(data){
					$("#results").html("");
					
					$(data).each(function(key, value){
						arrayOfData[i]=new Array(value.product_id, value.name, value.brand, value.price);
						var row = "<tr id = '"+value.product_id+"'>";
						row+="<td>"+value.name+"</td>";
						row+="<td>"+value.brand+"</td>";
						row+="<td>"+value.price+"</td>";
						row += "<td><button id = 'button' class='btn btn-xs btn-success glyphicon glyphicon-shopping-cart'></button></td>";
						//console.log(arrayOfData[i]);
						$("#results").append(row);
						i++;
					});
					
				},
				error: function(){
					alert("No searches found");
					$("#results").html("");
				}
			});
			
		}
		
	});
	
	
	
	$(this).on("click","#button",function(e){
		var x = <?php echo $x; ?>;
		var lol =$(this).parent().parent().attr("id");
		parseInt(lol);
		console.log(arrayOfData);
		console.log(lol);
		var tableName = document.getElementById("myTable");
		if(x!=-1){
			alert(tableName);
			$('#myModal').modal('show');
			var cell = arrayOfData[0];
			console.log(arrayOfData[0]);
		}else{
			alert("You must be able to login to buy. Redirected to the homepage");
			window.location.href = "index.php";
		}
		
		
	});
})
</script>