<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<section class="section">
		<?php
			$id = $_GET["id"];

			$con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
			$sql = "select * from member where id='$id'";
			$result = mysqli_query($con, $sql);
			$num_record = mysqli_num_rows($result);

			mysqli_close($con);
		?>
		<script type="text/javascript">
			let row = "<?=$num_record?>";
			if( row == 1 ) {
				parent.document.getElementById("chk_id2").value = "0";
				parent.document.getElementById("chk_id1").value = "";
				parent.alert("이미 사용중인 아이디입니다.\n다른 아이디를 사용해주세요.");
			}
			else {
				parent.document.getElementById("chk_id2").value = "1";
				parent.alert("사용 가능한 아이디입니다.");
			}
		</script>
</body>
</html>