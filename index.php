

<html>

	<head>
		<title>Login</title>
		<script src="login_validate.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
				integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	</head>

	<body>
		<?php 
			include("server.php");
		?>
		<div style="margin : 100px auto; width: 50%;">

			<h1 style="text-align: center;">Welcome to Student Registration Form</h1>
			<h4 style="text-align: center; margin-top: 20px;">This is the Home page where you can signup/login.</h4>
			
			<div style=" width: 50%; margin: 50px auto;">    
				<form name="form1" class="row g-3 needs-validation" novalidate method="post">
					<div class="col-md-10">
						<label for="userName" class="form-label" >Username</label>
						<input type="text" class="form-control" id="validationCustom01" name="username" required>
					</div>
					<div class="mb-2">
						<label for="inputPass" class="col-sm-2 col-form-label">Password</label>
						<div class="col-md-10">
							<input type="password" name="password1" class="form-control" id="inputpass">
						</div>
					</div>
					<div class="col-12">
						<button onclick="return validateForm()" style="margin-right: 20px" class="btn btn-primary"
								type="submit" name="submit" value="Submit">Login</button>
					</div>
					<a href="signup.php">Don't have an account?</a>
				</form>
			</div>
		
		</div>

	</body>

</html>