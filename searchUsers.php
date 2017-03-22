<?php
	require('conn.php');
?>

<html>
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
</style>
<head>

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

</head>
<body>
	<div class = 'container'>
		<span><input type = 'text' id = 'search' style = "float:right"></span>
		<table class = 'table table-bordered'>
			<thead>
				<tr>
					<td>Name</td><td>Email</td><td>Address</td><td>Contact Number</td><td>Credit Card Number</td><td>Options</td>
				</tr>
			</thead>
			<tbody id = 'result'>
			</tbody>
		</table>
	</div>
</body>
</html>
<script src = 'js/jquery.min.js'></script>
<script>
$(document).ready(function(){
	$("#search").on("keyup", function(e){
		if(e.keyCode == 13){
			var search_string;
			search_string = $("#search").val();
			console.log(search_string+" is the search string");
			$.ajax({
				url:"searchAsAdmin.php",
				method:"POST",
				data:{ query: search_string },
				dataType:"json",
				success:function(data){
					console.log(data);
					$("#result").html("");
					$(data).each(function(key, value){
						console.log(value.name);
					var row = "<tr data-id = "+value.user_id+">";
						row += "<td>"+value.name+"</td>";
						row += "<td>"+value.email+"</td>";
						row += "<td>"+value.address+"</td>";
						row += "<td>"+value.contact_no+"</td>";
						row += "<td>"+value.credit_card_no+"</td>";
						row += "<td><button class = 'btn btn-xs btn-warning glyphicon glyphicon-pencil' name = '"+value.user_id+"'}></button><button class = 'btn btn-xs btn-danger glyphicon glyphicon-remove' name = '"+value.user_id+"'}></td>";
						row += "</tr>"

						$("#result").append(row);
					});
				},
				
				error:function(e){
					console.log(e);
				}
			});
		}
	});
});
</script>