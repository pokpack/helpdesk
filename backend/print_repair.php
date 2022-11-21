<?php session_start();
	include('../config/connect.php');
	include('type_user.php');
	$r_no = $_GET['r_no'];
	$sql = "SELECT r.*, e.eq_name, b.build_name, d.dep_name, p.p_position, u.u_prefix, u.u_fname, u.u_lname, u.u_mobile, u.u_tel, CONCAT(uu.u_prefix, '', uu.u_fname, ' ', uu.u_lname) AS technician_name, CONCAT(uuu.u_prefix, '', uuu.u_fname, ' ', uuu.u_lname) AS head_name FROM tb_repair AS r
	INNER JOIN tb_equipment AS e ON r.eq_id = e.eq_id
	INNER JOIN tb_building AS b ON r.build_id = b.build_id
	INNER JOIN tb_user AS u ON r.u_idcard = u.u_idcard
	INNER JOIN tb_department AS d ON u.dep_id = d.dep_id
	INNER JOIN tb_position AS p ON u.p_id = p.p_id
	LEFT JOIN tb_user AS uu ON r.technician_id = uu.u_idcard
	LEFT JOIN tb_user AS uuu ON r.head_id = uuu.u_idcard
	WHERE r.r_no = '$r_no'";
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
          <div class="box">
            <div class="box-header text-center bg-blue">
              <h3 class="box-title">แบบฟอร์มใบแจ้งซ่อม</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              					<p align="right">เลขที่แจ้งซ่อม : <?php echo $rows['r_no'];?></p>
                                <table id="table1" width="100%" class="table">
                                    <tbody>
                                    	<tr>
                                        	<td width="15%" align="right">ผู้แจ้งซ่อม :</td>
                                        	<td width="25%"><?php echo $rows['u_prefix'];?><?php echo $rows['u_fname'];?> <?php echo $rows['u_lname'];?></td>      										<td width="15%" align="right">&nbsp;</td>
                                            <td width="55%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                        	<td align="right">ตำแหน่ง :</td>
                                        	<td><?php echo $rows['p_position'];?></td>
                                            <td align="right">แผนก :</td>
                                        	<td><?php echo $rows['dep_name'];?></td>      
                                        </tr>
                                        <tr>
                                        	<td align="right">เบอร์โทรศัพท์มือถือ :</td>
                                        	<td><?php echo $rows['u_mobile'];?></td> 
                                            <td align="right">เบอร์ภายใน :</td>
                                            <td><?php echo $rows['u_tel'];?></td>     
                                        </tr>
                                        <tr>
                                        	<td align="right">ประเภทอุปกรณ์ :</td>
                                        	<td><?php echo $rows['eq_name'];?></td> 
                                            <td align="right">รายการ :</td>
                                            <td><?php echo $rows['r_name'];?></td>     
                                        </tr>
                                        <tr>
                                        	<td align="right">หมายเลขเครื่อง :</td>
                                        	<td><?php echo $rows['r_serialnumber'];?></td> 
                                            <td align="right">อาการ / สาเหตุ :</td>
                                            <td><?php echo $rows['r_detail'];?></td>     
                                        </tr>
                                        <tr>
                                        	<td align="right">อาคาร / ตึก :</td>
                                        	<td><?php echo $rows['build_name'];?></td> 
                                            <td align="right">ชั้น :</td>
                                            <td><?php echo $rows['floor'];?></td>     
                                        </tr>
                                        <tr>
                                        	<td align="right">ห้อง :</td>
                                        	<td><?php echo $rows['room'];?></td> 
                                            <td align="right">วันที่แจ้งซ่อม :</td>
                                            <td><?php echo date_format(date_create($rows['r_save']),"d/m/Y H:i:s");?></td>     
                                        </tr>
                                        <tr>
                                        	<td align="right">ช่างผู้ดำเนินการซ่อม :</td>
                                        	<td><?php echo $rows['technician_name'];?></td>
                                            <td>หัวหน้ามอบหมายงานซ่อม :</td>
                                            <td><?php echo $rows['head_name'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
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