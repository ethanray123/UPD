<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
	</script>
<style>

</style>
</head>
<body>
	<div class = 'container'>
		<div class = 'jumbotron'>
			<h1>UpPharmaDown</h1>
			<p>This is some text here</p>
		</div>

		<div class = 'loginbox'>
			<form class = 'form' method = 'POST' action = 'loginToDB.php'>
				<div class = 'row'>
					<div class = 'col-md-6 col-md-offset-3'>
						<div class = 'form-group loginbox'>
							<label for = 'username'>Username</label>
							<input type = 'text' class = 'form-control' id = 'username' name = 'username'>
						</div>
						<div class = 'form-group'>
							<label for = 'username'>Password</label>
							<input type = 'password' class = 'form-control' id = 'password' name = 'password'>
						</div>
						<button type = 'submit' class = 'btn btn-primary'>Login</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</body>
</html>