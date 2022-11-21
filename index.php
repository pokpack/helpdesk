<?php session_start();
	include('config/connect.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title;?></title>
    <?php include('meta_tag.php');?>
  </head>
  <body>
    
	<div class="container" id="mgC2">
        <div class="row">
        	<div class="col-md-12"><h4 align="center">ระบบแจ้งซ่อมออนไลน์ <br>HelpDesk V.1</h4><p></p></div>
        </div>
    	<div class="row">
            
        	<div class="col-md-4 col-lg-4"></div>
        	<div class="col-md-4 col-lg-4" align="center">
            
                <div class="card" id="bg-card">
                    <div class="card-header" align="center" id="bg-blue">
                      <h5>เข้าสู่ระบบ Login System<br></h5>
                    </div>
        
                    <div class="card-body">
                       <form name="form_login" class="form-conatiner" action="check_login.php" method="post" onSubmit="JavaScript:return check_login();">
        
                        <div class="form-group" style="padding-top: 10px;">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa fa-user-circle"></span></div>
                            </div>
                            <input type="text" name="u_username" class="form-control" placeholder="Username">
                          </div> 
                        </div> <!-- ./form-group --> 
        
                        <div class="form-group" style="padding-top: 10px;">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa fa-key"></span></div>
                            </div>
                            <input type="password" name="u_password" class="form-control" placeholder="Password">
                          </div> 
                        </div> <!-- ./form-group --> 
        
                        <div class="form-group" style="padding-top: 10px;">
                          <button type="submit" name="btn_login" class="btn btn-success btn-block">เข้าสู่ระบบ</button>
                        </div> <!-- ./form-group --> 
                        
                        <div class="form-group" align="right">
                          <a href="register.php"><p>ลงทะเบียน</p></a>
                        </div> <!-- ./form-group --> 
        
                      </form>
                    </div>
                  </div> <!-- ./card -->           	
            </div> <!--./col-->
            <div class="col-md-4 col-lg-4"></div>
        </div> <!--./row-->
    </div> <!--./container-->
    
    <?php include('script_js.php');?>
    <script src="js/script_login.js"></script>
  </body>
</html>