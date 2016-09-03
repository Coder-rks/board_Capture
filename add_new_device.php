<?php   include 'config.php'; 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Board Capture</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/device_page_style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


  <style>
  body{
  font-family: 'Comfortaa', cursive;
  }
  </style>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo">Board Capture</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Logout  </a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="index.php">Logout</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center light-text text-lighten-2">ADMIN MANAGER</h1>
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
        
        <?php 
        isset($_GET['m'])?$m=$_GET['m']:$m='';
        
        if(!empty($m))
        {
          $message = "";
          
          if($m==1)
          {
            $message = "INSTITUTE ID SAVED !!";
         ?>
         <div class="row center">
         <button  id="message" class="btn-large waves-effect waves-light orange lighten-1" "><?php echo $message;?></button>
          </div>
          <?php 
          }
        if($m==2)
          {
            $message = "MAC ADDRESS SAVED !!";
         ?>
         <div class="row center">
         <button  id="message" class="btn-large waves-effect waves-light orange lighten-1" "><?php echo $message;?></button>
          </div>
          <?php 
          }
        
            if($m==3)
          {
            $message = "Choose Another ID !!";
         ?>
         <div class="row center">
         <button  id="message" class="btn-large waves-effect waves-light orange lighten-1" "><?php echo $message;?></button>
          </div>
          <?php 
          }
        

        }
          ?>


         <div class="row center">
          <!-- <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a> -->
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>

<br><br>  
  <div class="container">
    <!-- .................................................................................... -->


    <div class="section">

       <div class="row">
        <div class="col s6">
          <div class="row center">
            <button  id="map_institute_to_id" class="btn-large waves-effect waves-light teal lighten-1" ">MAP INSTITUTE TO INSTITUTE ID</button>
          </div>    
        </div>
      <!-- ......................END BUTTON MAP DEVICE.......................................... -->

      <!-- .........................BUTTON SHOW DEVOCES................................................. -->
      <div class="col s6">
        <div class="row center">
          <button  id="administer_device" class="btn-large waves-effect waves-light teal lighten-1" ">ADMINISTER DEVICE</button>
        </div>
      </div>
       <!--...........................................END SHOW DEVICES.....................................  -->
      
       <!-- ..........................................BUTTON ADMINISTER DEVICES................................... -->
      

   </div>

    </div>
<!-- ................................................................................................... -->

<!-- ....................on click map institute to institue device -->

    <div id="map_institute_detail">
         
                      <table class="bordered" > 
                       <div class="row center">   
                      <button id="add_new" class="btn-large waves-effect waves-light red lighten-1" >MAP NEW ID </button>
                      </div>
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;"">COLLEGE NAME</th>
                        <th style="text-align:center;"">ID</th>
                        <th style="text-align:center;"">DELETE</th>
                       
                      <?php 
                        $query = "SELECT * FROM `map_device_detail`;";
                          $res = mysqli_query($connect, $query);
                          if (mysqli_num_rows($res) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($res)) {
                          ?>
                        <tr>
                        <td style="text-align:center;"><?php echo $row['id'];?></td>
                        <td style="text-align:center;"><?php echo $row['college_name'];?></td>
                        <td style="text-align:center;"><?php echo $row['login_id'];?></td>
                        <td style="text-align:center;"> 
                       

                        <button class="deleteRecord btn-large waves-effect waves-light red lighten-1" href="api.php?action=delete_map_id&id=<?php echo $row['id']; ?>" >DELETE</button> </td>
                        </tr>
                     
                                           <?php  
                    }
                  }

          ?>
           </table>
            
          </div>

<!-- ......................end...................................... -->

      <!--.................................................................  -->
    <div id="add_new_modal" class="modal" style="background-color:teal;">
    <div class="modal-content">
    <h3 class="row center" style="color:white;">MAP INSTITUTE TO INSTITUTE ID</h3>
      <p class="row center">
       <div>  
    

    <form method="post" action="api.php?action=map_device_detail" >
    <div class="row center" >
    <div id="register_id">
      <div class="input-field col s4">
                <input  id="college_name" name="college_name" type="text" class="validate" required>
                <label for="college_name">COLLEGE NAME</label>
      </div>
      
      
            <div class="input-field col s4">
                <input  id="login_id" name="login_id" type="text" class="validate" required>
                <label for="login_id">ID</label>
      </div>
