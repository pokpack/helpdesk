<?php session_start();
	include('../config/connect.php');
	include('type_user.php');
?>
<?php
	$query = "SELECT e.eq_name, COUNT(r.r_no) as total FROM tb_repair AS r
	INNER JOIN tb_equipment AS e ON r.eq_id = e.eq_id
	GROUP BY r.eq_id";
	$result = mysqli_query($conn, $query);

    $datax = array();
    foreach ($result as $k) {
      $datax[] = "['".$k['eq_name']."'".", ".$k['total']."]";
    }

    $datax = implode(",", $datax);
?>
<?php
	$query2 = "SELECT s.s_status, COUNT(r.s_id) as total2 FROM tb_repair AS r
	INNER JOIN tb_status AS s ON r.s_id = s.s_id
	GROUP BY r.s_id";
	$result2 = mysqli_query($conn, $query2);

    $datax2 = array();
    foreach ($result2 as $k) {
      $datax2[] = "['".$k['s_status']."'".", ".$k['total2']."]";
    }

    $datax2 = implode(",", $datax2);
?>
<?php
	$query3 = "SELECT d.dep_name, COUNT(r.r_no) as total3 FROM tb_repair AS r
	INNER JOIN tb_user AS u ON r.u_idcard = u.u_idcard
	INNER JOIN tb_department AS d ON u.dep_id = d.dep_id
	GROUP BY u.dep_id";
	$result3 = mysqli_query($conn, $query3);

    $datax3 = array();
    foreach ($result3 as $k) {
      $datax3[] = "['".$k['dep_name']."'".", ".$k['total3']."]";
    }

    $datax3 = implode(",", $datax3);
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
            <div class="box-header text-center bg-blue-active">
              <h3 class="box-title">รายงานการแจ้งซ่อม Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              					<div class="row">
                                	<div class="col-md-4">
                                    	<div id="piechart" style="width:100%; height:40vh;"></div>
                                    </div> <!--./col-->
                                    
                                    <div class="col-md-4">
                                    	<div id="piechart2" style="width:100%; height:40vh;"></div>
                                    </div> <!--./col-->
                                    
                                    <div class="col-md-4">
                                    	<div id="piechart3" style="width:100%; height:40vh;"></div>
                                    </div> <!--./col-->
                                </div> <!--./row-->
                                
                                <div class="row">
                                	<div class="col-md-4">
                                    	<?php include('datail_equipment.php');?>
                                    	
                                    </div> <!--./col-->
                                    
                                    <div class="col-md-4">
										<?php include('datail_status.php');?>
                                    </div> <!--./col-->
                                    
                                     <div class="col-md-4">
										<?php include('datail_department.php');?>
                                    </div> <!--./col-->
                                    
                                </div> <!--./row-->
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
    <script type="text/javascript" src="assets/chart-pie/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Summary per eq_name'],
          <?php echo $datax;?>
        ]);

        var options = {
          title: 'รายงานแยกตามอุปกรณ์'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Summary per s_status'],
          <?php echo $datax2;?>
        ]);

        var options = {
          title: 'รายงานแยกตามสถานะ'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Summary per dep_name'],
          <?php echo $datax3;?>
        ]);

        var options = {
          title: 'รายงานแยกตามแผนก'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>
</body>
</html>
<?php
  mysqli_close($conn);
?>