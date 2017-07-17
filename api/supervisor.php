<?php
header('Content-type:application/json');
    //addSupervisor
    function addSupervisor(){
		$conn=connect_db();

		if(
 
           // username
		   //fullname
		   //type
		   //department
		   //tel
		   //email
		   //password
			isset($_POST['username']) &&  !empty($_POST['username']) &&
			isset($_POST['fullname']) && !empty($_POST['fullname']) &&
            isset($_POST['type']) && !empty($_POST['type']) &&
            isset($_POST['department']) && !empty($_POST['department']) &&
            isset($_POST['tel']) && !empty($_POST['tel']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
			isset($_POST['password']) && !empty($_POST['password'])
		){
			$username=mysqli_real_escape_string($conn,$_POST['username']);
			$fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
			$type=mysqli_real_escape_string($conn,$_POST['type']);
            $department=mysqli_real_escape_string($conn,$_POST['department']);
            $tel=mysqli_real_escape_string($conn,$_POST['tel']);
            $email=mysqli_real_escape_string($conn,$_POST['email']);
            $password=mysqli_real_escape_string($conn,$_POST['password']);
            
			$rehashed=password_hash($password, PASSWORD_DEFAULT);

			$sql = "INSERT INTO supervisors ";
			$sql .= "(username, fullname, type, department, tel, email, password, status";
			$sql .= ") VALUES ('$username', '$fullname', '$type', '$department', '$tel', '$email', '$rehashed', '0')";
	

			$result = mysqli_query($conn, $sql);

			if (!$result) {
				echo json_encode(array(
					'status' => 'error',
					'message' => mysqli_error($conn)
				));
				exit();
			} else {
				echo json_encode(array(
					'status' => 'success',
					'message' => 'Supervisor added'
				));
				exit();
			}
		}
		else{
			echo json_encode(array(
				'status' => 'failed',
				'message' => 'Please fill in all the details required (*)'
			));
			exit();
		}

	}


    //get academic/field supervisor
	function getafSupervisor($id=''){
		$conn=connect_db();
		$sql = "SELECT * FROM supervisors WHERE type = $id";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			
			echo json_encode(array(
				'status' => 'error',
				'message' => mysqli_error($conn)
			));
			exit();
		}
		else{
			
			if ($result->num_rows > 0) {
				
				echo json_encode(array(
					'status' => 'success',
					'data' => $result->fetch_all(MYSQLI_ASSOC)
				));
				exit();
			} else if ($result->num_rows <= 0) {
				
				echo json_encode(array(
					'status' => 'failed',
					'message' => 'There are no supervisors at the moment'
				));
				exit();
			}
		}
	}

    //get supervisor by id
	function getSupervisorById($id=''){
		$conn=connect_db();
		$sql = "SELECT * FROM supervisors WHERE id = $id";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			
			echo json_encode(array(
				'status' => 'error',
				'message' => mysqli_error($conn)
			));
			exit();
		}
		else{
			
			if ($result->num_rows > 0) {
				
				echo json_encode(array(
					'status' => 'success',
					'data' => $result->fetch_all(MYSQLI_ASSOC)
				));
				exit();
			} else if ($result->num_rows <= 0) {
				
				echo json_encode(array(
					'status' => 'failed',
					'message' => 'There are no supervisors at the moment'
				));
				exit();
			}
		}
	}


    //update supervisor

        function updateSupervisor($id=''){
		$conn=connect_db();

		if(

			isset($_POST['username']) &&  !empty($_POST['username']) &&
			isset($_POST['fullname']) && !empty($_POST['fullname']) &&
			isset($_POST['department']) && !empty($_POST['department']) &&
            isset($_POST['tel']) && !empty($_POST['tel']) &&
            isset($_POST['email']) && !empty($_POST['email'])
		){
			$username=mysqli_real_escape_string($conn,$_POST['username']);
			$fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
			$department=mysqli_real_escape_string($conn,$_POST['department']);
            $tel=mysqli_real_escape_string($conn,$_POST['tel']);
            $email=mysqli_real_escape_string($conn,$_POST['email']);


    
            $sql=$conn->prepare("UPDATE supervisors SET username=?,fullname=?, department=?, tel=?, email=? WHERE id=?");
            $sql->bind_param("sssssi",$un,$fn,$dep,$te,$em,$id);
            $un=$username;
            $fn=$fullname;
			$dep=$department;
            $te=$tel;
            $em=$email;
            $id=$id;

		


			if (!$sql->execute()) {
				echo json_encode(array(
					'status' => 'error',
					'message' => mysqli_error($conn)
				));
				exit();
			} else {
				echo json_encode(array(
					'status' => 'success',
					'message' => 'Supervisor Updated'
				));
				exit();
			}
		}
		else{
			echo json_encode(array(
				'status' => 'failed',
				'message' => 'Please fill in all the details required (*)'
			));
			exit();
		}

	}



    //remove supervisor
    function deleteSupervisor($id=''){
		$conn=connect_db();

        $sql=$conn->prepare("DELETE FROM supervisors WHERE id=?");
            $sql->bind_param("i",$id);
            $id=$id;

		


			if (!$sql->execute()) {
    			echo json_encode(array(
				'status' => 'error',
				'message' => mysqli_error($conn)
			));
			exit();
		}
		else{
		
				echo json_encode(array(
					'status' => 'success',
					'message' => 'Supervisor Deleted From the System'
				));
				exit();
			
		}
	}


	//update password
	 function updateSupervisorPassword($id=''){
		$conn=connect_db();

		if(			
            isset($_POST['password']) && !empty($_POST['password'])
		){
			$password=mysqli_real_escape_string($conn,$_POST['password']);
			
			$rehashed=password_hash($password, PASSWORD_DEFAULT);

    
            $sql=$conn->prepare("UPDATE supervisors SET password=? WHERE id=?");
            $sql->bind_param("si",$pw,$dd);
            $pw=$rehashed;
			$dd=$id;

		


			if (!$sql->execute()) {
				echo json_encode(array(
					'status' => 'error',
					'message' => mysqli_error($conn)
				));
				exit();
			} else {
				echo json_encode(array(
					'status' => 'success',
					'message' => 'Password Updated'
				));
				exit();
			}
		}
		else{
			echo json_encode(array(
				'status' => 'failed',
				'message' => 'Please provide a valid password'
			));
			exit();
		}

	}

?>