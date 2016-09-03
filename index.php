<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Board Capture</title>
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <style>
  body{
  	 font-family: 'Comfortaa', cursive;	
  }

  </style>
          
</head>
<body>

<!-- ......................nav bar starts..................... -->
<nav>
    <div class="nav-wrapper" style="background-color:teal;">
      <a href="#!" class="brand-logo">&nbsp;&nbsp;&nbsp;Board Capture</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a id="stu_register">Students Register</a></li>
        
        <li><a id="stu_login" >Students Login</a></li>
        <li><a id="ins_login" >Institute Login</a></li>
        <li><a id="adm_login" >Admin Login</a></li>
        
      </ul>
     <!--  <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul> -->
    </div>
  </nav>
<!-- ..........................................nav bar ends................... -->


<?php 
        isset($_GET['mnbvcxz'])?$m=$_GET['mnbvcxz']:$m='';
        
        if(!empty($m))
        {
          $message = "";
          
          if($m==1)
          {
            $message = "Enter Correct Details!!";
            ?>
            <br>
            <div class="row center">
		 	<button  id="message" class="btn-large waves-effect waves-light red lighten-1" "><?php echo $message;?></button>
		 	</div>
		<?php  }

          if($m==2)
          {
            $message = "Invalid Email Or Password!!";
            ?>
            <br>
            <div class="row center">
		 	<button  id="message" class="btn-large waves-effect waves-light red lighten-1" "><?php echo $message;?></button>
		 	</div>
		<?php  }

     if($m==3)
          {
            $message = "ID is not valid!!";
            ?>
            <br>
            <div class="row center">
      <button  id="message" class="btn-large waves-effect waves-light red lighten-1" "><?php echo $message;?></button>
      </div>
    <?php  }
    if($m==4)
          {
            $message = "Please Login";
            ?>
            <br>
            <div class="row center">
      <button  id="message" class="btn-large waves-effect waves-light red lighten-1" "><?php echo $message;?></button>
      </div>
    <?php  }
    if($m==5)
          {
            $message = "Something Went Wrong";
            ?>
            <br>
            <div class="row center">
      <button  id="message" class="btn-large waves-effect waves-light red lighten-1" "><?php echo $message;?></button>
      </div>
    <?php  }


		}
            ?>
<div>

<!-- .................................student Register form.......... -->

<div class="container" id="students_register">
<div class="row">
 <h3 class="center" style="color:teal;">Student's Register Form</h3> <br><br>
<div class="col s3"></div>
   
    <form method="post" action="api.php?action=students_sign_up" class="col s6" style="border-style: solid;border-color:teal;border-radius:25px;">
      <br>
        <div class="input-field col s12">
          <select name="college_name" required>
                    	<option value="" disabled selected>Choose College</option>
                   		<?php $query = "SELECT * FROM `map_device_detail`;";
                          $res = mysqli_query($connect, $query);
                          if (mysqli_num_rows($res) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($res)) { ?>
                             <option ><?php echo $row['college_name']; ?>  </option>
                          <?php }
                          }  ?>
                    
                  	   </select>
        </div>
      
        <div class="input-field col s6	">
          <input id="name" type="text" name="name" class="validate">
          <label for="name">Name</label>
        </div>
        <div class="input-field col s6	">
          <input id="email" type="email" name="email" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s6">
          <input id="password" type="password" name="password" class="validate">
          <label for="password">Password</label>
        </div>
        <div class="input-field col s6	">
          <input id="mobile" type="text" name="mobile" class="validate">
          <label for="mobile">Mobile</label>
        </div>
<div class="center">
     <button class="waves-effect waves-light btn-large">Sign Up	</button>
</div><br>
<!-- <a href="forgot_password.php"><h6 class="center" style="color:teal;">Forgot Password ?</h6></a> -->

    </form>
    <div class="col s3"></div>
  </div>
</div>


<!-- ................................end/............... -->



<!-- .................................student login form.......... -->

<div class="container" id="students_login">
<div class="row">
 <h3 class="center" style="color:teal;">Student's Login Form</h3> <br><br>
<div class="col s3"></div>
   
    <form class="col s6" action="api.php?action=student_login" method="post" style="border-style: solid;border-color:teal;border-radius:25px;">
      <br><br>
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate" required>
          <label for="email" data-error="wrong" data-success="right">Email</label>
        </div>
      
        <div class="input-field col s12	">
          <input id="password" type="password" name="password" class="validate" required>
          <label for="password">Password</label>
        </div>
