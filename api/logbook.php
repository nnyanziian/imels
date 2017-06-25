<?php
header('Content-type:application/json');

//register intern codinator
function createActivity(){
		$conn=connect_db();

		if(
			isset($_POST['day_no']) &&  !empty($_POST['day_no']) &&
			isset($_POST['activity_details']) && !empty($_POST['activity_details']) &&
			isset($_POST['student_id']) && !empty($_POST['student_id'])
		){
			$day_no=mysqli_real_escape_string($conn,$_POST['day_no']);
			$activity_details=mysqli_real_escape_string($conn,$_POST['activity_details']);
			$student_id=mysqli_real_escape_string($conn,$_POST['student_id']);
			

			$sql = "INSERT INTO logbook ";
			$sql .= "(day_no, activity_details, student_id, date_created, approved ";
			$sql .= ") VALUES ('$day_no', '$activity_details', '$student_id', ";
			$sql .= "CURRENT_DATE(), '0')";

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
					'message' => 'Activity added'
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
// activity by id
    	function activityById($id=''){
		$conn=connect_db();
		$sql = "SELECT * FROM logbook WHERE id = $id";
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
					'message' => 'There are no activities at the moment'
				));
				exit();
			}
		}
	}


//delete activity
function deleteActivity($id=''){
		$conn=connect_db();
		$sql = "DELETE FROM logbook WHERE logbook.id = $id";
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
					'message' => 'Activity Deleted From the System'
				));
				exit();
			
		}
	}

function approveActivity($acId=''){
	$conn=connect_db();
		$sql=$conn->prepare("UPDATE logbook SET approved = '1' WHERE logbook.id=?");
            $sql->bind_param("i",$id);
            $id=$acId;


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
					'message' => 'Activity Aproved'
				));
				exit();
			
		}
}
?>