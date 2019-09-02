<?php require '../config/db.php'?>
<?php
	$query = 'SELECT * FROM staffinfo';
	$result = mysqli_query($conn, $query);
	$staff = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Excel Admin</title>
	<?php include '../include/scriptsandlinks.php' ?>
</head>
<body>
	<?php include '../include/staffheader.php' ?>
	<h1 style="text-align: center;">WELCOME TO EXCEL <!--?php echo $staff['staffname']; ?--></h1>
</body>
</html>