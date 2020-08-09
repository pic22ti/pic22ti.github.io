<?php
	$id = $_GET["id"];

	$pass = $_POST["pass"];
	$name = $_POST["name"];
	$email = $_POST["email"];

	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "update member set pass='$pass', name='$name', email='$email' where id='$id'";
	mysqli_query($con, $sql);
	mysqli_close($con);

	echo "
		<script>
			location.href='index.php';
		</script>
	";
?>