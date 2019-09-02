<!DOCTYPE html>
<html>
<head>
	<title>Excel Technical Skills and Career Center</title>
	<?php require '../include/scriptsandlinks.php' ?>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<?php include '../include/header.php' ?>
<!-------------------------ABOUT------------------------>
<section id="about"style="background-image: url(../img/aboutupwp.jpg); background-size: cover; margin: 10px; background-position: center; height: 500px;">
	<div class="container" style="padding-top: 150px;">
	<div class="row">
		<div class="col-md-6">
			
		</div>
		<div class="col-md-6" style="text-align: left;">
			<h1>About Us</h1>
			<h3>Excel Technical Skills and Career Center, Inc. was established with the aim of providing quality IT Training that is affordable and usable for the students.</h3>
		</div>
	</div>
	</div>
</section>
<!--------------------------COURSES-------------------------->
<section id="courses">
	<div class="container">
	<h1>Courses</h1>
	</div>
	<div class="row services" id="crs">
		<div class="col-md-1 text-center"></div>
		<div class="col-md-2 text-center" id="hovcrwd">
			<div class="container" id="crwd">
				<img src="../img/webdes.jpg" height="150px" width="150px">
				<h3>Creative Web Design</h3>
				<p>Learn how to design a creative and responsive websites.<br>Learn how to use HTML, CSS, Javascript, JQuery and Sass.</p>
			</div>
		</div>
		<div class="col-md-2 text-center" id="hovwd">
			<div class="container" id="wd">
				<img src="../img/webdev.jpg" height="150px" width="150px">
				<h3>Web Development</h3>
				<p>Learn on how to build & develop websites and web applications. Learn how to use HTML, CSS, Javascript, JQuery and PHP.</p>
			</div>
		</div>
		<div class="col-md-2 text-center" id="hovemst">
			<div class="container" id="emst">
				<img src="../img/eventms.jpg" height="150px" width="150px">
				<h3>Event Management Services</h3>
				<p>Learn how to become a professional event manager. Both Training and Assesment available</p>
			</div>
		</div>
		<div class="col-md-2 text-center" id="hovtm">
			<div class="container" id="tm">
				<img src="../img/trainmet.jpg" height="150px" width="150px">
				<h3>Trainer's Methodology</h3>
				<p>Learn on how to become a technical Assessor/Trainer.It is consists of competencies a TVET trainer or assessor must achieve.</p>
			</div>
		</div>
		<div class="col-md-2 text-center" id="hovtd">
			<div class="container" id="td">
				<img src="../img/techdraft.jpg" height="150px" width="150px">
				<h3>Technical Drafting</h3>
				<p>Learn the skills in technical drafting <br> using both manual drafting methods and CAD system.</p>
			</div>
		</div>
		<div class="col-md-1 text-center"></div>
	</div>
</section>
<!-------------------------CONTACT-------------------------->
<section id="contact" style="background-image: url(../img/aboutwp.jpg); background-size: cover; margin: 10px; background-position: center;">
	<div class="container">
		<div class="row">
			<div class="col-md-6" style="padding: 10px;">
				<h1>Location</h1><h4><i class="fa fa-location-arrow" aria-hidden="true"></i> #201 Mahogany St. Corner Marcos Highway, Santolan, Pasig</h4>
				<div id="googleMap" style="width:100%;height:400px;"></div>
				<script>
				function myMap() {
				var mapProp= {
				  center:new google.maps.LatLng(14.619016, 121.091526),
				  zoom:5,
				};
				var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
				}
				</script>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB80vEHjtC-g7tAAurqebrs2oNcNQSO3Ok&callback=myMap"></script>
			</div>
			<div class="col-md-6" style="padding: 20px; text-align: center;">
				<h1 style="margin-top: 80px;">Contacts</h1>
				<div class="container">
				<a href="https://www.facebook.com/exceltscareercenter/"><h4><i class="fa fa-facebook-square" aria-hidden="true"></i> exceltscareercenter</h4></a>
				<a href="https://www.messenger.com/t/exceltscareercenter"><h4><i class="fa fa-facebook-messenger" aria-hidden="true"></i> exceltscareercenter</h4></a>
				<h4><i class="fa fa-phone" aria-hidden="true"></i> (02) 656 1738</h4>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="../include/smooth-scroll.js"></script>
<script>
	var scroll = new SmoothScroll('a[href*="#"]');
</script>
</body>
</html>