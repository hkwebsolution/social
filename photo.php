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
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
<?php include_once "templates/menu.php"; ?>

	<section class="user-profile">

    	<?php if  (isset($login_user-> photo)) :?>
        <img class="shadow" src="media/users/<?php echo $login_user-> photo; ?>" alt="">

	<?php elseif ($login_user-> gender == 'Male') : ?>
		<img class="shadow" src="assets/media/male.jpg" alt="">
	 <?php elseif ($login_user-> gender == 'Female') : ?> 
		<img class="shadow" src="assets/media/female.jpg" alt=""> 

	<?php endif; ?>


		<hr>
		<h3 class="text-center display-4 py-3"><?php echo $login_user-> name; ?></h3>

        <?php 
        if (isset($_POST['upload'])) {
            $user_id = $_SESSION['id'];

			if (empty($_FILES['photo']['name'])) {	
				setMsg('warning', 'Plz select a photo');
				header('location:photo.php');
			} else {
				$file = move($_FILES['photo'], 'media/users/');
				update("UPDATE users SET photo='$file' WHERE id='$user_id'");
				setMsg('success', 'profile photo uploaded');
				header('location:photo.php');
			}


        }
		// Show message
		getMsg('warning');
		getMsg('success');
        
        
        ?>
		<div class="card shadow">
			<div class="card-body">
				<form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="photo">
                <input type="submit" name="upload" value="upload">

                </form>
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