<div class="center">
     <button class="waves-effect waves-light btn-large">LOGIN</button>
     &nbsp;<a href="forgot_password.php"><span class="center" style="color:teal;">Forgot Password ?</span></a>
</div><br>

<br><br>
    </form>
    <div class="col s3"></div>
  </div>
</div>


<!-- ................................end/............... -->


<!-- .................................institute login form.......... -->

<div class="container" id="institute_login">
<div class="row">
 <h3 class="center" style="color:teal;">Institute Login Form</h3> <br><br>
<div class="col s3"></div>
   
    <form method="post" action="api.php?action=institute_login" class="col s6" style="border-style: solid;border-color:teal;border-radius:25px;">
      <br><br>
        <div class="input-field col s12">
          <select name="college_name" required>
      <option value="" disabled selected>Choose your College</option>
      <?php 
                              $query = "SELECT * FROM `map_device_detail`;";
                              $res = mysqli_query($connect, $query);
                              if (mysqli_num_rows($res) > 0) {
                              // output data of each row
                              
                              while($row = mysqli_fetch_assoc($res)) { 

                               echo "<option>".$row['college_name']."</option>";
                            
                              }
                              
                            }
                              ?>
    </select>
        </div>
      
        <div class="input-field col s12	">
          <input id="institute_id" type="text" name="institute_id" class="validate" required>
          <label for="institute_id">Login Id</label>
        </div>
<div class="center">
     <button class="waves-effect waves-light btn-large">LOGIN</button>
</div><br>
<!-- <a href="forgot_password.php"><h6 class="center" style="color:teal;">Forgot Password ?</h6></a> -->
<br><br>
    </form>
    <div class="col s3"></div>
  </div>
</div>


<!-- ................................end/............... -->



<!-- .................................admin login form.......... -->

<div class="container" id="admin_login">
<div class="row">
 <h3 class="center" style="color:teal;">Admin Login Form</h3> <br><br>
<div class="col s3"></div>
   
    <form class="col s6" method="post" action="api.php?action=admin_login" style="border-style: solid;border-color:teal;border-radius:25px;">
      <br><br>
        <div class="input-field col s12">
        	 <input id="username" type="text" name="username" class="validate" required>
          <label for="username">Username</label>
        </div>
      
        <div class="input-field col s12	">
          <input id="password" type="text" name="password" class="validate" required>
          <label for="password">Password</label>
        </div>
<div class="center">
     <button class="waves-effect waves-light btn-large">LOGIN</button>
</div><br>
<!-- <a href="forgot_password.php"><h6 class="center" style="color:teal;">Forgot Password ?</h6></a> -->
<br><br>
    </form>
    <div class="col s3"></div>
  </div>
</div>
<br><br>
</div>
<!-- ................................end/............... -->
<br><br>
<!-- ..............................foooter starts........................ -->
<footer class="page-footer" style="background-color:teal;">
          <div class="container">
            
          </div>

 <div class="footer-copyright">
            <div class="container">
            © 2016 Board Capture
            <a class=" grey-text text-lighten-4 right brown-text text-lighten-3" href="http://materializecss.com"> Made by &#10084; WebAndrioz</a>
            
            </div>
          </div>
        </footer>


        <!-- ........................................foooter ends.................... -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#message").delay(2000).fadeOut();
	$(".button-collapse").sideNav();
	 $('select').material_select();
	 $('#admin_login').hide();
	 $('#institute_login').hide();
	 $('#students_register').hide();
$('#stu_login').on('click',function(){
	$('#students_login').show();
	$('#admin_login').hide();
	 $('#institute_login').hide();
	  $('#students_register').hide();
});
$('#ins_login').on('click',function(){
	$('#students_login').hide();
	$('#admin_login').hide();
	 $('#institute_login').show();
	  $('#students_register').hide();
});

$('#adm_login').on('click',function(){
	$('#students_login').hide();
	$('#admin_login').show();
	 $('#institute_login').hide();
	  $('#students_register').hide();
});
$('#stu_register').on('click',function(){
	$('#students_login').hide();
	$('#admin_login').hide();
	 $('#institute_login').hide();
	  $('#students_register').show();
});
});
	
</script>
</body>
</html>