<?php
header('Content-type:application/json');

//register intern codinator
function registerInternshipCodinator(){
		$conn=connect_db();

		if(
			isset($_POST['name']) && !empty($_POST['name']) &&
			isset($_POST['faculty']) &&  !empty($_POST['faculty']) &&
			isset($_POST['username']) && !empty($_POST['username']) &&
			isset($_POST['password']) && !empty($_POST['password']) &&
			isset($_POST['tel']) && !empty($_POST['tel']) &&
			isset($_POST['email']) && !empty($_POST['email'])
		){
			$name=mysqli_real_escape_string($conn,$_POST['name']);
			$faculty=mysqli_real_escape_string($conn,$_POST['faculty']);
			$username=mysqli_real_escape_string($conn,$_POST['username']);
			$tel=mysqli_real_escape_string($conn,$_POST['tel']);
			$email=mysqli_real_escape_string($conn,$_POST['email']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);

			$rehashed=password_hash($password, PASSWORD_DEFAULT);

			$sql = "INSERT INTO internship_codinator ";
			$sql .= "(name, faculty, username, password, tel, email, status ";
			$sql .= ") VALUES ('$name', '$faculty', '$username', ";
			$sql .= "'$rehashed', '$tel', '$email', '1' )";

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
					'message' => 'Codinator Registered'
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


//update ic

function updateInternshipCodinator($id=''){
		$conn=connect_db();

		if(
			isset($_POST['name']) && !empty($_POST['name']) &&
			isset($_POST['faculty']) &&  !empty($_POST['faculty']) &&
			isset($_POST['username']) && !empty($_POST['username']) &&
			isset($_POST['tel']) && !empty($_POST['tel']) &&
			isset($_POST['email']) && !empty($_POST['email'])
		){
			$name=mysqli_real_escape_string($conn,$_POST['name']);
			$faculty=mysqli_real_escape_string($conn,$_POST['faculty']);
			$username=mysqli_real_escape_string($conn,$_POST['username']);
			$tel=mysqli_real_escape_string($conn,$_POST['tel']);
			$email=mysqli_real_escape_string($conn,$_POST['email']);

			$sql = "INSERT INTO internship_codinator ";
			$sql .= "(name, faculty, username, password, tel, email, status ";
			$sql .= ") VALUES ('$name', '$faculty', '$username', ";
			$sql .= "'$rehashed', '$tel', '$email', '1' )";


            $sql = "UPDATE internship_codinator SET ";
			$sql .="name='$name', faculty='$faculty', username='$username', tel='$tel', ";
			$sql .="email='$email' WHERE id='$id'";
			

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
					'message' => 'Codinator Updated'
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

// intern codinator by id
    	function internshipCodinatorById($id=''){
		$conn=connect_db();
		$sql = "SELECT * FROM internship_codinator WHERE id = $id";
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
					'message' => 'There are no internship codinators at the moment'
				));
				exit();
			}
		}
	}

function deleteInternshipCodinator($id=''){
		$conn=connect_db();
		$sql = "DELETE FROM internship_codinator WHERE internship_codinator.id = $id";
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
					'message' => 'Codinator Deleted From the System'
				));
				exit();
			
		}
	}

?>