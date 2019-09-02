<?php require '../config/db.php'?>
<?php
#Create Query
$rquery = 'SELECT * FROM region';
$pquery = 'SELECT * FROM province';
$cquery = 'SELECT * FROM city';
#Get result
$rres = mysqli_query($conn, $rquery);
$pres = mysqli_query($conn, $pquery);
$cres = mysqli_query($conn, $cquery);
#Fetch data
$regi = mysqli_fetch_all($rres, MYSQLI_ASSOC);
$provi = mysqli_fetch_all($pres, MYSQLI_ASSOC);
$cit = mysqli_fetch_all($cres, MYSQLI_ASSOC);
#Free result
mysqli_free_result($rres);
mysqli_free_result($pres);
mysqli_free_result($cres);
session_start();
#----------------GET DATA FROM FORM----------------
if(isset($_POST['submit'])){
	#STUDENT PERSONAL INFO DATA QUERY
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$mname = mysqli_real_escape_string($conn, $_POST['mname']);
	$extname = mysqli_real_escape_string($conn, $_POST['extname']);
	$bday = mysqli_real_escape_string($conn, $_POST['bday']);
	$bregi = mysqli_real_escape_string($conn, $_POST['bregi']);
	$bprovi = mysqli_real_escape_string($conn, $_POST['bprovi']);
	$bcity = mysqli_real_escape_string($conn, $_POST['bcity']);
	$sx = mysqli_real_escape_string($conn, $_POST['sxs']);
	$civlstat = mysqli_real_escape_string($conn, $_POST['cvlstat']);
	$emplstat = mysqli_real_escape_string($conn, $_POST['empstat']);
	$eduatt = mysqli_real_escape_string($conn, $_POST['eduatt']);
	#ADDRESS AND CONTACT DATA QUERY
	$numstrt = mysqli_real_escape_string($conn, $_POST['numstrt']);
	$bldgcmpd = mysqli_real_escape_string($conn, $_POST['bldgcmpd']);
	$brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
	$rgn = mysqli_real_escape_string($conn, $_POST['rgn']);
	$prvnc = mysqli_real_escape_string($conn, $_POST['prvnc']);
	$cty = mysqli_real_escape_string($conn, $_POST['cty']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$contnum = mysqli_real_escape_string($conn, $_POST['contnum']);
	$fb = mysqli_real_escape_string($conn, $_POST['fb']);
	$parname = mysqli_real_escape_string($conn, $_POST['parname']);
	$parcntc = mysqli_real_escape_string($conn, $_POST['parcntc']);
	$paradd = mysqli_real_escape_string($conn, $_POST['paradd']);
	#Create Query
	$query = "INSERT INTO `studentinfo` (`id`, `lastname`, `firstname`, `middlename`, `extensionname`, `birthday`, `bregi`, `bprovi`, `bcity`, `sex`, `civilstatus`, `employmentstatus`, `educattain`, `addressnumstreet`, `addressbldgcomp`, `addressbrgy`, `addressregion`, `addressprovince`, `addresscity`, `emailadd`, `contactnum`, `fbuser`, `parentname`, `parentcontact`, `parentadd`) VALUES (NULL, '$lname', '$fname', '$mname', '$extname', '$bday', '$bregi', '$bprovi', '$bcity', '$sx', '$civlstat', '$emplstat', '$eduatt', '$numstrt', '$bldgcmpd', '$brgy', '$rgn', '$prvnc', '$cty', '$email', '$contnum', '$fb', '$parname', '$parcntc', '$paradd')";
	if(mysqli_multi_query($conn, $query)){
		header("Location: studentlist.php");
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
	<title>Add Student - Excel</title>
	<?php require '../include/scriptsandlinks.php'?>
	<link rel="stylesheet" type="text/css" href="enrollment.css">
</head>
<body>
	<?php include '../include/staffheader.php' ?>
<div class="jumbotron">
	<h1 id="titles">ADD STUDENT</h1>
<form method="POST">
	<div class="container">
		<h3 id=titles>PERSONAL INFORMATION</h3>
		<!-------------------NAME FORM------------------->
		<div class="container">
			<h4>Name</h4>
	  	<div class="form-row">
	    <div class="form-group col-md">
	    	<label>Last Name<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="lname" class="form-control" placeholder="Last Name" required>
	    </div>
	    <div class="form-group col-md">
	    	<label>First Name<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="fname" class="form-control" placeholder="First Name" required>
	    </div>
	    <div class="form-group col-md">
	    	<label>Middle Name</label>
	    	<input type="text" name="mname" class="form-control" placeholder="Middle Name">
	    </div>
	    <div class="form-group col-md-2">
	    	<label>Name Suffix</label>
	    	<input type="text" name="extname" class="form-control" placeholder="Extension" aria-describedby="psexa">
	    	<small id="psexa" class="form-text text-muted">(e.g. JR, SR, III)</small>
	    </div>
		</div>
		</div>
	  <!--------------------ADDRESS FORM-------------------->
	  	<div class="container">
	  		<h4>Address</h4>
	  	<div class="form-row">
	    <div class="form-group col-md">
	    	<label>Number, Street<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="numstrt" class="form-control" placeholder="Number, Street" required>
	    </div>
	    <div class="form-group col-md">
	    	<label>Building/Compound</label>
	    	<input type="text" name="bldgcmpd" class="form-control" placeholder="Building/Compound">
	    </div>
	    <div class="form-group col-md">
	    	<label>Barangay<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="brgy" class="form-control" placeholder="Barangay" required>
	    </div>
	    </div>
	    <div class="form-row">
	    <div class="form-group col-md">
	    	<label>Region<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select id="regi" class="form-control" name="rgn" required>
	        <option value="" selected></option>
	        <?php foreach($regi as $regio): ?>
	        <option value="<?php echo $regio['regi']?>"><?php echo $regio['regi']?></option>
	    	<?php endforeach;?>
	    	</select>
	    </div>
	    <div class="form-group col-md">
	    	<label>Province<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select id="provi" class="form-control" name="prvnc" required>
	        <option value="" selected></option>
	        <?php foreach($provi as $provin): ?>
	        <option value="<?php echo $provin['provi']?>"><?php echo $provin['provi']?></option>
	    	<?php endforeach;?>
	      </select>
	    </div>
	    <div class="form-group col-md">
	    	<label>City<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select id="city" class="form-control" name="cty" required>
	        <option value="" selected></option>
	        <?php foreach($cit as $city): ?>
	        <option value="<?php echo $city['city']?>"><?php echo $city['city']?></option>
	    	<?php endforeach;?>
	      </select>
	    </div>
		</div>
		</div>
		<!-------------------BIRTH FORM------------------->
		<div class="container">
			<h4>Birth Information</h4>
	  	<div class="form-row">
	    <div class="form-group col-md">
	    	<label>Birth Date<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="date" name="bday" class="form-control" placeholder="Date of Birth" required>
	    </div>
	    <div class="form-group col-md">
	    	<label>Birth Place<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select class="form-control" aria-describedby="brthr" name="bregi" required>
	        <option value="" selected></option>
	        <?php foreach($regi as $regio): ?>
	        <option value="<?php echo $regio['regi']?>"><?php echo $regio['regi']?></option>
	    	<?php endforeach;?>
	    	</select>
	    	<small id="brthr" class="form-text text-muted">Region</small>
	    </div>
	    <div class="form-group col-md">
	    	<label><span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select class="form-control" aria-describedby="brthp" name="bprovi" required>
	        <option value="" selected></option>
	        <?php foreach($provi as $provin): ?>
	        <option value="<?php echo $provin['provi']?>"><?php echo $provin['provi']?></option>
	    	<?php endforeach;?>
	    	</select>
	    	<small id="brthp" class="form-text text-muted">Province</small>
	    </div>
	    <div class="form-group col-md">
	    	<label><span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select class="form-control" aria-describedby="brthc" name="bcity" required>
	        <option value="" selected></option>
	        <?php foreach($cit as $city): ?>
	        <option value="<?php echo $city['city']?>"><?php echo $city['city']?></option>
	    	<?php endforeach;?>
	    	</select>
	    	<small id="brthc" class="form-text text-muted">City/Municipality</small>
		</div>
		</div>
		</div>
<!----SEX, CIVIL STATUS, EMPLOYMENT STATUS, EDUCATION BG FORM--->
	  	<div class="container">
	  	<div class="form-row">
	  	<!------------------------ SEX ------------------------>
	  	<div class="col-md-3">
	    <div class="form-group">
	    	<h4>Sex<span class="error">* <!--?php echo $Err;?--></span></h4>
	    	<div class="custom-control custom-radio">
		    	<input type="radio" id="sexm" name="sxs" class="custom-control-input" value="Male" required>
		    	<label class="custom-control-label" for="sexm">Male</label>
		    </div>
		    <div class="custom-control custom-radio">
		    	<input type="radio" id="sexf" name="sxs" class="custom-control-input" value="Male" required>
		    	<label class="custom-control-label" for="sexf">Female</label>
		    </div>
	    </div>
	    </div>
	    <!---------------------CIVIL STATUS--------------------->
	    <div class="col-md-6">
	    	<h4>Civil Status<span class="error">* <!--?php echo $Err;?--></span></h4>
	    <div class="form-row">
	    	<div class="col-md">
		    	<div class="custom-control custom-radio">
		    	<input type="radio" id="cvlrad1" name="cvlstat" class="custom-control-input" value="Single" required>
		    	<label class="custom-control-label" for="cvlrad1">Single</label>
		    	</div>
		    	<div class="custom-control custom-radio">
		    	<input type="radio" id="cvlrad2" name="cvlstat" class="custom-control-input" value="Married">
		    	<label class="custom-control-label" for="cvlrad2">Married</label>
		    	</div>
	    	</div>
	    	<div class="col-md">
	    		<div class="custom-control custom-radio">
		    	<input type="radio" id="cvlrad4" name="cvlstat" class="custom-control-input" value="Separated">
		    	<label class="custom-control-label" for="cvlrad4">Separated</label>
		    	</div>
		    	<div class="custom-control custom-radio">
		    	<input type="radio" id="cvlrad3" name="cvlstat" class="custom-control-input" value="Widow/er">
		    	<label class="custom-control-label" for="cvlrad3">Widow/er</label>
		    	</div>
	    	</div>
	    	<div class="col-md">
	    		<div class="custom-control custom-radio">
		    	<input type="radio" id="cvlrad5" name="cvlstat" class="custom-control-input" value="SoloParent">
		    	<label class="custom-control-label" for="cvlrad5">Solo Parent</label>
		    	</div>
	    	</div>
	    </div>
	    </div>
	    <!------------------EMPLOYMENT STATUS------------------->
	    <div class="col-md-3">
	  		<h4>Employment Status<span class="error">* <!--?php echo $Err;?--></span></h4>
	    <div class="form-group col-md">
	    	<div class="custom-control custom-radio">
	    	<input type="radio" id="esrad1" name="empstat" class="custom-control-input" value="Unemployed" required>
	    	<label class="custom-control-label" for="esrad1">Unemployed</label>
	    	</div>
	    	<div class="custom-control custom-radio">
	    	<input type="radio" id="esrad2" name="empstat" class="custom-control-input" value="Employed">
	    	<label class="custom-control-label" for="esrad2">Employed</label>
	    	</div>
	    </div>
	    </div>
		</div>
	</div>
	<!----------------EDUCATIONAL ATTAINMENT---------------->
		<div class="container">
			<h4>Educational Attainment</h4>
	  	<div class="form-group">
	  	<label>Choose the Highest Educational Attainment<span class="error">* <!--?php echo $Err;?--></span></label>
	    <div class="form-row">
	      <div class="form-group col-md">
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad1" value="NoGradeCompleted" required>
	          <label class="custom-control-label" for="edurad1">
	            No Grade Completed
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad2" value="PreSchool">
	          <label class="custom-control-label" for="edurad2">
	            Pre-School(Nursery/Kinder/Prep)
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad3" value="ElementaryUndergraduate">
	          <label class="custom-control-label" for="edurad3">
	            Elementary Undergraduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad4" value="ElementaryGraduate">
	          <label class="custom-control-label" for="edurad4">
	            Elementary Graduate
	          </label>
	        </div>
	    	</div>
	        <div class="form-group col-md">
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad5" value="HighSchoolUndergraduate">
	          <label class="custom-control-label" for="edurad5">
	            High School Undergraduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad6" value="HighSchoolGraduate">
	          <label class="custom-control-label" for="edurad6">
	            High School Graduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad11" value="JuniorHighGraduate">
	          <label class="custom-control-label" for="edurad11">
	            Junior High Graduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad12" value="SeniorHighGraduate">
	          <label class="custom-control-label" for="edurad12">
	            Senior High Graduate
	          </label>
	        </div>
	    	</div>
	    	<div class="form-group col-md">
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad7" value="PostSecondaryUndergraduate">
	          <label class="custom-control-label" for="edurad7">
	            Post Secondary Undergraduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad8" value="PostSecondaryGraduate">
	          <label class="custom-control-label" for="edurad8">
	            Post Secondary Graduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad9" value="CollegeUndergraduate">
	          <label class="custom-control-label" for="edurad9">
	            College Undergraduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="eduatt" id="edurad10" value="CollegeGraduateorHigher">
	          <label class="custom-control-label" for="edurad10">
	            College Graduate or Higher
	          </label>
	        </div>
	        </div>
	      </div>
	    </div>
	  	</div>
		</div>
	<!-------------------CONTACT FORM------------------->
	<div class="container">
		<h3 id=titles>CONTACT INFORMATION</h3>
		<div class="container">
		<div class="form-row">
		<div class="form-group col-md">
			<label>Email<span class="error">* <!--?php echo $Err;?--></span></label>
			<input type="email" name="email" class="form-control" placeholder="sample@sample.com" required>
		</div>
		<div class="form-group col-md">
			<label>Contact Number<span class="error">* <!--?php echo $Err;?--></span></label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <div class="input-group-text">+639</div>
	        </div>
	        <input type="number" name="contnum" class="form-control" placeholder="XX-XXX-XXXX"required>
	      </div>
	    </div>
		<div class="form-group col-md">
			<label>Facebook Account</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <div class="input-group-text"><i class="fa fa-facebook-square"></i></div>
	        </div>
	        <input type="text" class="form-control" placeholder="Username" name="fb">
	      </div>
	    </div>
		</div>
		<div class="form-row">
		<div class="form-group col-md">
			<label>Parent/ Guardian Name<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="parname" class="form-control" placeholder="Full Name" required>
		</div>
		<div class="form-group col-md">
			<label>Parent/ Guardian Contact Number<span class="error">* <!--?php echo $Err;?--></span></label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <div class="input-group-text">+639</div>
	        </div>
	        <input type="number" name="parcntc" class="form-control" placeholder="XX-XXX-XXXX"required>
	      </div>
	    </div>
		<div class="form-group col-md">
			<label>Parent/ Guardian Address<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="paradd" class="form-control" placeholder="Address" required>
		</div>
		</div>
		</div>
	</div>
	<br>
	<div class="container">
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-success btn-block">ADD STUDENT</button>
	</div>
	</div>
</form>
</div>
</body>
</html>