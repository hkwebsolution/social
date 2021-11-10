<?php require_once "autoload.php"; 

/*
Auth check
*/
if (userLogin() == false) {
	header('location:index.php');
}else {
	$login_user = loginUserData('users', $_SESSION['id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $login_user->name; ?></title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
<?php include_once "templates/menu.php"; ?>


<section class="users">
	<div class="container">
		<div class="row">


		<?php 
		
		$all_users = all('users');

		while($user = $all_users->fetch_object()) :
		
		?>
		
		<?php if ($user->id !=$_SESSION['id']) : ?>


			<!----Each user's profile card ----->
			<div class="col-md-3">
				<div class="user-item">
					<div class="card shadow-sm">
						<div class="card-body">
							<img src="media/users/<?php echo $user->photo; ?>" alt="">
							<h4><?php echo $user->name; ?></h4>
							<a href="profile.php?user_id=<?php echo $user->id; ?>" class="btn btn-primary" >View Profile</a>
						</div>
					</div>
				</div>
			</div>

			<?php endif; ?>

			<?php endwhile; ?>
		</div>
	</div>
</section>


	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>