</div>
      <button id="save" class=" btn-large waves-effect waves-light orange lighten-1" >save</button>
      </div>
      </form>


 </div>
      </p>
    </div>
    <div class="modal-footer">
      <a class=" modal-action modal-close waves-effect waves-green btn-flat" id="close">Close</a>
    </div>
  </div>
    
<!-- ................................................END........................ -->

  <!--.................................................................  -->
    <div id="add_new_device_modal" class="modal" style="background-color:teal;">
    <div class="modal-content">
    <h3 class="row center" style="color:white;">ADMINISTER DEVICE</h3>
      <p class="row center">
       <div>  
    

    <form method="post" action="api.php?action=map_address_detail">
    <div class="row center">
      
                 <div class="input-field col s12">
                    <select name="college_name" required>
                     <option value="" disabled selected>Choose College</option>
                       <?php 
                                      $query = "SELECT * FROM `map_device_detail` ;";
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
      
            <div class="input-field col s6">
                <input  id="mac_address" name="mac_address" type="text" class="validate" required="">
                <label for="mac_address">MAC ADDRESS</label>
      </div>
      <div class="input-field col s6">
                <input  id="room_no" name="room_no" type="text" class="validate" required>
                <label for="room_no">ROOM NO.</label>
      </div>

      <button id="save" class=" btn-large waves-effect waves-light orange lighten-1" >save</button>
      </div>
      </form>


 </div>
      </p>
    </div>
    <div class="modal-footer">
      <a class=" modal-action modal-close waves-effect waves-green btn-flat" id="close">Close</a>
    </div>
  </div>
    
<!-- ................................................END........................ -->



<!-- ......................................administer details.......................... -->
  
<div id="administer_device_detail">
         
                      <table class="bordered" > 
                       <div class="row center">   
                      <button id="add_new_device" class="btn-large waves-effect waves-light red lighten-1" >ADD NEW DEVICE </button>
                      </div>
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;"">COLLEGE NAME</th>
                        <th style="text-align:center;"">MAC ADDRESS</th>
                        <th style="text-align:center;"">ROOM</th>
                       <th style="text-align:center;"">DELETE</th>
                      <?php 
                        $query = "SELECT * FROM `rooms`;";
                          $res = mysqli_query($connect, $query);
                          if (mysqli_num_rows($res) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($res)) {
                          ?>
                        <tr>
                        <td style="text-align:center;"><?php echo $row['id'];?></td>
                        <td style="text-align:center;"><?php echo $row['college_name'];?></td>
                        <td style="text-align:center;"><?php echo $row['mac_address'];?></td>
                        <td style="text-align:center;"><?php echo $row['room_no'];?></td>
                        <td style="text-align:center;"> 
                       

                        <button class="deleteRecord btn-large waves-effect waves-light red lighten-1" href="api.php?action=delete_map_device&id=<?php echo $row['id']; ?>"  >DELETE</button> </td>
                        </tr>
                     
                                           <?php  
                    }
                  }

          ?>
           </table>
            
          </div>
<!-- ................................................................... -->

  </div>





  



  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        
           
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by &#10084; <a class="brown-text text-lighten-3" href="http://materializecss.com">WebAndrioz</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
 <script>
 $('select').material_select();
 $('#map_institute_detail').hide();
 $('#administer_device_detail').hide();
     $('document').ready(function(){
        $('#map_institute_to_id').on('click',function(){
          $('#map_institute_detail').toggle();
          $('#administer_device_detail').hide();
      
        });

        $('#administer_device').on('click',function(){
            $('#administer_device_detail').toggle();
            $('#map_institute_detail').hide();
        });

      $('#add_new').on('click',function(){
         $('#add_new_modal').openModal(); 
      });  
        $('#close').on('click',function(){

        });
   $('#add_new_device').on('click',function(){
         $('#add_new_device_modal').openModal(); 
      }); 
      $("#message").delay(2000).fadeOut();

      $('.deleteRecord').click(function(){
        var deleteRecord;
        var val = confirm("Are you sure Want to Delete?");
            if(val==true){
                deleteRecord = 1;
            } else {
                deleteRecord = 0;
            }  
            if(deleteRecord==1){   
                var link = $(this).attr("href");
            window.location = link;
            }
            return false;
        });
    
  
     });
 </script>


  </body>
</html>
