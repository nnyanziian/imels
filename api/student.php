<?php
header('Content-type:application/json');

//get all students
	function getAllStudents(){
		$conn=connect_db();
		$sql = "SELECT * FROM students";
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
					'message' => 'There are no students at the moment'
				));
				exit();
			}
		}
	}
	
	
	function getStudentById($id=''){
		$conn=connect_db();
		$sql = "SELECT * FROM students WHERE id = $id";
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
					'message' => 'There are no students at the moment'
				));
				exit();
			}
		}
	}


		function getStudentNotAssignedToAcademic(){
		$conn=connect_db();
		$sql = "SELECT * FROM students WHERE assign_a ='0'";
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
					'message' => 'There are no unassigned students at the moment'
				));
				exit();
			}
		}
	}


			function getStudentNotAssignedToField(){
		$conn=connect_db();
		$sql = "SELECT * FROM students WHERE assign_f ='0'";
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
					'message' => 'There are no unassigned students at the moment'
				));
				exit();
			}
		}
	}


function studentAssignBySupervisor($id=''){
		$conn=connect_db();
		$sql = "SELECT s.name, s.student_no, s.id FROM students s INNER JOIN ";
		$sql .="supervisor_student_assignmnet a ON a.supervisor_id=$id AND s.id=a.student_id ";
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
					'message' => 'There are no assigned students at the moment'
				));
				exit();
			}
		}
	}

	function registerStudent(){
		$conn=connect_db();

		if(
			isset($_POST['name']) && !empty($_POST['name']) &&
			isset($_POST['student_no']) &&  !empty($_POST['student_no']) &&
			isset($_POST['reg_no']) && !empty($_POST['reg_no']) &&
			//isset($_POST['photo']) && !empty($_POST['photo']) &&
			isset($_POST['program']) && !empty($_POST['program']) &&
			isset($_POST['field_attachment']) && !empty($_POST['field_attachment']) &&
			isset($_POST['tel']) && !empty($_POST['tel']) &&
			isset($_POST['email']) && !empty($_POST['email']) &&
			isset($_POST['password']) && !empty($_POST['password'])
		){
			$name=mysqli_real_escape_string($conn,$_POST['name']);
			$student_no=mysqli_real_escape_string($conn,$_POST['student_no']);
			$reg_no=mysqli_real_escape_string($conn,$_POST['reg_no']);
			//$photo=mysqli_real_escape_string($conn,$_POST['photo']);
			$program=mysqli_real_escape_string($conn,$_POST['program']);
			$field_attachment=mysqli_real_escape_string($conn,$_POST['field_attachment']);
			$tel=mysqli_real_escape_string($conn,$_POST['tel']);
			$email=mysqli_real_escape_string($conn,$_POST['email']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);

			$rehashed=password_hash($password, PASSWORD_DEFAULT);

			$sql = "INSERT INTO students ";
			$sql .= "(name, student_no, reg_no, photo, program, field_attachment, tel, email, ";
			$sql .= "password, status, day_completion, assign_a, assign_f) VALUES ('$name', '$student_no', '$reg_no', ";
			$sql .= "'default.jpg', '$program', '$field_attachment', '$tel', '$email', ";
			$sql .= "'$rehashed', '1', '0', '0', '0')";

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
					'message' => 'Student Registered'
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




	function updateStudentDetails($id=""){
		$conn=connect_db();

		if(
			isset($_POST['name']) && !empty($_POST['name']) &&
			isset($_POST['student_no']) &&  !empty($_POST['student_no']) &&
			isset($_POST['reg_no']) && !empty($_POST['reg_no']) &&
			//isset($_POST['photo']) && !empty($_POST['photo']) &&
			isset($_POST['program']) && !empty($_POST['program']) &&
			isset($_POST['field_attachment']) && !empty($_POST['field_attachment']) &&
			isset($_POST['tel']) && !empty($_POST['tel']) &&
			isset($_POST['email']) && !empty($_POST['email'])
		){
			$name=mysqli_real_escape_string($conn,$_POST['name']);
			$student_no=mysqli_real_escape_string($conn,$_POST['student_no']);
			$reg_no=mysqli_real_escape_string($conn,$_POST['reg_no']);
			//$photo=mysqli_real_escape_string($conn,$_POST['photo']);
			$program=mysqli_real_escape_string($conn,$_POST['program']);
			$field_attachment=mysqli_real_escape_string($conn,$_POST['field_attachment']);
			$status=mysqli_real_escape_string($conn,$_POST['status']);
			$tel=mysqli_real_escape_string($conn,$_POST['tel']);
			$email=mysqli_real_escape_string($conn,$_POST['email']);
		
			$sql = "UPDATE students SET ";
			$sql .="name='$name', student_no='$student_no', reg_no='$reg_no', ";
			$sql .="program='$program', field_attachment='$field_attachment', tel='$tel', email='$email' WHERE id='$id'";
			

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
					'message' => 'Student Details Updated'
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


function deleteStudent($id=''){
		$conn=connect_db();
		$sql = "DELETE FROM students WHERE students.id = $id";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			
			echo json_encode(array(
				'status' => 'error',
				'message' => mysqli_error($conn)
			));
			exit();
		}
		else{
		
				echo json_encode(array(
					'status' => 'success',
					'message' => 'Student Deleted From the System'
				));
				exit();
			
		}
	}



	function studentAssignAllSupervisor(){
		$conn=connect_db();
		$sql = "SELECT a.id, s.name, s.id, ss.fullname, ss.id, ss.type FROM students as s INNER JOIN supervisor_student_assignmnet as a  ON s.id=a.student_id LEFT JOIN supervisors as ss ON ss.id= a.supervisor_id";

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
					'data' => $result->fetch_all(MYSQLI_BOTH)
					//mysql_fetch_array()
				));
				exit();
			} else if ($result->num_rows <= 0) {
				
				echo json_encode(array(
					'status' => 'failed',
					'message' => 'There are no assigned students at the moment'
				));
				exit();
			}
		}

	}
	

?>