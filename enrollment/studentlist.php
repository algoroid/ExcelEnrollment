<?php require '../config/db.php'?>
<?php
	#Create Query
	$squery = 'SELECT * FROM studentinfo ORDER BY datecreated DESC';
	//$enquery = 'SELECT * FROM enrollmentinfo';
	#Get result
	$sres = mysqli_query($conn, $squery);
	//$enres = mysqli_query($conn, $enquery);
	#Fetch data
	$student = mysqli_fetch_all($sres, MYSQLI_ASSOC);
	//$enrolled = mysqli_fetch_all($enres, MYSQLI_ASSOC);
	#Free result
	mysqli_free_result($sres);
	//mysqli_free_result($enres);
	#Close connection
	mysqli_close($conn);
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student List - Excel</title>
	<?php require '../include/scriptsandlinks.php'?>
	<link rel="stylesheet" type="text/css" href="studentlist.css">
	<script>
	function myFunction() {
	  // Declare variables 
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("searchinput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("studenttablelist");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    if (td) {
	      txtValue = td.textContent || td.innerText;
	      if (txtValue.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}
	</script>
</head>
<body>
<?php include '../include/staffheader.php' ?>
<div class="jumbotron">
<h1 id="titles">STUDENT LIST</h1>
	<div class="form-row">
	<div class="col-md-7 input-group" id="searchlist">
	    <div class="input-group-prepend">
	    <div class="input-group-text"><i class="fas fa-search"></i></div>
	    </div>
	    <input type="text" class="form-control" id="searchinput" onkeyup="myFunction()" placeholder="Search for names..">
	</div>
	<div class="col-md-5">
		<div id="add">
		<a class="btn btn-outline-info btn-blocked" href="addstudent.php">ADD STUDENT</a>
	</div>
	</div>
	</div>
	<table id="studenttablelist">
	  <tr class="header">
	    <th style="width:40%;">Name</th>
	    <th style="width:30%;"></th>
	    <th style="width:30%;">Date Created</th>
	  </tr>
	  <?php foreach($student as $user): ?>
	  <tr>
	    <td><?php echo $user['lastname'],", ",$user['firstname']; ?></td>
	    <td><a class="btn btn-outline-primary btn-blocked" href="<?php echo ROOT_URL; ?>enrollment/studentprofile.php?id=<?php echo $user['id']; ?>">Go To Profile</a></td>
	    <td><small>Created On <?php echo $user['datecreated']; ?></small></td>
	  </tr>
	  <?php endforeach; ?>
	</table>
</div>
</body>
</html>