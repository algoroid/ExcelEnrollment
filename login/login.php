<?php
require('../config/db.php');
session_start();
if (isset($_POST['uname'])){
	$uname = stripslashes($_REQUEST['uname']);
	$uname = mysqli_real_escape_string($conn,$_POST['uname']);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
        $query = "SELECT * FROM `staffinfo` WHERE staffuser='$uname' and staffpass='".($password)."'";
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['uname'] = $username;
	    header("Location: ../enrollment/welcome.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Excel</title>
	<?php require '../include/scriptsandlinks.php' ?>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body style="background: url(../img/wallpaper3.jpg);
	background-size: cover;
	background-position: fixed;
	background-repeat: no-repeat;
	background-color: #f89020 !important;">
	<?php include '../include/header.php' ?>
	<section id="login">
		<div class="container" style="background-color: rgba(247,33,6,0.3); width: 400px; float: left; padding: 10px; padding-top: 100px; padding-left: 30px; margin: 30px;">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="form-group">
			    <label>Username</label>
			    <input type="text" name="uname" class="form-control" id="uname" placeholder="Enter Username">
			  	</div>
			  	<div class="form-group">
			    <label>Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  	</div>
			  	<button class="btn btn-success btn-block" type="submit" name="submit">Submit</button>
			</form>
		</div>
	</section>
<script src="../include/smooth-scroll.js"></script>
<script>
	var scroll = new SmoothScroll('a[href*="#"]');
</script>
</body>
</html>
<?php } ?>