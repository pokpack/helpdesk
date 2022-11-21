<?php session_start();
	include('../config/connect.php');
	include('type_user.php');
	$sql = "SELECT * FROM tb_department ORDER BY dep_id ASC";
	$query = mysqli_query($conn, $sql);
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
          <form name="form_repair" method="post" action="action/action_insert_repair.php">
          <div class="box">
            <div class="box-header text-center bg-blue">
              <h3 class="box-title">แบบฟอร์มการแจ้งซ่อม</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              			<div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>ผู้แจ้งซ่อม</label>
                                        <input type="text" name="room" class="form-control" value="<?php echo $record['u_prefix']?><?php echo $record['u_fname']?> <?php echo $record['u_lname']?>" required readonly>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>ประเภทอุปกรณ์</label>
                                        <label>ตำแหน่ง</label>
                                        <select name="eq_id" class="form-control" required="">
                                        	<option value="">เลือกอุปกรณ์</option>
                                        	<?php
                                            	$sql = "SELECT * FROM tb_equipment ORDER BY eq_id ASC";
												$query = mysqli_query($conn, $sql);
												while($row = mysqli_fetch_array($query)) {
											?>
                                        	<option value="<?php echo $row['eq_id'];?>"><?php echo $row['eq_name'];?></option>
                                            <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>ชื่ออุปกรณ์</label>
                                        <input type="text" name="r_name" class="form-control" placeholder="เช่น Macbook Pro 2020" required>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>หมายเลขเครื่อง</label>
                                        <input type="text" name="r_serialnumber" class="form-control" required>
                                      </div>
                                    </div>
                                    
                                  </div>
                                  <div class="row">
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label>อาการ / สาเหตุ</label>
                                        <textarea name="r_detail" class="form-control"></textarea>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>อาคาร / ตึก</label>
                                        <select name="build_id" class="form-control" required="">
                                        	<option value="">เลือกอาคาร / ตึก</option>
                                        	<?php
                                            	$sql = "SELECT * FROM tb_building ORDER BY build_id ASC";
												$query = mysqli_query($conn, $sql);
												while($row = mysqli_fetch_array($query)) {
											?>
                                        	<option value="<?php echo $row['build_id'];?>"><?php echo $row['build_name'];?></option>
                                            <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <label>ชั้น</label>
                                        <input type="text" name="floor" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <label>ห้อง</label>
                                        <input type="text" name="room" class="form-control" required>
                                      </div>
                                    </div>
                                  </div>	
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            	<input type="hidden" name="u_idcard" value="<?php echo $record['u_idcard'];?>">
                
                                <button type="submit" class="btn btn bg-blue">บันทึกข้อมูล</button>
                                <button type="reset" class="btn btn bg-green">ยกเลิก</button>
                                
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