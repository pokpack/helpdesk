<?php
	
	//อัปเดต Position
	if(isset($_POST['btnEditPosition'])){
		$p_id = $_POST['p_id'];
		$p_position = $_POST['p_position'];
		
		$sqlu1 = "UPDATE tb_position SET p_position = '$p_position'
				WHERE p_id = '$p_id'";
		$queryu1 = mysqli_query($conn, $sqlu1);
		if($queryu1){
			echo '
				<script>
					swal({
						title: "แก้ไขข้อมูลสำเร็จ", 
						icon: "success",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';
		}
		else
		{
			echo '
				<script>
					swal({
						title: "Error แก้ไขข้อมูลไม่สำเร็จ", 
						icon: "error",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';	
		}
	}
	
	//อัปเดต Department
	if(isset($_POST['btnEditDepartment'])){
		$dep_id = $_POST['dep_id'];
		$dep_name = $_POST['dep_name'];
		
		$sqlu2 = "UPDATE tb_department SET dep_name = '$dep_name'
				WHERE dep_id = '$dep_id'";
		$queryu2 = mysqli_query($conn, $sqlu2);
		if($queryu2){
			echo '
				<script>
					swal({
						title: "แก้ไขข้อมูลสำเร็จ", 
						icon: "success",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';
		}
		else
		{
			echo '
				<script>
					swal({
						title: "Error แก้ไขข้อมูลไม่สำเร็จ", 
						icon: "error",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';	
		}
	}
	
	//อัปเดต Equipment
	if(isset($_POST['btnEditEquipment'])){
		$eq_id = $_POST['eq_id'];
		$eq_name = $_POST['eq_name'];
		
		$sqlu3 = "UPDATE tb_equipment SET eq_name = '$eq_name'
				WHERE eq_id = '$eq_id'";
		$queryu3 = mysqli_query($conn, $sqlu3);
		if($queryu3){
			echo '
				<script>
					swal({
						title: "แก้ไขข้อมูลสำเร็จ", 
						icon: "success",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';
		}
		else
		{
			echo '
				<script>
					swal({
						title: "Error แก้ไขข้อมูลไม่สำเร็จ", 
						icon: "error",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';	
		}
	}
	
	
	//อัปเดต Building
	if(isset($_POST['btnEditBuilding'])){
		$build_id = $_POST['build_id'];
		$build_name = $_POST['build_name'];
		
		$sqlu4 = "UPDATE tb_building SET build_name = '$build_name'
				WHERE build_id = '$build_id'";
		$queryu4 = mysqli_query($conn, $sqlu4);
		if($queryu4){
			echo '
				<script>
					swal({
						title: "แก้ไขข้อมูลสำเร็จ", 
						icon: "success",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';
		}
		else
		{
			echo '
				<script>
					swal({
						title: "Error แก้ไขข้อมูลไม่สำเร็จ", 
						icon: "error",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';	
		}
	}
	
	//อัปเดต User
	if(isset($_POST['btnCancelUser'])){
		$u_idcard = $_POST['u_idcard'];
		$u_status = '0';
		
		$sqlu5 = "UPDATE tb_user SET u_status = '$u_status'
				WHERE u_idcard = '$u_idcard'";
		$queryu5 = mysqli_query($conn, $sqlu5);
		if($queryu5){
			echo '
				<script>
					swal({
						title: "ปิดการใช้งานระบบสำเร็จ", 
						icon: "success",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';
		}
		else
		{
			echo '
				<script>
					swal({
						title: "Error ยกเลิกผู้ใช้งานไม่สำเร็จ", 
						icon: "error",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';	
		}
	}
	
	//อัปเดต User
	if(isset($_POST['btnCancelUserOn'])){
		$u_idcard = $_POST['u_idcard'];
		$u_status = '1';
		
		$sqlu6 = "UPDATE tb_user SET u_status = '$u_status'
				WHERE u_idcard = '$u_idcard'";
		$queryu6 = mysqli_query($conn, $sqlu6);
		if($queryu6){
			echo '
				<script>
					swal({
						title: "เปิดการใช้งานสำเร็จ", 
						icon: "success",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';
		}
		else
		{
			echo '
				<script>
					swal({
						title: "Error ยกเลิกผู้ใช้งานไม่สำเร็จ", 
						icon: "error",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';	
		}
	}
	
	//อัปเดต สถานะ และบันทึก log
	if(isset($_POST['btnSent'])){
		$r_no = $_POST['r_no'];
		$s_id = $_POST['s_id'];
		$technician_id = $record['u_idcard'];
		$sqlu7 = "UPDATE tb_repair SET s_id = '$s_id' WHERE r_no = '$r_no'";
		$queryu7 = mysqli_query($conn, $sqlu7);
		
		include('function_get_system.php');
		
		if($queryu7){
			echo '
				<script>
					swal({
						title: "บันทึกข้อมูลสำเร็จ", 
						icon: "success",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';
		}
		else
		{
			echo '
				<script>
					swal({
						title: "Error เกิดข้อผิดพลาด", 
						icon: "error",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';	
		}
	}
	//อัปเดต มอบหมายงานซ่อม
	if(isset($_POST['btnApprove'])){
		$r_no = $_POST['r_no'];
		$technician_id = $_POST['technician_id'];
		$head_id = $_POST['head_id'];
		$s_id = "2"; //มอบหมายงานแล้ว
		$sqlu8 = "UPDATE tb_repair SET s_id = '$s_id', technician_id = '$technician_id', head_id = '$head_id' WHERE r_no = '$r_no'";
		$queryu8 = mysqli_query($conn, $sqlu8);
		
		include('function_get_system.php');
		
		if($queryu8){
			echo '
				<script>
					swal({
						title: "บันทึกข้อมูลสำเร็จ", 
						icon: "success",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';
		}
		else
		{
			echo '
				<script>
					swal({
						title: "Error เกิดข้อผิดพลาด", 
						icon: "error",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';	
		}
	}
	
	
	if(isset($_POST['btnEditProfile'])){
		$u_prefix = $_POST['u_prefix'];
		$u_idcard = $_POST['u_idcard'];
		$u_fname = $_POST['u_fname'];
		$u_lname = $_POST['u_lname'];
		$u_mobile = $_POST['u_mobile'];
		$u_email = $_POST['u_email'];
		
		$sqlu3 = "UPDATE tb_user SET 
		u_prefix = '$u_prefix',
		u_fname = '$u_fname',
		u_lname = '$u_lname',
		u_mobile = '$u_mobile',
		u_email = '$u_email'
				WHERE u_idcard = '$u_idcard'";
		$queryu9 = mysqli_query($conn, $sqlu9);
		if($queryu9){
			echo '
				<script>
					swal({
						title: "แก้ไขข้อมูลสำเร็จ", 
						icon: "success",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';
		}
		else
		{
			echo '
				<script>
					swal({
						title: "Error แก้ไขข้อมูลไม่สำเร็จ", 
						icon: "error",
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';	
		}
	}
	
	
	if(isset($_POST['btnResetPassword'])){
		$u_idcard = $_POST['u_idcard'];
		$u_password1 = $_POST['u_password1'];
		$u_password2 = $_POST['u_password2'];
		$u_password = md5($u_password2);
		
		if($u_password1 == $u_password2)
		{
			$sqlu10 = "UPDATE tb_user SET 
			u_password = '$u_password'
					WHERE u_idcard = '$u_idcard'";
			$queryu10 = mysqli_query($conn, $sqlu10);
			if($queryu10){
				echo '
					<script>
						swal({
							title: "เปลี่ยนรหัสผ่านสำเร็จ", 
							icon: "success",
							button: "ตกลง",
							}).then( () => {
								location.href = "logout.php"
											
							});	
					</script>
				';
			}
			else
			{
				echo '
					<script>
						swal({
							title: "Error เปลี่ยนรหัสผ่านไม่สำเร็จ", 
							icon: "error",
							button: "ตกลง",
							}).then( () => {
								location.href = "'.$_SERVER['REQUEST_URI'].'"
											
							});	
					</script>
				';	
			}	
		}
		else
		{
			echo '
				<script>
					swal({
						title: "ไม่สามารถเปลี่ยนรหัสผ่านได้", 
						text: "เนื่องจากรหัสที่ป้อนไม่ตรงกัน",
						icon: "info",
						dangerMode: true,
						button: "ตกลง",
						}).then( () => {
							location.href = "'.$_SERVER['REQUEST_URI'].'"
										
						});	
				</script>
			';
			exit();
		}
	}
	
?>