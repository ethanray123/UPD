<?php
	require("header.php");
	require("conn.php");
	$search = "SELECT product_id,name,generic_name,brand,price,quantity FROM product";
	$result = mysqli_query($conn, $search) or die("Error: ".mysqli_error($conn));
?>
<style>
#cart tr{
	cursor:pointer;
}
</style>
<div class='container-fluid'>
	<div class='row'>
		<div class='col-sm-4'>
			<h2>Cart</h2>
			<table class='table table-bordered' id='cart'>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Option</th>
				<tbody id="sresult">
				
				</tbody>
			</table>
			<button class="btn btn-success checkout">Proceed to Checkout</button>
		</div>
		<div class='col-sm-8'>
		<!-- <input type='text' class='form-control' id='search'> -->
			<table class='table table-bordered'>
					<th>Product Name</th>
					<th>Generic Name</th>
					<th>Brand</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Option</th>
					<tbody class='result'>
						<?php
							while($row = mysqli_fetch_row($result)){
								echo "<tr>";
								echo "<td class='hidden'>{$row[0]}</td>";
								echo "<td class='a'>{$row[1]}</td>";
								echo "<td class='b'>{$row[2]}</td>";
								echo "<td class='c'>{$row[3]}</td>";
								echo "<td class='d'>{$row[4]}</td>";
								echo "<td class='e'>{$row[5]}</td>";
								echo "<td><button class='btn btn-xs btn-success add'><span class='glyphicon glyphicon-plus'></span>";
								echo "</tr>";
							}	
						?>
					</tbody>
				</table>
		</div>
	</div>
</div>
</body>
</html>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){

	$(".add").on("click", function(e){
			
			var name = $(this).parent().prev().prev().prev().prev().prev().text();
			var id = $(this).parent().prev().prev().prev().prev().prev().prev().text();
			var price = $(this).parent().prev().prev().text();
			console.log(name);
			console.log(id);
			console.log(price);


			$.ajax({
				url : "addToCart.php",
				method : "POST",
				data : { query : name, 
						 id: id
						},
				dataType: "json",
				success: function(data){
					$("#sresult").append("");
					
					$(data).each(function(key, value){
							// var row = "<tr data-id='"+value.product_id+"'>";
							// row += "<td>"+value.name+"</td>";
							// row += "<td>"+value.price+"</td>";
							// row += "<td><input type='number' value='1' name='qty'></td>";
							// row += "<td><button class='btn btn-xs btn-danger'><span class='remove glyphicon glyphicon-remove'></span></button></td>";
							
							// row += "</tr>";
							// $("#sresult").append(row);
							var flag=0;
							$("#sresult tr").each(function(){
								var id = $(this).data('id');
								if(id==value.product_id)
									flag=1;
							});
							if(flag==0){
								var row = "<tr data-id='"+value.product_id+"'>";
								row += "<td>"+value.name+"</td>";
								row += "<td>"+value.price+"</td>";
								row += "<td><input type='number' value='1'></td>"
								row += "<td><button class='btn btn-xs btn-danger'><span class='remove glyphicon glyphicon-remove'></span></button></td>";
								
								row += "</tr>";
								$("#sresult").append(row);
							}
					});
				}
			});
	});

	
	$(".checkout").on("click", function(){
		var data = {};
		var i=0;
		$("#cart tr").each( function(){
			// if($(this).text()!=""){
			// 	console.log($(this).text()); alert("not empty text");
			// }else if($(this).children().val()!=""){
			// 	console.log($(this).children().val());
			// }

			if($(this).attr("data-id")){
				//console.log($(this).attr("data-id"));
				data[i]=$(this).attr("data-id"); i++;
				$(this).children("td").each( function(){
					if($(this).val()!=""){
						//console.log($(this).text());
						data[i]=$(this).val(); i++;
					}
				});
			}

			$.ajax({
             url: "addToProdList.php",
             type: "POST",
             data: data,
             dataType: "json",
             success: function(response){
               alert("added");
             },
             error: function(){
                alert("Something Went Wrong");
             }
            });
			
			// console.log($(this).children("td"));
			
			// $("#cart "+this+" td").each(function(){
			// 	console.log(this);
			// });
		});
		
	});


	$("#sresult").on("click", ".btn-danger", function(){
        $(this).parent().parent().remove();
        var idDel = 
        console.log(idDel);
  //       $.ajax({
		// 		url : "deleteFromCart.php",
		// 		method : "POST",
		// 		data : { id: idDel },
		// 		dataType: "json",
		// });
    });


});
</script>







