<?php session_start();
	include('config/connect.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title;?></title>
    <?php include('meta_tag.php');?>
    <script src="js/sweetalert.min.js"></script>
  </head>
  <body>
    
	<div class="container" id="mgC2">
    	<div class="row">
            
        	<div class="col-md-1 col-lg-1"></div>
        	<div class="col-md-10 col-lg-10">
            
                <div class="card" id="bg-card">
                    <div class="card-header" align="center" id="bg-blue">
                      <h5>แบบฟอร์มลงลงทะเบียน</h5>
                    </div>
        
                    <div class="card-body">
                       <form name="form_register" method="post">
        
								<div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="u_username" class="form-control" required>
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="u_password" class="form-control" required>
                                      </div>
                                    </div>
                                  </div>
 
                                  <div class="row">
                                    <div class="col-md-2 pr-md-1">
                                      <div class="form-group">
                                        <label>คำนำหน้า</label>
                                        <input type="text" name="u_prefix" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-md-5 pr-md-1">
                                      <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" name="u_fname" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-md-5 pl-md-1">
                                      <div class="form-group">
                                        <label>นามสกุล</label>
                                        <input type="text" name="u_lname" class="form-control" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>บัตรประชาชน</label>
                                        <input type="text" name="u_idcard" maxlength="13" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>เบอร์โทรศัพท์มือถือ</label>
                                        <input type="text" name="u_mobile" maxlength="10" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <label>เบอร์ภายใน</label>
                                        <input type="text" name="u_tel" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="u_email" class="form-control" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4 pr-md-1">
                                      <div class="form-group">
                                        <label>ตำแหน่ง</label>
                                        <select name="p_id" class="form-control" required="">
                                        	<option value="">เลือกตำแหน่ง</option>
                                        	<?php
                                            	$sql = "SELECT * FROM tb_position ORDER BY p_id ASC";
												$query = mysqli_query($conn, $sql);
												while($row = mysqli_fetch_array($query)) {
											?>
                                        	<option value="<?php echo $row['p_id'];?>"><?php echo $row['p_position'];?></option>
                                            <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-4 pr-md-1">
                                      <div class="form-group">
                                        <label>แผนก</label>
                                        <select name="dep_id" class="form-control" required="">
                                        	<option value="">เลือกแผนก</option>
                                        	<?php
                                            	$sql = "SELECT * FROM tb_department ORDER BY dep_id ASC";
												$query = mysqli_query($conn, $sql);
												while($row = mysqli_fetch_array($query)) {
											?>
                                        	<option value="<?php echo $row['dep_id'];?>"><?php echo $row['dep_name'];?></option>
                                            <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                  </div> <!--./row-->
                                  
                                  <div class="row">
                                  	<div class="col-md-12" align="left">
                                    	<button type="submit" name="btnRegister" class="btn btn-success">ลงทะเบียน</button>
                                    </div>
                                  </div> <!--./row-->

        
                      </form>
                      
                      
<?php
	if(isset($_POST['btnRegister'])){
		
		$u_prefix = $_POST['u_prefix'];
		$u_fname = $_POST['u_fname'];
		$u_lname = $_POST['u_lname'];
		$u_idcard = $_POST['u_idcard'];
		$u_mobile = $_POST['u_mobile'];
		$u_tel = $_POST['u_tel'];
		$u_email = $_POST['u_email'];
		$p_id = $_POST['p_id'];
		$dep_id = $_POST['dep_id'];
		$u_username = $_POST['u_username'];
		$u_password = md5($_POST['u_password']);
		$level_id = "03";
		$u_status = '0';
		$u_save = date('Y-m-d H:i:s');
	
		$sql = "INSERT INTO tb_user(u_prefix, u_fname, u_lname, u_idcard, u_mobile, u_tel, u_email, p_id, dep_id, u_username, u_password, level_id, u_status, u_save) VALUES('$u_prefix', '$u_fname', '$u_lname', '$u_idcard', '$u_mobile', '$u_tel', '$u_email', $p_id, $dep_id, '$u_username', '$u_password', '$level_id', '$u_status', '$u_save')";
		$query = mysqli_query($conn, $sql);
		
		if($query){			
			echo '
				<script>
					swal({
						title: "ลงทะเบียนข้อมูลสำเร็จ", 
						icon: "success",
						button: "ตกลง",
						}).then( () => {
							location.href = "index.php"
										
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
?>                       
                      
                      
                      
                    </div>
                  </div> <!-- ./card -->           	
            </div> <!--./col-->
            <div class="col-md-1 col-lg-1"></div>
        </div> <!--./row-->
    </div> <!--./container-->
    
    <?php include('script_js.php');?>
  </body>
</html>