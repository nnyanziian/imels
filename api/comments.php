<?php
header('Content-type:application/json');
//get a comment by id
	function getCommentById($id=''){
		$conn=connect_db();
		$sql = "SELECT * FROM comments WHERE id = $id";
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
					'message' => 'There are no Comments at the moment'
				));
				exit();
			}
		}
	}


	//get a comment by id
	function getCommentByActivity($id=''){
		$conn=connect_db();
		$sql = "SELECT * FROM comments WHERE activity_id=$id";
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
					'message' => 'There are no Comments at the moment'
				));
				exit();
			}
		}
	}

//test method
    function test(){
        echo "Route passes throug very well";
    }

// create a comment

	function addComment(){
		$conn=connect_db();

		if(
			isset($_POST['comment_details']) && !empty($_POST['comment_details']) &&
			isset($_POST['supervisor_type']) &&  !empty($_POST['supervisor_type']) &&
			isset($_POST['supervisor_id']) && !empty($_POST['supervisor_id']) &&
			isset($_POST['activity_id']) && !empty($_POST['activity_id'])
		){
			$comment_details=mysqli_real_escape_string($conn,$_POST['comment_details']);
			$supervisor_type=mysqli_real_escape_string($conn,$_POST['supervisor_type']);
			$supervisor_id=mysqli_real_escape_string($conn,$_POST['supervisor_id']);
			$activity_id=mysqli_real_escape_string($conn,$_POST['activity_id']);

			
			$sql = "INSERT INTO comments ";
			$sql .= "(comment_details, supervisor_type, supervisor_id, activity_id, date_created) ";
			$sql .= "VALUES ('$comment_details', '$supervisor_type', '$supervisor_id', ";
			$sql .= "'$activity_id', CURRENT_DATE() )";
			

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
					'message' => 'Comment Added Successfuly'
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


//delete comment
function deleteComment($id=''){
		$conn=connect_db();
		$sql = "DELETE FROM comments WHERE comments.id = $id";
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
					'message' => 'Comment Removed From the System'
				));
				exit();
			
		}
	}

?>