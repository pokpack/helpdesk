<?php session_start();
	include('../config/connect.php');
	include('type_user.php');
	$s_id = (isset($_POST['s_id'])) ? $_POST['s_id'] : '';
	$sql = "SELECT * FROM tb_repair AS r
	INNER JOIN tb_equipment AS e ON r.eq_id = e.eq_id
	INNER JOIN tb_building AS b ON r.build_id = b.build_id
	INNER JOIN tb_user AS u ON r.u_idcard = u.u_idcard
	INNER JOIN tb_department AS d ON u.dep_id = d.dep_id
	INNER JOIN tb_status AS s ON r.s_id = s.s_id";
	if($s_id == "")
	{
		$sql .= " ORDER BY r.r_save ASC";
	}
	else
	{
		$sql .= " WHERE r.s_id = '$s_id' ORDER BY r.r_save ASC";
	}	
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
<a href="add_repair_staff.php"><button type="button" class="btn btn bg-green btn-sm">
  <span class="fa fa-plus"></span> แบบฟอร์มแจ้งซ่อม
</button></a>
						<form method="post" name="frm_search" action="">
							<div class="form-row">
                            <div class="col-md-4"></div>                          
                            <div class="col-md-3">
                            	<select name="s_id" class="form-control">
                                    <option value="">แสดงทุกสถานะทั้งหมด</option>
                                    <?php
                                        $sql2 = "SELECT * FROM tb_status ORDER BY s_id ASC";
                                        $query2 = mysqli_query($conn, $sql2);
                                        while($row2 = mysqli_fetch_array($query2)) {
                                    ?>
                                    <option value="<?php echo $row2['s_id'];?>"><?php echo $row2['s_status'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                            	<button type="submit" name="btn_search" class="btn btn-success" style="margin-top:-1px;"><i class="fa fa-search"></i> ค้นหา</button>
                            </div>
                            <div class="col-md-3"></div>
							</div> <!--./row--> 
                            </form> 
<p></p><br><br>

          <div class="box">
            <div class="box-header text-center bg-blue">
              <h3 class="box-title">ข้อมูลการแจ้งซ่อม</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              				<form method="post">
                                <table id="table1" width="100%" class="table table-hover">
                                	<thead>
                                    	<tr class="bg-gray">
                                        	<th width="3%" class="text-center">ลำดับ</th>
                                            <th width="11%">ประเภทอุปกรณ์</th>
                                            <th width="20%">ชื่ออุปกรณ์</th>
                                            <th width="14%">หมายเลขเครื่อง</th>
                                            <th width="14%">ผู้แจ้งซ่อม</th>
                                            <th width="10%">แผนก</th>
                                            <th width="14%">วันที่แจ้งซ่อม</th>
                                            <th width="8%">สถานะ</th>
                                            <th width="2%" class="text-center">รายละเอียด</th>
                                            <th width="2%" class="text-center">มอบหมายงาน</th>
                                            <th width="2%" class="text-center">แก้ไข</th>
                                            <th width="2%" class="text-center">ยกเลิก</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
										$i = 1;
										while($rows = mysqli_fetch_array($query)) {
									?>	
                                    	<tr>
                                        	<td align="center"><?php echo $i;?></td>
                                            <td><?php echo $rows['eq_name'];?></td>
                                            <td><?php echo $rows['r_name'];?></td>
                                            <td><?php echo $rows['r_serialnumber'];?></td>
                                            <td><?php echo $rows['u_prefix'];?><?php echo $rows['u_fname'];?> <?php echo $rows['u_lname'];?></td>
                                            <td><?php echo $rows['dep_name'];?></td>
                                            <td align="center"><?php echo date_format(date_create($rows['r_save']),"d/m/Y H:i:s");?></td>
                                            <td>
                                            	<?php
                                                	if($rows['s_id'] == '1') {
												?>
                                                <span class="badge badge bg-gray"><?php echo $rows['s_status'];?></span>
                                                <?php } else if($rows['s_id'] == '2') { ?>
                                                <span class="badge badg bg-purple"><?php echo $rows['s_status'];?></span>
                                                <?php }else if($rows['s_id'] == '3') { ?>
                                                <span class="badge badge bg-blue"><?php echo $rows['s_status'];?></span>
                                                <?php } else if($rows['s_id'] == '4') { ?>
                                                <span class="badge badge bg-green"><?php echo $rows['s_status'];?></span>
                                                <?php } else { ?>
                                                <span class="badge badge bg-red"><?php echo $rows['s_status'];?></span>
                                                <?php } ?>
                                                
                                            </td>
                                            <td align="center">
                                            	<a href="print_repair.php?r_no=<?php echo $rows['r_no'];?>"><button type="button" class="btn btn-default btn-sm btn-round btn-icon"><span class="fa fa-file-text"></span></button></a>
                                            </td>
                                            <td align="center">
                                            	<button type="button" class="btn btn-info btn-sm btn-round btn-icon" data-toggle="modal" data-target="#approveRepairModal<?php echo $rows['r_no'];?>"><span class="fa fa-check-square-o"></span></button>
                                            </td>
											<td align="center">
                                                <a href="edit_repair.php?r_no=<?php echo $rows['r_no'];?>"><button type="button" class="btn btn-success btn-sm btn-round btn-icon"><span class="fa fa-edit"></span></button></a>
                                            </td>
                                            <td>
                                            <?php if($rows['s_id'] == '5') { ?> 
                                            	<button type="button" disabled="" class="btn btn-warning btn-sm btn-round btn-icon"><span class="fa fa-times-circle"></span></button>
                                            	
                                            <?php } else { ?>
                                            	<button type="button" class="btn btn-warning btn-sm btn-round btn-icon" data-toggle="modal" data-target="#cancelRepairModal<?php echo $rows['r_no'];?>"><span class="fa fa-times-circle"></span></button>
                                            <?php } ?>
                                            </td>
                                            <?php include('modal/form-edit-modal.php'); ?>
                                            <?php include('modal/form-delete-modal.php'); ?> 
                                            
                                        </tr>
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>
          						</form>
                                <?php include('action/add_function.php'); ?>
                                <?php include('action/edit_function.php'); ?>
                                <?php include('action/delete_function.php'); ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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