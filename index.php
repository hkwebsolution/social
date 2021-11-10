<?php
require_once "autoload.php";


 if (isset($_GET['recent_login_now'])) {

	$login_now = $_GET['recent_login_now'];
	setcookie('login_user_cooke_id', $login_now, time() + (60 * 60 * 24 * 365 * 7));
	header('location:index.php');
	
 }
 


 /**
  * Recent login data manage 
  * Cross button dynamic to remove user history.
  */
 
if (isset($_GET['rlc_id'])) {
	$rlc_id = $_GET['rlc_id'];
	$rl_arr = json_decode($_COOKIE['recent_login_id'], true);
	$rlu_arr = array_unique($rl_arr);
	$index = array_search($rlc_id, $rlu_arr);
	array_splice($rlu_arr, $index, 1 );
	if (count($rlu_arr) > 0 ) {
		setcookie('recent_login_id', json_encode($rlu_arr), time() + (60 * 60 * 24 * 365 * 7));
	}else {
		setcookie('recent_login_id', '', time() - (60 * 60 * 24 * 365 * 10));
	}

	header('location:index.php');
}

/**
 * User login check
 */
if (userLogin() == true) {
	header('location:profile.php');
}
if (isset($_COOKIE['login_user_cooke_id'])) {

	$login_cookie_id = $_COOKIE['login_user_cooke_id'];

	$_SESSION['id'] = $login_cookie_id;

	header('location:profile.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Social User</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
<?php 

if(isset($_POST['signup'])){

	$login = $_POST['login'];
	$pass = $_POST['password'];

	if(empty($login) || empty($pass)){

		$msg = validate('All fields are required');
	}else{

		$login_user_data = authCheck('users','email', $login);

		if ($login_user_data !== false) {
			
			if ( passCheck($pass, $login_user_data->password)) {

				 $_SESSION['id'] = $login_user_data->id;
				 setcookie('login_user_cooke_id', $login_user_data->id, time() + (60 * 60 * 24 * 365 * 7));
				header('location:profile.php');
			} else {
				$msg = validate("Incorrect password", 'warning');
			}
			
		} else {
			$msg = validate("Invalid login email Address");
		}
		


	}


}



?>
	
	<div class="wrap shadow-sm">
		<div class="card">
			<div class="card-body">
				<h2>Login</h2>

				<?php 
				
				if(isset($msg)){
					echo $msg;
				}
				?>
				<form action="" autocomplete="on" method="POST">

					<div class="form-group">
						<label for="">Login Info</label>
						<input name="login" class ="form-control" value ="<?php old ('login') ?>" type = "text" placeholder = "Email or Cell or Username">
					</div>

					<div class="form-group">
						<label for="">Passowrd</label>
						<input name="password" class="form-control" type="password" placeholder="password">
					</div>
					<div class="form-group">
						<input name="signup" class="btn btn-primary" type="submit" value="Login">
					</div>
				</form>
				<hr>
				<a href="reg.php">Create an accoutn</a>
			</div>
		</div>
	</div>
	

	<div class="wrap rlogin">
		<div class="row">


		<?php 
		
		if (isset($_COOKIE['recent_login_id'])) :

		$recent_login_user_arr = json_decode($_COOKIE['recent_login_id'], true);
		$user_id = implode(',', $recent_login_user_arr);
		$sql = "SELECT * FROM users WHERE id IN ($user_id)";
		$data = connect()->query($sql);

		while($user = $data->fetch_object()) :
		?>
			<div class="col-md-4 mt-2">
				<div class="card shadow">
					<div class="card-body rlc-div">

						<a class="close rlc" href="?rlc_id=<?php echo $user->id; ?>">&times;</a>

						<a href="?recent_login_now=<?php echo $user->id; ?>">
						<img style="width: 100px; height: 100px; border-radius:50%; " src="media/users/<?php echo $user->photo; ?>" alt="">
						<h5><?php echo $user->name; ?></h5>
						</a>
					</div>
				</div>
			</div>


			<?php endwhile; endif; ?>

		</div>
	</div>

	




	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>