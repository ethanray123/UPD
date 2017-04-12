<nav id = 'mainNav' class="navbar navbar-default navbar-fixed-top navbar-custom affix-top">
	<div class= 'container-fluid'>
		<a href = 'adminpage.php' id = 'navitems'>Up Pharma Down</a>
		<span class = 'navbar-right'><a href = 'logout.php' id = 'navitems'>Logout</a></span>
	</div>
</nav>

<div class= 'jumbotron'>
	<br>
	<h2 class='name text-left' id = 'adminname'>Hello, Admin <?php echo $_SESSION['name'];?></h2>
	&nbsp;  &nbsp;  &nbsp; <label><a href = 'user.php' id='user'>View Users</a></label>
	&nbsp;  &nbsp; <label><a href="product.php" id="prod">View Products</a></label>
	&nbsp;  &nbsp; <label><a href="supplier.php" id="supplier">View Suppliers</a></label>
	&nbsp;  &nbsp; <label><a href="transac.php" id="transac">View Transactions</a></label>
	&nbsp;  &nbsp; <label><a href="report.php" id="report">View Reports</a></label>	
</div>