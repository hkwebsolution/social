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





        <?php 
      
        if (isset($_POST['update'])) {
           //getting value

           $name = $_POST['name'];
           $email = $_POST['email'];
           $cell = $_POST['cell'];
           $uname = $_POST['uname'];
           $age = $_POST['age'];
           $edu = $_POST['edu'];
           $gender = $_POST['gender'];
           $updated_at = date('Y-m-d h:m:s');


           if (empty($name) || empty($email) || empty($cell) || empty($uname) || empty($gender)) {

             echo $msg = validate('All fields aare required'); 
           }else {
               
            update("UPDATE users SET name='{$name}', email='{$email}', cell ='{$cell}', username = '{$uname}', age = '{$age}', edu = '{$edu}', updated_at = '{$updated_at}' WHERE id='{$login_user->id }' ");

            setMsg('success', 'Data Updated');
            header("location:edit.php");
           }


        }

        getMsg('success');
        
        ?>

		<div class="card shadow">
			<div class="card-body">
				<form action="" method="POST" >
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" class="form-control" value="<?php echo $login_user -> name; ?>" type="text">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" class="form-control" value="<?php echo $login_user -> email; ?>" type="email">
                </div>

                <div class="form-group">
                    <label for="">Cell</label>
                    <input name="cell" class="form-control" value="<?php echo $login_user -> cell; ?>" type="text">
                </div>

                <div class="form-group">
                    <label for="">User name</label>
                    <input name="uname" class="form-control" value="<?php echo $login_user -> username; ?>" type="text">
                </div>

                <div class="form-group">
                    <label for="">Age</label>
                    <input name="age" class="form-control" value="<?php echo $login_user -> age; ?>" type="text">
                </div>

                <div class="form-group">
                    <label for="">Education</label>
                    <input name="edu" class="form-control" value="<?php echo $login_user -> edu; ?>" type="text">
                </div>

                <div class="form-group">
						<label for="">Gender</label><br>
						<input name ="gender"  type="radio" <?php echo ($login_user->gender == 'Male') ? 'checked' : ''; ?> value ="Male" id="Male"> <label for ="Male">Male</label>
						<input name ="gender"  type ="radio" <?php echo ($login_user->gender == 'Female') ? 'checked' : ''; ?> value ="Female" id ="female"> <label for="Female">Female</label>
				</div>

                <div class="form-group">
                    <input name="update" class="btn btn-primary" type="submit" value="Update"  >
                </div>

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