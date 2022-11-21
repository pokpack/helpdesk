<?php session_start();
	include('../../config/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="../../js/sweetalert.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
	<link href="../assets/css/custom.css" rel="stylesheet" type="text/css">
</head>
<body>
<div align="center">
<?php
	$u_idcard = $_POST['u_idcard'];
	$eq_id = $_POST['eq_id'];
	$r_name = $_POST['r_name'];
	$r_serialnumber = $_POST['r_serialnumber'];
	$r_detail = $_POST['r_detail'];
	$build_id = $_POST['build_id'];
	$floor = $_POST['floor'];
	$room = $_POST['room'];
	$s_id = '1';
	$r_save = date('Y-m-d H:i:s');
	
	$sqlcheck = "SELECT MAX(no) + 1 AS gen_no FROM tb_repair";
	$querycheck = mysqli_query($conn, $sqlcheck);
	$numrow = mysqli_fetch_array($querycheck);
	$a = "R";
	$gen_no = $numrow['gen_no'];
	$r_no = $a.$gen_no;

	
	$sql = "INSERT INTO tb_repair(r_no, u_idcard, eq_id, r_name, r_serialnumber, r_detail, build_id, floor, room, s_id, r_save) VALUES('$r_no', '$u_idcard', $eq_id, '$r_name', '$r_serialnumber', '$r_detail', $build_id, '$floor', '$room', '$s_id', '$r_save')";
	$query = mysqli_query($conn, $sql);
	if($query)
	{
		echo '
			<script>
				swal({
					title: "บันทึกข้อมูลการแจ้งซ่อมสำเร็จ",
					icon: "success",
					button: "ตกลง",
					}).then( () => {
					location.href = "../repair.php"
				});	
			</script>
		';		
	}
	else
	{
		echo '
			<script>
				swal({
					title: "เกิดข้อผิดพลาด Error",
					icon: "error",
					button: "ตกลง",
					}).then( () => {
					location.href = "../add_repair.php"
				});	
			</script>
		';
		
	}
	mysqli_close($conn);
?>
</div>
</body>
</html>
