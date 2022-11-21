<?php session_start();
	include('../config/connect.php');
	include('type_user.php');
	$u_idcard = $_GET['u_idcard'];
	$sql = "SELECT u.*, l.level_name, dep.dep_name, p.p_position FROM tb_user AS u
	INNER JOIN tb_user_level AS l ON u.level_id = l.level_id
	INNER JOIN tb_department AS dep ON u.dep_id = dep.dep_id
	INNER JOIN tb_position AS p ON u.p_id = p.p_id
	WHERE u.u_idcard = '$u_idcard'";
	$query = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('import_style.php');?>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&amp;subset=thai" rel="stylesheet">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <?php include('header.php');?>
  
  <?php include('menu_left.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <?php
    	include('menu_main.php');
	?>

    <!-- Main content -->
    <section class="content">
	<!--เนื้อหา-->

<div class="row">
		<div class="col-md-12">
			 <form name="form_user" method="post" action="action/action_update_user.php">
          <div class="box">
            <div class="box-header text-center bg-blue">
              <h3 class="box-title">แก้ไขข้อมูลผู้ใช้งาน</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              					<div class="row">
                                    <div class="col-md-4 pr-md-1">
                                      <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="u_username" class="form-control" value="<?php echo $rows['u_username'];?>" disabled="disabled">
                                      </div>
                                    </div>
                                  </div>
                                            
                              <div class="row">
                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <label>คำนำหน้า</label>
                                        <input type="text" name="u_prefix" class="form-control" value="<?php echo $rows['u_prefix'];?>">
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" name="u_fname" class="form-control" value="<?php echo $rows['u_fname'];?>">
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label>นามสกุล</label>
                                        <input type="text" name="u_lname" class="form-control" value="<?php echo $rows['u_lname'];?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-2 pr-md-1">
                                      <div class="form-group">
                                        <label>เบอร์โทรศัพท์มือถือ</label>
                                        <input type="text" name="u_mobile" class="form-control" value="<?php echo $rows['u_mobile'];?>">
                                      </div>
                                    </div>
                                    <div class="col-md-2 pr-md-1">
                                      <div class="form-group">
                                        <label>เบอร์ภายใน</label>
                                        <input type="text" name="u_tel" class="form-control" value="<?php echo $rows['u_tel'];?>">
                                      </div>
                                    </div>
                                    <div class="col-md-3 pr-md-1">
                                      <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="u_email" class="form-control" value="<?php echo $rows['u_email'];?>">
                                      </div>
                                    </div>
                                    <div class="col-md-2 pl-md-1">
                                      <div class="form-group">
                                        <label>วันที่ลงทะเบียน</label>
                                        <input type="text" name="u_save" class="form-control" value="<?php echo $rows['u_save'];?>" disabled="disabled">
                                      </div>
                                    </div>
                                  </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            	<input type="hidden" name="u_idcard" value="<?php echo $rows['u_idcard'];?>">
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
          </div>
          <!-- /.box -->
          </form>
        </div>
        <!-- /.col -->
</div> <!-- ./row-->

    <!--ปิดเนื้อหา-->

    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
  
  <?php include('footer.php');?>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<?php include('import_script.php');?>
</body>
</html>
<?php
  mysqli_close($conn);
?>