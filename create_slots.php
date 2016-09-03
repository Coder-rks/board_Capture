<?php 
session_start();
include 'config.php'; 
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
        <h1 class="header center teal-text text-lighten-2">INSTITUTE MANAGER </h1>
        <div class="row center">
          <h5 class="header col s12 light teal-text text-lighten-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </h5>
        </div>
         <?php 
        isset($_GET['m'])?$m=$_GET['m']:$m='';
        
        if(!empty($m))
        {
          $message = "";
          
          if($m==1)
          {
            $message = "NEW GROUP CREATED!!";
         ?>
         <div class="row center">
         <button  id="message" class="btn-large waves-effect waves-light red lighten-1" "><?php echo $message;?></button>
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


        }
          ?>
        <br><br>
      </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>
<!-- ................................PARALLAX END.............................................. -->

<br><br><br><br>
  <div class="container">
    <div class="row">
    <!-- ..........................BUTTON MAP DEVICE................................. -->
      <div class="col s3">
        <div class="row center">
          <button  id="map_device" class="btn-large waves-effect waves-light teal lighten-1" ">CREATE NEW GROUPS</button>
        </div>    
      </div>
      <!-- ......................END BUTTON MAP DEVICE.......................................... -->

      <!-- .........................BUTTON SHOW DEVOCES................................................. -->
      <div class="col s3">
        <div class="row center">
          <button  id="show_group" class="btn-large waves-effect waves-light teal lighten-1" ">SHOW GROUPS</button>
        </div>
      </div>
       <!--...........................................END SHOW DEVICES.....................................  -->
      
       <!-- ..........................................BUTTON ADMINISTER DEVICES................................... -->
      <div class="col s3">
        <div class="row center">
          <button  id="administer_device" class="btn-large waves-effect waves-light teal lighten-1" ">SHOW TIME SLOTS</button>
        </div>
      </div> 

      <div class="col s3">
        <div class="row center">
          <button  id="administer_rooms" class="btn-large waves-effect waves-light teal lighten-1" ">MAP ROOMS TO GROUP</button>
        </div>
      </div> 
      <!-- .......................................BUTTON ADMINISTER DEVICES........................................ -->


<!-- ......................................ONCLICK MAP DEVICE ->FORM IS GENERATED.............................. -->



      <div id="map_device_detail">
      <br><br><br><br>
        <div class="row">
        <h5 class="center">CREATE NEW GROUP </h5>
          <form id="form22" class="col s12 center" method="post" action="api.php?action=insert_group">
            <div class="row">
            
                <input   name="college_name" type="hidden" value="<?php echo $_SESSION['college_name'];?> ">
                
              
              <div class="input-field col s12">
                <input  id="group_name" name="group_name" type="text" class="validate" required>
                <label for="college_name">Group name</label>
              </div>
              
              <button   class="btn-large waves-effect waves-light teal lighten-1" ">Submit</button>
            </div>
           </form>
        </div>
       </div> 
<!-- ......MODAL AFTER SUBMITTING FORM.......... -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h2 class="row center">THANKS</h2>
      <p class="row center">Device is successfully mapped.You can add another College with an ID</p>
    </div>
    <div class="modal-footer">
      <a class=" modal-action modal-close waves-effect waves-green btn-flat" id="close">Close</a>
    </div>
  </div>
<!-- .........END MODAL......... -->

<div id="edit_modal" class="modal">
    <div class="modal-content">
      <h2 class="row center">ADD TIME SLOT</h2>
      <p class="row center">
         
           
            <div class="new_row_time_slot">

            </div>
           
              
          <!--  </form> -->
        <span id="add_new_slot" class=" btn-large waves-effect waves-light teal lighten-1" >ADD NEW SLOT</span>
          
      </p>
    </div>
    <div class="modal-footer">
      <a class="close modal-action modal-close waves-effect waves-green btn-flat" id="close">Close</a>
    </div>
  </div>

       <!-- ..........................................END OF FORM....................................... -->
          <div id="onclick_show_groups">
         
                      <table class="bordered" > 
                        
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;"">COLLEGE NAME</th>
                        <th style="text-align:center;"">GROUP NAME</th>
                        <th style="text-align:center;"">EDIT/DELETE</th>
                       
                      <?php 
                        $query = "SELECT * FROM `groups`;";
                          $res = mysqli_query($connect, $query);
                          if (mysqli_num_rows($res) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($res)) {
                          ?>
                        <tr>
                        <td style="text-align:center;"><?php echo $row['id'];?></td>
                        <td style="text-align:center;"><?php echo $row['college_name'];?></td>
                        <td style="text-align:center;"><?php echo $row['group_name'];?></td>
                        <td style="text-align:center;"> 
                        <button  class="edit btn-large waves-effect waves-light orange lighten-1" href='id=<?php echo $row['id']."-".$row['group_name'];?>'"  >EDIT</button>
                     

                        <button class="deleteRecord btn-large waves-effect waves-light red lighten-1" href="api.php?action=delete_group_id&id=<?php echo $row['id']; ?>" >DELETE</button> </td>
                        </tr>
                     
                                           <?php  
                    }
                  }

          ?>
           </table>
            
          </div>




