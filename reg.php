<?php require_once"autoload.php"; ?>" 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Registration</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	<?php
		 
		if (isset($_POST['reg'])){

			$name = $_POST['name'];
			$email = $_POST['email'];
			$cell = $_POST['cell'];
			$uname = $_POST['username'];
			$pass = $_POST['pass'];
			$cpass = $_POST['cpass'];

			$gender = NULL;
			if(isset($_POST['gender'])){

				$gender = $_POST['gender'];
			}
			

			//Make hash pass
			$hash_pass = getHash($pass);

			/**
			 * Validation
			 */

			 if(empty($name) || empty($email) || empty($cell) || empty($uname) || empty($pass) || empty($gender)){

				$msg = validate('All fields are required');
				
			 }else if(emailCheck($email) == false){
			 $msg = validate('Invalid email adress');	

			 }else if(cellcheck($cell) == false){
				$msg = validate('Invalid cell number');	

			 }else if(cpassCheck($pass, $cpass)==false){
				 $msg = validate('Confirm Password does not match', 'warning');

			 }else if(dataCheck('users', 'email', $email) == false){
				$msg = validate('Email already exist');

			 }else if(dataCheck('users', 'cell', $cell) == false){
				$msg = validate('cell already exist');

			 }else if(dataCheck('users', 'username', $uname) == false){
				$msg = validate('username already exist');

			 }else {
				create("INSERT INTO users(name, email, cell, username, password, gender) VALUES ('$name', '$email', '$cell', '$uname', '$hash_pass','$gender')");

				$msg = validate('Registration successful', 'success');	

				formClean();

			 }




		}

	?>



	<div class="wrap shadow-sm">
		<div class="card">
			<div class="card-body">
				<h2>Create an account</h2>
				<hr>

				<?php
				
				if(isset($msg)){
					echo $msg;
				}
				
				?>
				<form action="" autocomplete="off" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php old('name'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php old('email'); ?>"type="email">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php old('cell'); ?>"type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control" value="<?php old('username'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="pass" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input name="cpass" class="form-control" type="Password">
					</div>
					

					<div class="form-group">
						<label for="">Gender</label><br>
						<input name="gender"  type="radio" value="Male" id="Male"> <label for="Male">Male</label>
						<input name="gender"  type="radio" value="Female" id="female"> <label for="Female">Female</label>
					</div>
					<hr>
					<div class="form-group">
						<input name="reg" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
				<hr>
				<a href="index.php">Login Now</a>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>