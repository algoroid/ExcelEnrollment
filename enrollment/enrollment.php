<?php require '../config/db.php'?>
<?php
session_start();
#Get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);
#Create Query
$query = 'SELECT * FROM studentinfo WHERE id = '.$id;
$tsquery = 'SELECT * FROM tesdascho';
$ecquery = 'SELECT * FROM excelcourse';
#Get result
$result = mysqli_query($conn, $query);
$tsres = mysqli_query($conn, $tsquery);
$ecres = mysqli_query($conn, $ecquery);
#Fetch data
$tescho = mysqli_fetch_all($tsres, MYSQLI_ASSOC);
$ecourse = mysqli_fetch_all($ecres, MYSQLI_ASSOC);
$user = mysqli_fetch_assoc($result);
#Free result
mysqli_free_result($ecres);
mysqli_free_result($tsres);
mysqli_free_result($result);
#----------------GET DATA FROM FORM----------------
if(isset($_POST['submit'])){
	#ENROLLMENT DATA QUERY
	$stude = mysqli_real_escape_string($conn, $_POST['student']);
	$studid = mysqli_real_escape_string($conn, $_POST['studid']);
	$excourse = mysqli_real_escape_string($conn, $_POST['excourse']);
	$trainer = mysqli_real_escape_string($conn, $_POST['trainer']);
	$startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
	$enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
	$tesdauli = mysqli_real_escape_string($conn, $_POST['tesdauli']);
	$type = mysqli_real_escape_string($conn, $_POST['type']);
	#Create Query
	$query = "INSERT INTO `enrollmentinfo`(`studentname`, `studentid`, `excourse`, `trainer`, `startdate`, `enddate`, `tesdauli`, `type`) VALUES ('$stude','$studid','$excourse','$trainer','$startdate','$enddate','$tesdauli','$type');";
	if(mysqli_multi_query($conn, $query)){
		header('Location:'.ROOT_URL.'/enrollment/studentprofile.php?id='.$id);
	}
	else{
		echo 'ERROR:'.mysqli_error($conn);
	}
}
	#Close connection
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Enrollment - Excel</title>
	<?php require '../include/scriptsandlinks.php'?>
	<link rel="stylesheet" type="text/css" href="enrollment.css">
</head>
<body>
	<?php include '../include/staffheader.php' ?>
<div class="jumbotron">
	<h1 id="titles">ENROLLMENT FORM</h1>
<form method="POST">
		<!-------------------ENROLLMENT FORM------------------->
	<div class="container">
		<h3 id=titles>Enrollment Course/Trainer</h3>
	<div class="container">
	  	<div class="form-row">
	  	<div class="form-group col-md">
	    	<label>Student's Name<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="student" class="form-control" placeholder="Full Name" value="<?php echo $user['lastname'],", ",$user['firstname'] ?>">
	    </div>
	    <div class="form-group col-md">
	    	<label>Course<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select class="form-control" name="excourse">
	        <option value="" selected>Course List</option>
	        <?php foreach($ecourse as $ecou): ?>
	        <option value="<?php echo $ecou['excourse']?>"><?php echo $ecou['excourse']?></option>
	    	<?php endforeach;?>
	    	</select>
	    </div>
		</div>
		<div class="form-row">
	    <div class="form-group col-md">
	    	<label>Trainer's Name<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="trainer" class="form-control" placeholder="Full Name">
	    </div>
		</div>
		<div class="form-row">
	    <div class="form-group col-md">
	    	<label>Training Start Date<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="date" name="startdate" class="form-control" placeholder="Last Name">
	    </div>
	    <div class="form-group col-md">
	    	<label>Training End Date<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="date" name="enddate" class="form-control" placeholder="First Name">
	    </div>
		</div>
	  	<div class="form-row">
	    <div class="form-group col-md">
	    	<label>TESDA Unique Learner Identifier (ULI)<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="tesdauli" class="form-control" placeholder="Sample: MER-96-343-13039-001" pattern="[A-Z]{3}-[0-9]{2}-[0-9]{3}-[0-9]{5}-[0-9]{3}">
	    	<small id="uli" class="form-text text-muted">Format: FFM-YY-XMM-RRPPP-NNN</small>
	    </div>
	    </div>
		<div class="form-row">
		<div class="form-group col-md">
		<a href="https://t2mis.tesda.gov.ph/Barangay" class="btn btn-link btn-block">Register Here for ULI</a>
		</div>
		<div class="form-group col-md">
	    <a href="https://t2mis.tesda.gov.ph/Recovery" class="btn btn-link btn-block">Recover ULI Here</a>
	    </div>
	    </div>
	    <div class="form-row">
	    <div class="form-group col-md">
	    	<label>TESDA Scholarship Type</label>
	    	<select class="form-control" name="type">
	        <option value="" selected>Scholarship List</option>
	        <?php foreach($tescho as $tesch): ?>
	        <option value="<?php echo $tesch['type']?>"><?php echo $tesch['type']?></option>
	    	<?php endforeach;?>
	    	</select>
	    </div>
		</div>
	</div>
	</div>
	<br>
	<input type="hidden" name="studid" value="<?php echo $id ?>">
	<div class="container">
		<button type="submit" name="submit" class="btn btn-success btn-block">ENROLL</button>
	</div>
</form>
</div>
</body>
</html>