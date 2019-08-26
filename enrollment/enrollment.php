<?php require '../config/db.php'?>
<?php
	#Create Query
	$rquery = 'SELECT * FROM region';
	$pquery = 'SELECT * FROM province';
	$cquery = 'SELECT * FROM city';
	$tsquery = 'SELECT * FROM tesdascho';
	$ecquery = 'SELECT * FROM excelcourse';
	#Get result
	$rres = mysqli_query($conn, $rquery);
	$pres = mysqli_query($conn, $pquery);
	$cres = mysqli_query($conn, $cquery);
	$tsres = mysqli_query($conn, $tsquery);
	$ecres = mysqli_query($conn, $ecquery);
	#Fetch data
	$regi = mysqli_fetch_all($rres, MYSQLI_ASSOC);
	$provi = mysqli_fetch_all($pres, MYSQLI_ASSOC);
	$cit = mysqli_fetch_all($cres, MYSQLI_ASSOC);
	$tescho = mysqli_fetch_all($tsres, MYSQLI_ASSOC);
	$ecourse = mysqli_fetch_all($ecres, MYSQLI_ASSOC);
	#Free result
	mysqli_free_result($rres);
	mysqli_free_result($pres);
	mysqli_free_result($cres);
	mysqli_free_result($tsres);
	#Close connection
	mysqli_close($conn);
