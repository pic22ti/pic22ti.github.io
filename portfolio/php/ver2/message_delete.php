<meta charset="utf-8">
<?php
	$mode = $_GET["mode"];
	$num = $_GET["num"];

	$con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
	$sql = "delete from messagebox where num=$num";
	mysqli_query($con, $sql);
	mysqli_close($con);

	if ($mode == "send") {
		$url = "message_box.php?mode=send";
	}
	else {
		$url = "message_box.php?mode=rv";
	}

	echo "
		<script>
			location.href = '$url';
		</script>
	";
?>