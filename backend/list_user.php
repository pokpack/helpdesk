<?php session_start();
	include('../config/connect.php');
	include('type_user.php');
	$sql = "SELECT u.u_idcard, u.u_prefix, u.u_fname, u.u_lname, u.u_mobile, u.u_tel, u.u_status,
 l.level_name, dep.dep_name, p.p_position FROM tb_user AS u
	LEFT JOIN tb_user_level AS l ON u.level_id = l.level_id
	LEFT JOIN tb_department AS dep ON u.dep_id = dep.dep_id
	LEFT JOIN tb_position AS p ON u.p_id = p.p_id
	ORDER BY u.u_idcard ASC";
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
        <!-- Button trigger modal -->
<a href="add_user.php"><button type="button" class="btn btn bg-green btn-sm"><i class="fa fa-plus"></i> เพิ่ม</button></a>
<p></p>
          <div class="box">
            <div class="box-header text-center bg-blue">
              <h3 class="box-title">จัดการข้อมูลผู้ใช้งานระบบ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              					<form method="post">
                                <table id="table1" width="100%" class="table table-hover">
                                	<thead>
                                    	<tr class="bg-gray">
                                        	<th width="6%" class="text-center">ลำดับ</th>
                                            <th width="14%">ชื่อผู้ใช้งาน</th>
                                            <th width="16%">ตำแหน่ง</th>
                                            <th width="13%">แผนก</th>
                                            <th width="12%">เบอร์มือถือ</th> 
                                            <th width="7%">เบอร์ภายใน</th>
                                            <th width="8%">สิทธิ์การใช้งาน</th> 
                                            <th width="10%">สถานะ</th> 
                                            <th width="3%">แก้ไข</th>
                                            <th width="3%">ปิด<br>ใช้งาน</th>
                                            <th width="3%">เปิด<br>ใช้งาน</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
										$i = 1;
										while($rows = mysqli_fetch_array($query)) {
									?>	
                                    	<tr>
                                        	<td align="center"><?php echo $i;?></td>
                                            <td><?php echo $rows['u_prefix'];?><?php echo $rows['u_fname'];?> <?php echo $rows['u_lname'];?></td>
                                            <td><?php echo $rows['p_position'];?></td>
                                            <td><?php echo $rows['dep_name'];?></td>
                                            <td><?php echo $rows['u_mobile'];?></td>
                                            <td><?php echo $rows['u_tel'];?></td>
                                            <td><?php echo $rows['level_name'];?></td>
                                            <td>
                                            	<?php
                                                	if($rows['u_status'] == '0') {
												?>
                                                <span class="badge badge bg-red">ปิดการใช้งาน</span>
                                                <?php } else { ?>
                                                <span class="badge badge bg-green">เปิดการใช้งาน</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                            <a href="edit_user.php?u_idcard=<?php echo $rows['u_idcard'];?>" onclick="if(confirm('คุณแน่ใจว่าต้องการแก้ไขข้อมูล')) return true; else return false;">
<button type="button" class="btn btn-info btn-sm btn-icon"><span class="fa fa-edit"></span></button>
                                                     </a>
                                            </td>
                                            <td>
                                            	<button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#cancelUserModal<?php echo $rows['u_idcard'];?>"><span class="fa fa-toggle-off"></span></button>
                                            </td>
                                            <td>
                                            	<button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="modal" data-target="#cancelUserOnModal<?php echo $rows['u_idcard'];?>"><span class="fa fa-toggle-on"></span></button>
                                            </td>
                                            <?php include('modal/form-delete-modal.php'); ?> 
                                        </tr>
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>
                                </form>
                                <?php include('action/edit_function.php'); ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <?php include('action/edit_function.php'); ?>
        <?php include('modal/form-edit-modal.php'); ?>
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