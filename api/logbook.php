<?php
header('Content-type:application/json');

//register intern codinator
function createActivity(){
		$conn=connect_db();

		if(
			
			isset($_POST['activity_details']) && !empty($_POST['activity_details']) &&
			isset($_POST['student_id']) && !empty($_POST['student_id'])
		){
			
			$activity_details=mysqli_real_escape_string($conn,$_POST['activity_details']);
			$student_id=mysqli_real_escape_string($conn,$_POST['student_id']);
			


					

					$sql = "INSERT INTO logbook ";
					$sql .= "(activity_details, student_id, date_created, approved ";
					$sql .= ") VALUES ('$activity_details', '$student_id', ";
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
function deleteActivity($id='', $dateCreated=""){

		$conn=connect_db();

	$toDate=date("Y-m-d");

	if($dateCreated==$toDate){
		//continue to delete
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
	else{
		echo json_encode(array(
				'status' => 'error',
				'message' => 'Cannot Delete an activity from the past '.$toDate."---".$dateCreated
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


// get progress
	   	function loogBookProgress($id=''){
		$conn=connect_db();
		$sql = "SELECT date_created FROM logbook WHERE student_id=$id GROUP BY 	date_created";
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
				$rowCount=mysqli_num_rows($result);
				$pec= $rowCount/40*100;
				
				echo json_encode(array(
					'status' => 'success',
					'percentage' => $pec.'%',
					'data' => $result->fetch_all(MYSQLI_ASSOC)
				));
				exit();
			} else if ($result->num_rows <= 0) {
				
				echo json_encode(array(
					'status' => 'failed',
					'message' => 'There are no activities on the day'
				));
				exit();
			}
		}
	}

//get activity by day
    	function activityByDay($dc='', $st=""){
			
		$conn=connect_db();
		$sql = "SELECT * FROM logbook WHERE date_created ='$dc' AND student_id=$st";
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
					'message' => 'There are no activities on the day '.$sql
				));
				exit();
			}
		}
	}
?>