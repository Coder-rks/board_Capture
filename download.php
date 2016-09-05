<?php 
session_start();
include 'config.php'; 
if(!empty($_SESSION['student_user_id'])){
echo $_SESSION['student_user_id'];
?>

<!-- .................................connectivity with database......................... -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Device</title>



  <!-- CSS  -->
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <link href="css/device_page_style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<style>
  body{
    font-family: 'Comfortaa', cursive;
  }
  </style>

  
</head>
<body>
<!-- ........................................NAV BAR START.................................. -->

  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo">Board Capture</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Logout</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="index.php">Logout</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<!-- .....................................NAV BAR END....................................... -->
  <!-- ................................PARALLAX START............................................. -->
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">DOWNLOAD FILE</h1>
        <div class="row center">
          <h5 class="header col s12 light teal-text text-lighten-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </h5>
        </div>
        <br><br>
      </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>
<!-- ................................PARALLAX END.............................................. -->
<br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col s1"></div>
            <form id="download_form" >
            <div class="col s2">
                <div class="row center">
                  <label>DATE</label>
                    <input type="text" name="date"  class="datepicker">
                </div>    
              </div>
              <div class="col s1"></div>
              <!-- ............................. -->
              <div class="col s2">
                <div class="row center">
                <label>GROUP</label>
                  <select id="group_name" name="group_name">
                    <option value="" disabled selected>Choose Group</option>
                    <?php 
                              $query = "SELECT * FROM `groups` WHERE `college_name` = '".$_SESSION['institute_name']."';";
                              $res = mysqli_query($connect, $query);
                              if (mysqli_num_rows($res) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($res)) {
                               echo "<option>".$row['group_name']."</option>"; 
                              }    
                            }
                              ?>       
            </select>
            </div>    
              </div>

              <!-- .............................. -->
              <div class="col s1"></div>
              <div class="col s2">
                <div class="row center">
                 <label>ROOM</label>
                    <select name="room_no">
                     <option value="" disabled selected>Choose room</option>
                       <?php 
                                      $query = "SELECT * FROM `rooms` WHERE `college_name` = '".$_SESSION['institute_name']."';";
                                      $res = mysqli_query($connect, $query);
                                      if (mysqli_num_rows($res) > 0) {
                                      // output data of each row
                                      
                                      while($row = mysqli_fetch_assoc($res)) { 

                                       echo "<option>".$row['room_no']."</option>";
                                    
                                      }
                                      
                                    }
                                      ?>       
              </select>
                 
                </div>    
              </div>
              <!-- .................................... -->

                 <div class="col s1 "></div>
                <div class="col s2" >
                    <div class="row center">
                      <label>TIME</label>
                          <div >

                          <select name="time" id="hello">
                              <!-- <option value="" disabled selected>Choose time</option> -->

                        
                          </select>
                        </div>
               
                         </div>    
                    </div>

              <!-- .................................... -->
      <div class="row center">
         <button  id="map_device" class="btn-large waves-effect waves-light teal  lighten-1" ">SUBMIT</button>
         </div>
    </form> 


 <div id="open_download_button">
    <div class="row center">
     <a id="files_name" href="" download><button id="download_file_name"  class="btn-large waves-effect waves-light orange lighten-1"></button>
     </a>
     </div>
 </div>




    </div> 
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



    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
    $(document).ready(function() {
  $('select').material_select();
  $('#open_download_button').hide();
  $("#download_form").submit(function(e) {
      var formData = $( "form[id^='download_form']" ).serialize();
        $.post("api.php?action=download_file", formData, function(data){
          console.log(data);
              $('#files_name').attr('href','images/'+ data);
              $('#download_file_name').html(data);
            $('#open_download_button').show();
          
          
      });
      e.preventDefault();
   });    

  $('#group_name').change(function(e){
    
      var value = $('#group_name').val();
      $.post('api.php?action=fetch_time_slots',{group_name : value},function(data){
        console.log(data);
      $('select').material_select();
        $('#hello').html( '<select>' + data + '</select>' );
      });
      e.preventDefault();
    });
    
 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    
    format : 'd-mm-yyyy',

    selectYears: 15 // Creates a dropdown of 15 years to control year
  });


    });


</script>






</body>
</html>
<?php
} else {

  echo "no user exist";
}
?>
