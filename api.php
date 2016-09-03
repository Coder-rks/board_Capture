<?php 
include 'config.php';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if(!empty($action)){
	switch($action) {


		//API for login
		case 'admin_login' : 
			session_start();
			$username = isset($_REQUEST['username']) ? $_REQUEST['username'] :'';
			$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
			if(!empty($username) && !empty($password)){
				$query = "SELECT * FROM `login` WHERE `username` = '".$username."' AND `password` = '".$password."';";
				$res = mysqli_query($connect, $query);
				$data = mysqli_fetch_assoc($res);
				if (mysqli_num_rows($res) > 0) {
					$_SESSION['user_id'] = $data['id'];
					header("location:add_new_device.php");
				}else{
					header("location:index.php?mnbvcxz=1");
				}
			}
			break;

		case 'map_device_detail':
			$college_name = isset($_REQUEST['college_name']) ? $_REQUEST['college_name']:'';
			$login_id = isset($_REQUEST['login_id']) ? $_REQUEST['login_id'] : '';	
			if(!empty($college_name) & !empty($login_id)){
				$query = "SELECT * FROM `map_device_detail` WHERE `login_id` = '".$login_id."';";
				$res = mysqli_query($connect, $query);
				$data = mysqli_fetch_assoc($res);
				if($data['login_id'] == $login_id ){
						header("location:add_new_device.php?m=3");
				} else {
				$query = "INSERT INTO `map_device_detail` VALUES('NULL','".$college_name."','".$login_id."');";
				if ($connect->query($query) === TRUE) {
				   		header("location:add_new_device.php?m=1");
				}
			  }
			} else {
				echo "empty";
			}
			break;

			case 'map_address_detail':
			$college_name = isset($_REQUEST['college_name']) ? $_REQUEST['college_name']:'';
			$mac_address = isset($_REQUEST['mac_address']) ? $_REQUEST['mac_address'] : '';
			$room_no = isset($_REQUEST['room_no']) ? $_REQUEST['room_no'] : '';
				
			if(!empty($college_name) & !empty($mac_address) & !empty($room_no)){
				$query = "INSERT INTO `rooms` VALUES('NULL','".$college_name."','".$mac_address."','".$room_no."');";
				if ($connect->query($query) === TRUE) {
				   		header("location:add_new_device.php?m=2");
				} 
				else{
					echo "page not found";
				}
			}
			break;

		case 'delete_login_id':
			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;
			if(!empty($id)){
				$query = "DELETE FROM `map_device_detail` WHERE `id` = '".$id."';";
				if($connect->query($query)===TRUE){
					header("location:add_new_device.php");
				}else{

				}
			}	
			break;

		case 'institute_login' : 
		session_start();
				$college_name = isset($_REQUEST['college_name']) ? $_REQUEST['college_name'] : '' ;
				$institute_id = isset($_REQUEST['institute_id']) ? $_REQUEST['institute_id'] : '' ;
				

				if(!empty($college_name) && !empty($institute_id)){
					$query = "SELECT * FROM `map_device_Detail`;";
					$res = mysqli_query($connect, $query);
                              if (mysqli_num_rows($res) > 0) {       
                              while($row = mysqli_fetch_assoc($res)) {
                              	
                              	if($row['college_name'] == $college_name && $row['login_id']==$institute_id){
                              		$_SESSION['college_name'] = $college_name;
                              		// echo $_SESSION['college_name'];

                              		header("location:create_slots.php");
                              		exit();
                              	}else{
                              		header("location:index.php?mnbvcxz=3");
                              	}
                              }
                            }else{
                            	echo "no rows found";
                            } 
				}else{
					header("location:index.php?mnbvcxz=1");
				}

				break;

		case 'insert_group' :
				session_start();
					$college_name = isset($_REQUEST['college_name']) ? $_REQUEST['college_name'] : '' ;
					$group_name = isset($_REQUEST['group_name']) ? $_REQUEST['group_name'] : '' ;
						if(!empty($college_name) && !empty($group_name)){
							$query = "INSERT INTO `groups` VALUES ('NULL','".$college_name."','".$group_name."');";
							if ($connect->query($query) === TRUE) {
				 			  header("location:create_slots.php?m=1");
							}else{
								echo "not inserted";
							} 

						}else{
							echo "values are empty";
						}
		break;

		case 'delete_group_id':
			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;
			if(!empty($id)){
				$query = "DELETE FROM `groups` WHERE `id` = '".$id."';";
				if($connect->query($query)===TRUE){
					header("location:create_slots.php");
				}else{

				}
			}	
			break;
			case 'delete_map_id':
			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;
			if(!empty($id)){
				$query = "DELETE FROM `map_device_detail` WHERE `id` = '".$id."';";
				if($connect->query($query)===TRUE){
					header("location:add_new_device.php");
				}else{

				}
			}	
			break;
			case 'delete_map_device':
			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;
			if(!empty($id)){
				$query = "DELETE FROM `rooms` WHERE `id` = '".$id."';";
				if($connect->query($query)===TRUE){
					header("location:add_new_device.php");
				}else{

				}
			}	
			break;

		case 'add_time_slot':
			$college_name = isset($_REQUEST['college_name']) ? $_REQUEST['college_name'] : '';
			$starting_date = isset($_REQUEST['starting_date']) ? $_REQUEST['starting_date'] : '';	
			$ending_date = isset($_REQUEST['ending_date']) ? $_REQUEST['ending_date'] : '';
			$group_name = isset($_REQUEST['group_name']) ? $_REQUEST['group_name'] : '';
				
		
			if(!empty($college_name) && !empty($starting_date) && !empty($ending_date)){
				$query = "INSERT INTO `time_slots`VALUES('NULL','".$college_name."','".$group_name."','".$starting_date."','".$ending_date."');";
				if($connect->query($query)===TRUE){
					echo "success";
				}else{
					echo "not inserted";
				}
			}else{
				echo "values not found";
			}
			break;

		case 'students_sign_up' :

			$college_name = isset($_REQUEST['college_name']) ? $_REQUEST['college_name'] : '';
			$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
			$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
			$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
			$mobile = isset($_REQUEST['mobile']) ? $_REQUEST['mobile'] : '';
			if(!empty($name) && !empty($college_name) && !empty($email) && !empty($password) && !empty($mobile)){
				$query = "INSERT INTO `student_sign_up` VALUES('NULL','".$college_name."','".$email."','".$password."','".$mobile."','".$name."');";
				if($connect->query($query)===TRUE){
					header("location:index.php?mnbvcxz=4");
				}else{
					header("location:index.php?mnbvcxz=5");
				}
			}else{
				header("location:index.php?mnbvcxz=1");
			}
			break;


		case 'student_login':
			session_start();
			$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
			$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
			if(!empty($email) && !empty($password)){
				$query = "SELECT * FROM `student_sign_up` WHERE `email_id` = '".$email."' AND `password` = '".$password."';";
				$res = mysqli_query($connect, $query);
				$data = mysqli_fetch_assoc($res);
				if (mysqli_num_rows($res) > 0) {
					$_SESSION['student_user_id'] = $data['id'];
					$_SESSION['institute_name'] = $data['institute_name'];
					header("location:download.php");
				}else{
					header("location:index.php?mnbvcxz=2");
				}

			}else{
				header("location:index.php?mnbvcxz=1");
			}

			break;


			case 'download_file' :
				session_start();	
				 $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
				 $group_name = isset($_REQUEST['group_name']) ? $_REQUEST['group_name'] : '';
				 $room_no = isset($_REQUEST['room_no']) ? $_REQUEST['room_no'] : '';
				 $time = isset($_REQUEST['time']) ? $_REQUEST['time'] : '';

				 

				 $query = "SELECT `mac_address` FROM `rooms` WHERE `room_no` = '".$room_no."';";
				  	$res = mysqli_query($connect, $query);
					$data = mysqli_fetch_assoc($res);
					//echo $data['mac_address'];
					
				$query1 = "SELECT `file_name` FROM `download_file` WHERE `date` = '".$date."' AND `time_slot` = '".$time."' AND `mac_address` = '".$data['mac_address']."';";
					$res1 = mysqli_query($connect, $query1);
					$data1 = mysqli_fetch_assoc($res1);
				
				$_SESSION['file_name'] = $data1['file_name'];
					echo $_SESSION['file_name'];

				//echo "success";

				exit();	
				break;

				case 'fetch_time_slots' : 
						$group_name = isset($_REQUEST['group_name']) ? $_REQUEST['group_name'] :'';
						$result = "<option value='' disabled selected>Choose time</option>";

						if(!empty($group_name)){
							$query = "SELECT * FROM `time_slots` WHERE `groups` = '".$group_name."';";
							$res = mysqli_query($connect, $query);
                              if (mysqli_num_rows($res) > 0) {       
                              while($row = mysqli_fetch_assoc($res)) {
                              		$result .= "<option>".$row['starting_time']."-".$row['ending_time']."</option>";
                              }
                              echo  $result;
                          }


						} 
						
                         exit();
                          break;

                    case 'rooms_with_group' :
                    	$college_name = isset($_REQUEST['college_name']) ? $_REQUEST['college_name'] : '';
                    	$group = isset($_REQUEST['group']) ? $_REQUEST['group'] : '';    
                    	$room_no = isset($_REQUEST['room_no']) ? $_REQUEST['room_no'] : '';  	
                    	if(!empty($college_name) & !empty($group) & !empty($room_no)){
							$query = "INSERT INTO `rooms_with_group` VALUES('NULL','".$college_name."','".$group."','".$room_no."');";
							if($connect->query($query)===TRUE){
							echo "success";
							}


						} 
}
}

 ?>

