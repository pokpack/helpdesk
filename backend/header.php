  <header class="main-header">
    <!-- Logo 50x50 pixels -->
    <a href="#" class="logo">
      <span class="logo-mini"><b>Help</b></span>
      <span class="logo-lg"><b>HelpDesk V.1</b></span>
    </a>
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
                   
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img-member/14072019286626112.png" class="user-image" alt="User Image">
              <span class="hidden-xs">ยินดีต้อนรับ : <?php echo $record['u_fname'];?> <?php echo $record['u_lname'];?> </span>
              <!--<span class="fa fa-angle-double-down" style="padding-left: 20px;"></span>-->
            </a>

            <!--<ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-right">
                  <a href="edit_profile.php" class="btn btn-flat" style="color: #000">เปลี่ยนแปลงรหัสผ่าน</a>
                </div>
              </li>
            </ul>-->
          </li>
		  <li class="header"><a href="" data-toggle="modal" data-target="#resetPasswordModal<?php echo $record['u_idcard'];?>"><span class="fa fa-lock"></span> เปลี่ยนรหัสผ่าน</a></li>
          <li class="header"><a href="logout.php"><span class="fa fa-power-off"></span> ออกจากระบบ</a></li>

        </ul>

      </div>
    </nav>
  </header>