<div id="connect_room">
<div class="row center">
   <button  id="map_new_rooms" class=" btn-large waves-effect waves-light red lighten-1" " >MAP NEW ROOMS</button>
</div>
  <table class="bordered" > 
    
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;"">ROOM</th>
                        <th style="text-align:center;"">GROUP</th>
                         <?php 
                        $query = "SELECT * FROM `rooms_with_group`;";
                          $res = mysqli_query($connect, $query);
                          if (mysqli_num_rows($res) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($res)) {
                          ?>
                        <tr>
                        <td style="text-align:center;"><?php echo $row['id'];?></td>
                        <td style="text-align:center;"><?php echo $row['room'];?></td>
                        <td style="text-align:center;"><?php echo $row['group'];?></td>
                        
                        
                        <td style="text-align:center;"> 
                        

                        <button class="deleteRecord btn-large waves-effect waves-light red lighten-1" href="api.php?action=delete_group_id&id=<?php echo $row['id']; ?>" >DELETE</button> </td>
                        </tr>
                     
                                           <?php  
                    }
                  }

          ?>
  </table>

</div>               

                    <div id="administer_device_detail">
                             
                      <table class="bordered" > 
                        
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;"">GROUP NAME</th>
                        <th style="text-align:center;"">STARTING DATE</th>
                        <th style="text-align:center;"">ENDING DATE</th>
                        <th style="text-align:center;"">DELETE</th>
                       
                      <?php 
                        $query = "SELECT * FROM `time_slots`;";
                          $res = mysqli_query($connect, $query);
                          if (mysqli_num_rows($res) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($res)) {
                          ?>
                        <tr>
                        <td style="text-align:center;"><?php echo $row['id'];?></td>
                        <td style="text-align:center;"><?php echo $row['groups'];?></td>
                        <td style="text-align:center;"><?php echo $row['starting_time'];?></td>
                        <td style="text-align:center;"><?php echo $row['ending_time'];?></td>
                        
                        <td style="text-align:center;"> 
                        

                        <button class="deleteRecord btn-large waves-effect waves-light red lighten-1" href="api.php?action=delete_group_id&id=<?php echo $row['id']; ?>" >DELETE</button> </td>
                        </tr>
                     
                                           <?php  
                    }
                  }

          ?>
           </table>
                 
                  </div>
    </div>
  </div>

  <br><br>
<!-- .................................................................................... -->



<div id="rooms_modal" class="modal">
    <div class="modal-content">
      <h2 class="row center">ADD ROOMS TO GROUP</h2>
      <p id="hello" class="row center">
         <div class="row">
           <form id="form_123">
              <div class="col s3">
                 <input type="hidden" value="<?php echo $_SESSION['college_name'];?>" name="college_name">
                    <select name="room_no" required>
                     <option value="" disabled selected>Choose Rooms</option>
                       <?php 
                                      $query = "SELECT * FROM `rooms` WHERE `college_name` = '".$_SESSION['college_name']."';";
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
            <div class="col s1"></div>
              <div class="col s3">
                
                  <select name="group" required>
                     <option value="" disabled selected>Choose Group</option>
                       <?php 
                                      $query = "SELECT * FROM `groups` WHERE `college_name` = '".$_SESSION['college_name']."';";
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
              <div class="col s1"></div>

</form>
<button id= "save_time" class="btn-large waves-effect waves-light orange lighten-1" ">SAVE</button>
<!-- <div id="time_groups">
</div> -->
</div>
           
              
          <!--  </form> -->
        <span id="add_new_rooms_to_group" class=" btn-large waves-effect waves-light teal lighten-1" >ADD NEW ROOMS TO GROUP</span>
          
      </p>
    </div>
    <div class="modal-footer">
      <a class="close_rooms_modal modal-action modal-close waves-effect waves-green btn-flat" id="close">Close</a>
    </div>
  </div>


