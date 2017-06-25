<?php
    header('Content-type:application/json');

    //assign student to field of academic supervisor

     function assignSupervisorA(){
		$conn=connect_db();


		if(

			isset($_POST['student_id']) &&  !empty($_POST['student_id']) &&
			isset($_POST['supervisor_id']) && !empty($_POST['supervisor_id'])
		){
			$student_id=mysqli_real_escape_string($conn,$_POST['student_id']);
			$supervisor_id=mysqli_real_escape_string($conn,$_POST['supervisor_id']);

			//INSERT INTO supervisor_student_assignmnet (student_id, supervisor_id, status, date_created)
			// VALUES ('5', '27', '1', '1995,12,12' ) UNION UPDATE students SET assign_a = '1' 
			//WHERE students.id = 1;


            $sql=$conn->prepare("INSERT INTO supervisor_student_assignmnet (student_id,supervisor_id, date_created, status) VALUES(?,?,NOW(),?)");
            $sql2=$conn->prepare("UPDATE students SET assign_a = '1' WHERE students.id=?");
			
			
			$sql->bind_param("iii",$a,$b,$d);
			$sql2->bind_param("i",$e);
            $a=$student_id;
            $b=$supervisor_id;
            $d='1';
			$e=$student_id;
            

		


			if (!$sql->execute() || !$sql2->execute()) {
				echo json_encode(array(
					'status' => 'error',
					'message' => mysqli_error($conn)
				));
				exit();
			} else {
				echo json_encode(array(
					'status' => 'success',
					'message' => 'Asignment Made'
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



     function assignSupervisorF(){
		$conn=connect_db();


		if(

			isset($_POST['student_id']) &&  !empty($_POST['student_id']) &&
			isset($_POST['supervisor_id']) && !empty($_POST['supervisor_id'])
		){
			$student_id=mysqli_real_escape_string($conn,$_POST['student_id']);
			$supervisor_id=mysqli_real_escape_string($conn,$_POST['supervisor_id']);

			//INSERT INTO supervisor_student_assignmnet (student_id, supervisor_id, status, date_created)
			// VALUES ('5', '27', '1', '1995,12,12' ) UNION UPDATE students SET assign_a = '1' 
			//WHERE students.id = 1;


            $sql=$conn->prepare("INSERT INTO supervisor_student_assignmnet (student_id,supervisor_id, date_created, status) VALUES(?,?,NOW(),?)");
            $sql2=$conn->prepare("UPDATE students SET assign_f = '1' WHERE students.id=?");
			
			
			$sql->bind_param("iii",$a,$b,$d);
			$sql2->bind_param("i",$e);
            $a=$student_id;
            $b=$supervisor_id;
            $d='1';
			$e=$student_id;
            

		


			if (!$sql->execute() || !$sql2->execute()) {
				echo json_encode(array(
					'status' => 'error',
					'message' => mysqli_error($conn)
				));
				exit();
			} else {
				echo json_encode(array(
					'status' => 'success',
					'message' => 'Asignment Made'
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

//delete assignmentf
    function deleteAssignmentf($id='', $student_id=''){
		$conn=connect_db();

        $sql=$conn->prepare("DELETE FROM supervisor_student_assignmnet WHERE id=?");
		$sql2=$conn->prepare("UPDATE students SET assign_f = '0' WHERE students.id=?");
            $sql->bind_param("i",$id);
			$sql2->bind_param("i",$sid);
            $id=$id;
			$sid=$student_id;

			if (!$sql->execute() || !$sql2->execute()) {
    			echo json_encode(array(
				'status' => 'error',
				'message' => mysqli_error($conn)
			));
			exit();
		}
		else{
		
				echo json_encode(array(
					'status' => 'success',
					'message' => 'Assignment Removed From the System'
				));
				exit();
			
		}
	}
//delete assignmenta
    function deleteAssignmenta($id='', $student_id=''){
		$conn=connect_db();

        $sql=$conn->prepare("DELETE FROM supervisor_student_assignmnet WHERE id=?");
		$sql2=$conn->prepare("UPDATE students SET assign_a = '0' WHERE students.id=?");
            $sql->bind_param("i",$id);
			$sql2->bind_param("i",$sid);
            $id=$id;
			$sid=$student_id;

			if (!$sql->execute() || !$sql2->execute()) {
    			echo json_encode(array(
				'status' => 'error',
				'message' => mysqli_error($conn)
			));
			exit();
		}
		else{
		
				echo json_encode(array(
					'status' => 'success',
					'message' => 'Assignment Removed From the System'
				));
				exit();
			
		}
	}


?>