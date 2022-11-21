<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <aside class="main-sidebar">
     <section class="sidebar">     

      <ul class="sidebar-menu" data-widget="tree">
        
        <li>
          <a href="index.php">
            <i class="fa fa-home"></i> <span>หน้าหลัก</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        <?php
			if($_SESSION['level_id'] == '01'){
	    ?>
        <li>
          <a href="list_user.php">
            <i class="fa fa-user"></i> <span>จัดการข้อมูลผู้ใช้งาน</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        <?php } ?>
        
        
        <?php
			if($_SESSION['level_id'] == '01' || $_SESSION['level_id'] == '02'){
	    ?>
        <li>
          <a href="dashboard.php">
            <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        
        <li>
          <a href="list_repair.php">
            <i class="fa fa-bell"></i> <span>ข้อมูลการแจ้งซ่อม</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        <?php } ?>
        <?php
			if($_SESSION['level_id'] == '01' || $_SESSION['level_id'] == '02' || $_SESSION['level_id'] == '04'){
	    ?>
        <li>
          <a href="work_repair.php">
            <i class="fa fa-bell"></i> <span>งานซ่อมที่ได้รับมอบหมาย</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        <?php } ?>
        <?php
			if($_SESSION['level_id'] == '01'){
	    ?>
        <li>
          <a href="list_position.php">
            <i class="fa fa-cog"></i> <span>จัดการข้อมูลตำแหน่ง</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        
        <li>
          <a href="list_department.php">
            <i class="fa fa-cog"></i> <span>จัดการข้อมูลแผนก</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        
        <li>
          <a href="list_equipment.php">
            <i class="fa fa-cog"></i> <span>จัดการข้อมูลอุปกรณ์</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        
        <li>
          <a href="list_building.php">
            <i class="fa fa-cog"></i> <span>จัดการข้อมูลอาคาร / ตึก</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        
        <?php } ?>
        
        <?php
			if($_SESSION['level_id'] == '01' || $_SESSION['level_id'] == '02'){
	    ?>

        <li>
          <a href="export_report.php">
            <i class="fa fa-file-excel-o"></i> <span>Export รายงาน</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        <?php } ?>
        
        <?php
			if($_SESSION['level_id'] == '03'){
	    ?>
        <li>
          <a href="add_repair.php">
            <i class="fa fa-plus"></i> <span>แจ้งซ่อม</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
         <li>
          <a href="repair.php">
            <i class="fa fa-bell"></i> <span>รายการแจ้งซ่อม</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        </li>
        <?php } ?>

      </ul>
    </section>
    <!-- /.sidebar -->
    
  </aside>
   