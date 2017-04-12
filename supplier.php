<?php
	require('conn.php');
	session_start();
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
    .btn{
        color: white;
        padding: 
        background-color: #18BC9C;
        border-radius: 0px;
        font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
    }/
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
	<?php require("navbarAdmin.php"); ?>
	<h1>Coming Soon</h1>
	<!-- <section class = 'section'>
		<div class = 'container'>
			<input type = 'text' id = 'search' placeholder = 'Press Enter after typing to search' class = 'form-control'>
			<table class = 'table table-bordered table-hover'>
				<thead>
					<tr>
						<div class = 'col-md-6'>
							<th>Name</th>
						</div>
						<div class = 'col-md-6'>
							<th>Email</th>
						</div>
						<div class = 'col-md-6'>
							<th>Address</th>
						</div>
						<div class = 'col-md-6'>
							<th>Contact Number</th>
						</div>
						<div class = 'col-md-6'>
							<th>Options</th>
						</div>
					</tr>
				</thead>
				<tbody id = 'results'>
					<?php
		                // require('conn.php');
		                
		                // $query = "SELECT * FROM user";
		                
		                // $result = mysqli_query($conn, $query);
		                                
		                // if($result) {
		                //     while($row = mysqli_fetch_assoc($result)){
		                //         echo "<tr><td class='user_id'>{$row['user_id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['address']}</td><td>{$row['contact_no']}</td>" .
		                //             "<td><button class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></td>" . 
		                //             "</tr>";
		                //     }
		                // }
		            ?>
				</tbody>
			</table>
		</div>
	</section> -->
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
					$("#results").html("");
					$(data).each(function(key, value){
						console.log(value.name);
					var row = "<tr><td class='user_id'>"+value.user_id+">";
						row += "<td>"+value.name+"</td>";
						row += "<td>"+value.email+"</td>";
						row += "<td>"+value.address+"</td>";
						row += "<td>"+value.contact_no+"</td>";
						row += "<td><button class='btn btn-xs btn-danger><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
						console.log(row);
						$("#results").append(row);
					});
				},
				
				error:function(e){
					console.log(e);
				}
			});
		}
	});

	$("#results").on("click", ".btn-danger", function() {
        if (confirm('Are you sure you want to delete this user?')) {
            var user_id = $(this).parent().siblings(".user_id").text();
            var par = $(this).parent().parent();
            $.ajax({
                url: "deleteRowAsAdmin.php",
                data: { id: user_id },
                success: function(res) {
                    if(res == 1) {
                        $(par).fadeOut();
                    } else {
                        alert("User Deletion Failed!");
                    }
                },
                type: "POST"
            });
        }
    });
	
});
</script>