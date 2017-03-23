<?php
	session_start();
	if(!isset($_SESSION['name'])){
		header("location:index.php");
	}
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
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
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
		<nav id = 'mainNav' class="navbar navbar-default navbar-fixed-top navbar-custom affix-top">
			<div class= 'container-fluid'>
				<a href = 'adminpage.php' id = 'navitems'>Up Pharma Down</a>
				<span class = 'navbar-right'><a href = 'logout.php' id = 'navitems'>Logout</a></span>
			</div>
		</nav>
		<div class= 'jumbotron'>
			<br>
			<h2 class='name text-left' id = 'adminname'>Hello, Admin <?php echo $_SESSION['name'];?></h2>
			 &nbsp  &nbsp  &nbsp <label><a href = 'searchUsers.php' id = 'navitems'>Open Users Database</a></label>
			&nbsp  &nbsp <label><a href = 'search.php' id = 'navitems'>Open Medecine Database</a></label>
			&nbsp  &nbsp <label><a href = '#' id = 'navitems'>View Suppliers</a></label>
			&nbsp  &nbsp <label><a href = '#' id = 'navitems'>View Transactions</a></label>
			
		</div>
		
	</div>
</body>
</html>
<script src = 'js/jquery.min.js'></script>
<script>
$(document).ready(function(){
	$("#logout").on("click",function(){
		alert("hello");
	});
});
</script>