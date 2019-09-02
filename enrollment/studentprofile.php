<?php require '../config/db.php'?>
<?php
	//Check submit
	if(isset($_POST['delete'])){
	//Get Form data
	 	$delid = mysqli_real_escape_string($conn, $_POST['delid']);
	 	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	 	$password = mysqli_real_escape_string($conn, $_POST['password']);
	 	$email = mysqli_real_escape_string($conn, $_POST['email']);
	 	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	 	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	 	$age = mysqli_real_escape_string($conn, $_POST['age']);
	 
	//Query
		$query = "DELETE FROM `studentinfo` WHERE id={$delid}";
		$query .= "DELETE FROM `enrollmentinfo` WHERE studentid={$delid}";

	if(mysqli_multi_query($conn, $query)){
		 	header('Location: studentlist.php');
		 } else {
		 	echo 'ERROR:'.mysqli_error($conn);
		 }
	 }
	#Get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	#Create Query
	$query = 'SELECT * FROM `studentinfo` WHERE id = '.$id;
	$equery = 'SELECT * FROM `enrollmentinfo` WHERE studentid = '.$id;
	#Get result
	$result = mysqli_query($conn, $query);
	$eresult = mysqli_query($conn, $equery);
	#Fetch data
	$user = mysqli_fetch_assoc($result);
	$course = mysqli_fetch_all($eresult, MYSQLI_ASSOC);
	#Free result
	mysqli_free_result($result);
	mysqli_free_result($eresult);
	#Close connection
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Profile - Excel</title>
	<?php require '../include/scriptsandlinks.php'?>
	<link rel="stylesheet" type="text/css" href="studentprofile.css">
</head>
<body>
<?php include('../include/staffheader.php'); ?>
<div class="jumbotron">
	<h1><?php echo $user['lastname'],", ",$user['firstname'] ?>'s Account</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
	<div class="form-row">
		<div class="col-md">
			<input type="hidden" name="delid" value="<?php echo $user['id']; ?>">
			<input type="submit" name="delete" value="Delete <?php echo $user['lastname']; ?>'s Profile" class="btn btn-outline-danger">
		</div>
		<div class="col-md">
			<a href="<?php echo ROOT_URL; ?>enrollment/editstudent.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-warning">Edit <?php echo $user['lastname']; ?>'s Profile</a>
		</div>
		<div class="col-md">
			<a href="<?php echo ROOT_URL; ?>enrollment/enrollment.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-primary">Enroll <?php echo $user['lastname']; ?></a>
		</div>
		<div class="col-md">
			<a href="<?php echo ROOT_URL; ?>enrollment/studentlist.php" class="btn btn-outline-primary">Back To Student List</a>
		</div>
	</div>
	</form>
	<div class="container">
	<table style="width:100%; margin-top: 10px;">
	  <tr class="header">
	    <th>Course Enrolled</th>
	    <th>Trainer</th>
	    <th>Start Date</th>
	    <th>End Date</th>
	    <th>TESDA ULI</th>
	    <th>Scholarship Type</th>
	    <th>Enrolled On</th>
	  </tr>
	  <?php foreach ($course as $courses):?>
	  <tr>
	    <td><?php echo $courses['excourse']; ?></td>
	    <td><?php echo $courses['trainer']; ?></td>
	    <td><?php echo $courses['startdate']; ?></td>
	    <td><?php echo $courses['enddate']; ?></td>
	    <td><?php echo $courses['tesdauli']; ?></td>
	    <td><?php echo $courses['type']; ?></td>
	    <td><?php echo $courses['datecreated']; ?></td>
	  </tr>
	  <?php endforeach; ?>
	</table>
	</div>
	</div>
</body>