<!-- .................................................................................... -->

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

    <script type="text/javascript">
    $('select').material_select();
    $(document).ready(function(){
    
    $('#map_device_detail').hide();
    $('#administer_device_detail').hide();
    $('#onclick_show_groups').hide();
    $('#edit_detail').hide();
    $('#connect_room').hide();
    // $('#form123').hide();
    

    $('#map_device').on('click',function(){
      $('#map_device_detail').toggle();
      $('#onclick_show_groups').hide();
      $('#administer_device_detail').hide();
      $('#connect_room').hide();
    });

    $('.edit').on('click',function(e){
      e.preventDefault();
      console.log('hello');
      var id =  $(this).attr('href').slice(3);
      window.group = id.split('-');
      console.log(group[1]);
      console.log(id);
      $('#edit_modal').openModal();  
    });

    $('#map_new_rooms').on('click',function(){
      $('#rooms_modal').openModal();
    });

    // $('#add_new_rooms_to_group').on('click',function(){
    //   console.log('heloo');
    //   $('#time_groups').append($('#hello'));
    //   // $('#time_groups').append($('#form_123').html());

    // });

    $('.close_rooms_modal').click(function(){
      console.log('fucked_up');

       // $('.time_groups').empty();
        window.location.href='create_slots.php';
    });

    $('#add_new_slot').on('click',function(){
      $('.new_row_time_slot').append('<div id="form11"><div class="row"><form  class="center" ><input type="hidden"  name="college_name" value="<?php echo $_SESSION['college_name'];?>"  ><div class="input-field col s4"><input   name="starting_date" type="text" class="validate"><label for="college_name">STARTING TIME</label></div><div class="input-field col s4"><input name="ending_date" type="text" class="validate"><label for="college_name">ENDING TIME</label></div></form><div class="input-field col s4"><button class=" save_time btn-large waves-effect waves-light teal lighten-1" ">SAVE</button></div></div></div>');
   });

    $('.new_row_time_slot').on('click','.save_time',function(){
      //alert('hello');
      console.log('fucked_up_again');
      console.log(window.group[1]);
      $formData = $(this).parent().parent().find('form').serialize();
      //alert($formData);
      console.log($formData + '&group_name=' + window.group[1]);
      $.post("api.php?action=add_time_slot", $formData + '&group_name=' + window.group[1], function(data){  
          console.log(data);
          if(data="success"){
           alert('Time Slots Added Successfully');
          }
          //       alert('hello');
        
      });
    });

    $('#show_group').on('click',function(){
      $('#edit_detail').hide();
      $('#onclick_show_groups').toggle();
      $('#map_device_detail').hide();
      $('#administer_device_detail').hide();
    });

    $('#administer_device').on('click',function(){
      $('#onclick_show_groups').hide();
      $('#map_device_detail').hide();
      $('#administer_device_detail').toggle();
      $('#connect_room').hide();      

    });
    $("#message").delay(2000).fadeOut();
    
    $('.close').click(function(){
      console.log('fucked_up');
      $('.new_row_time_slot').empty();

        window.location.href='create_slots.php';
    });

    $('#administer_rooms').on('click',function(){
      $('#connect_room').toggle();
      $('#onclick_show_groups').hide();
      $('#map_device_detail').hide();
      $('#administer_device_detail').hide();
    });
    
// $("#add_time_slot").submit(function(e) {
//       var formData = $( "form[id^='add_time_slot']" ).serialize();
//       console.log(formData);
//         $.post("api.php?action=add_time_slot", formData, function(data){
//           console.log(data);
//           $('#modal1').openModal();
//       });
//       e.preventDefault();
//    });  



$("#save_time").click(function(e) {
      var formData = $( "form[id^='form_123']" ).serialize();

      console.log(formData);

      $.post("api.php?action=rooms_with_group", formData, function(data){

          console.log(data);
        if(data="success"){
     //      //$(".event_updation_successful_msg").show();         //for showing the updation successful msg on success
     //      document.getElementById('event_updation_successful_msg').innerHTML="Event Successfully Updated";
     alert('Rooms Added To Group Successfuly');
     //   } else {
     //     //console.log("Failure");
       }
     });
     //  e.preventDefault();
    });





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
    
  

    // $("#form22").submit(function(e) {
    //   var formData = $( "form[id^='form22']" ).serialize();
    //     $.post("api.php?action=insert_group", formData, function(data){
    //       console.log(data);
    //       $('#modal1').openModal();
    //   });
    //   e.preventDefault();
    //  });    
   });  



</script>


  </body>
</html>