?>
<?php 
	#-----------ADDRESS OPTIONS-------------
	if (!filter_has_var(INPUT_GET, "email")) {
    echo("");
	} else {
    echo("disable");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Enrollment - Excel</title>
	<?php require '../include/scriptsandlinks.php'?>
	<link rel="stylesheet" type="text/css" href="enrollment.css">
	<style>
		
	</style>
</head>
<body>
<div class="jumbotron">
<form method="POST">
	<div class="container">
		<h3 id=titles>PERSONAL INFORMATION</h3>
		<!-------------------NAME FORM------------------->
		<div class="container">
			<h4>Name</h4>
	  	<div class="form-row">
	    <div class="form-group col-md">
	    	<label>Last Name<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="lname" class="form-control" placeholder="Last Name">
	    </div>
	    <div class="form-group col-md">
	    	<label>First Name<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="fname" class="form-control" placeholder="First Name">
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
	    	<input type="text" name="numstrt" class="form-control" placeholder="Number, Street">
	    </div>
	    <div class="form-group col-md">
	    	<label>Building/Compound</label>
	    	<input type="text" name="bldgcmpd" class="form-control" placeholder="Building/Compound">
	    </div>
	    <div class="form-group col-md">
	    	<label>Barangay<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="brgy" class="form-control" placeholder="Barangay">
	    </div>
	    </div>
	    <div class="form-row">
	    <div class="form-group col-md">
	    	<label>Region<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select class="form-control" name="regi">
	        <option value="" selected></option>
	        <?php foreach($regi as $regio): ?>
	        <option value="<?php echo $regio['regi']?>"><?php echo $regio['regi']?></option>
	    	<?php endforeach;?>
	    	</select>
	    </div>
	    
	    <div class="form-group col-md">
	    	<label>Province<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select disabled class="form-control" name="provi">
	        <option value="" selected></option>
	        <option value="">...</option>
	      </select>
	    </div>
	    <div class="form-group col-md">
	    	<label>City<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select class="form-control" name="city">
	        <option value="" selected>City List</option>
	        <option value="">...</option>
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
	    	<input type="date" name="bday" class="form-control" placeholder="Date of Birth">
	    </div>
	    <div class="form-group col-md">
	    	<label>Birth Place<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select class="form-control" aria-describedby="brthr" name="bregi">
	        <option value="" selected></option>
	        <?php foreach($regi as $regio): ?>
	        <option value="<?php echo $regio['regi']?>"><?php echo $regio['regi']?></option>
	    	<?php endforeach;?>
	    	</select>
	    	<small id="brthr" class="form-text text-muted">Region</small>
	    </div>
	    <div class="form-group col-md">
	    	<label><span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select disabled class="form-control" aria-describedby="brthp" name="bprovi">
	        <option value="" selected>Province List</option>
	        <option value="">...</option>
	    	</select>
	    	<small id="brthp" class="form-text text-muted">Province</small>
	    </div>
	    <div class="form-group col-md">
	    	<label><span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select disabled class="form-control" aria-describedby="brthc" name="bcity">
	        <option value="" selected>City List</option>
	        <option value="">...</option>
	    	</select>
	    	<small id="brthc" class="form-text text-muted">City/Municipality</small>
		</div>
		</div>
		</div>
		<!---------SEX, CIVIL STATUS, EMPLOYMENT STATUS, EDUCATION BG FORM---------------->
	  	<div class="container">
	  	<div class="form-row">
	  	<fieldset>
	  		<h4>Sex<span class="error">* <!--?php echo $Err;?--></span></h4>
	    <div class="form-group col-md">
	    	<div class="custom-control custom-radio custom-control-inline">
	    	<input type="radio" id="sxrad1" name="sex" class="custom-control-input" value="Male">
	    	<label class="custom-control-label" for="sxrad1">Male</label>
	    	</div>
	    </div>
	    <div class="form-group col-md">
	    	<div class="custom-control custom-radio custom-control-inline">
	    	<input type="radio" id="sxrad2" name="sex" class="custom-control-input" value="Female">
	    	<label class="custom-control-label" for="sxrad2">Female</label>
	    	</div>
	    </div>
	    </fieldset>
	    <fieldset class="form-group">
	  		<h4>Civil Status<span class="error">* <!--?php echo $Err;?--></span></h4>
	    <div class="form-group col-md">
	    	<div class="custom-control custom-radio custom-control-inline">
	    	<input type="radio" id="cvlrad1" name="cvlstat" class="custom-control-input" value="Single">
	    	<label class="custom-control-label" for="cvlrad1">Single</label>
	    	</div>
	    </div>
	    <div class="form-group col-md">
	    	<div class="custom-control custom-radio custom-control-inline">
	    	<input type="radio" id="cvlrad2" name="cvlstat" class="custom-control-input" value="Married">
	    	<label class="custom-control-label" for="cvlrad2">Married</label>
	    	</div>
	    </div>
	    <div class="form-group col-md">
	    	<div class="custom-control custom-radio custom-control-inline">
	    	<input type="radio" id="cvlrad3" name="cvlstat" class="custom-control-input" value="Widow/er">
	    	<label class="custom-control-label" for="cvlrad3">Widow/er</label>
	    	</div>
	    </div>
	    <div class="form-group col-md">
	    	<div class="custom-control custom-radio custom-control-inline">
	    	<input type="radio" id="cvlrad4" name="cvlstat" class="custom-control-input" value="Separated">
	    	<label class="custom-control-label" for="cvlrad4">Separated</label>
	    	</div>
	    </div>
	    <div class="form-group col-md">
	    	<div class="custom-control custom-radio custom-control-inline">
	    	<input type="radio" id="cvlrad5" name="cvlstat" class="custom-control-input" value="SoloParent">
	    	<label class="custom-control-label" for="cvlrad5">Solo Parent</label>
	    	</div>
	    </div>
	    </fieldset>
	    <fieldset class="form-group">
	  		<h4>Employment Status<span class="error">* <!--?php echo $Err;?--></span></h4>
	    <div class="form-group col-md">
	    	<div class="custom-control custom-radio custom-control-inline">
	    	<input type="radio" id="esrad1" name="empstat" class="custom-control-input" value="Unemployed">
	    	<label class="custom-control-label" for="esrad1">Unemployed</label>
	    	</div>
	    </div>
	    <div class="form-group col-md">
	    	<div class="custom-control custom-radio custom-control-inline">
	    	<input type="radio" id="esrad2" name="empstat" class="custom-control-input" value="Employed">
	    	<label class="custom-control-label" for="esrad2">Employed</label>
	    	</div>
	    </div>
	    </fieldset>
		</div>
		<div class="container" style="float: right">
			<h4>Educational Attainment</h4>
	  	<fieldset class="form-group">
	  	<label>Choose the Highest Educational Attainment<span class="error">* <!--?php echo $Err;?--></span></label>
	    <div class="form-row">
	      <div class="form-group col-md">
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad1" value="NoGradeCompleted">
	          <label class="custom-control-label" for="edurad1">
	            No Grade Completed
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad2" value="PreSchool">
	          <label class="custom-control-label" for="edurad2">
	            Pre-School(Nursery/Kinder/Prep)
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad3" value="ElementaryUndergraduate">
	          <label class="custom-control-label" for="edurad3">
	            Elementary Undergraduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad4" value="ElementaryGraduate">
	          <label class="custom-control-label" for="edurad4">
	            Elementary Graduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad5" value="HighSchoolUndergraduate">
	          <label class="custom-control-label" for="edurad5">
	            High School Undergraduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad6" value="HighSchoolGraduate">
	          <label class="custom-control-label" for="edurad6">
	            High School Graduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad11" value="JuniorHighGraduate">
	          <label class="custom-control-label" for="edurad11">
	            Junior High Graduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad12" value="SeniorHighGraduate">
	          <label class="custom-control-label" for="edurad12">
	            Senior High Graduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad7" value="PostSecondaryUndergraduate">
	          <label class="custom-control-label" for="edurad7">
	            Post Secondary Undergraduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad8" value="PostSecondaryGraduate">
	          <label class="custom-control-label" for="edurad8">
	            Post Secondary Graduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad9" value="CollegeUndergraduate">
	          <label class="custom-control-label" for="edurad9">
	            College Undergraduate
	          </label>
	        </div>
	        <div class="custom-control custom-radio">
	          <input class="custom-control-input" type="radio" name="edurad" id="edurad10" value="CollegeGraduateorHigher">
	          <label class="custom-control-label" for="edurad10">
	            College Graduate or Higher
	          </label>
	        </div>
	      </div>
	    </div>
	  	</fieldset>
		</div>
	</div>
		<!-------------------ENROLLMENT FORM------------------->
	<div class="container">
		<h3 id=titles>ENROLLMENT INFORMATION</h3>
	<div class="container">
			<h4>Enrollment Course/Trainer</h4>
	  	<div class="form-row">
	    <div class="form-group col-md">
	    	<label>Course<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<select class="form-control" name="course">
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
	    	<input type="text" name="lname" class="form-control" placeholder="Full Name">
	    </div>
		</div>
		<div class="form-row">
	    <div class="form-group col-md">
	    	<label>Training Start Date<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="date" name="lname" class="form-control" placeholder="Last Name">
	    </div>
	    <div class="form-group col-md">
	    	<label>Training End Date<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="date" name="fname" class="form-control" placeholder="First Name">
	    </div>
		</div>
	
	  	<div class="form-row">
	    <div class="form-group col-md">
	    	<label>TESDA Unique Learner Identifier (ULI)<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="lname" class="form-control" placeholder="Sample: MER-96-343-13039-001" pattern="[A-Z]{3}-[0-9]{2}-[0-9]{3}-[0-9]{5}-[0-9]{3}">
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
	    	<select class="form-control">
	        <option value="" selected>Scholarship List</option>
	        <?php foreach($tescho as $tesch): ?>
	        <option value="<?php echo $tesch['type']?>"><?php echo $tesch['type']?></option>
	    	<?php endforeach;?>
	    	</select>
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
			<input type="email" name="email" class="form-control" placeholder="sample@sample.com">
		</div>
		<div class="form-group col-md">
			<label>Contact Number<span class="error">* <!--?php echo $Err;?--></span></label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <div class="input-group-text">+63</div>
	        </div>
	        <input type="number" name="contnum" class="form-control" placeholder="9XX-XXX-XXXX" pattern="[9]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}">
	      </div>
	    </div>
		<div class="form-group col-md">
			<label>Facebook Account</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <div class="input-group-text"><i class="fa fa-facebook-square"></i></div>
	        </div>
	        <input type="text" class="form-control" placeholder="Username">
	      </div>
	    </div>
		</div>
		<div class="form-row">
		<div class="form-group col-md">
			<label>Parent/ Guardian Name<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="parname" class="form-control" placeholder="Full Name">
		</div>
		<div class="form-group col-md">
			<label>Parent/ Guardian Address<span class="error">* <!--?php echo $Err;?--></span></label>
	    	<input type="text" name="paradd" class="form-control" placeholder="Address">
		</div>
		</div>
		</div>
	</div>
	<br>
	<div class="container">
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary btn-block">ENROLL</button>
	</div>
	</div>
</form>
</div>
</body>
</html>