<?php
        header('Content-type:application/json');

        //login
        function studentLogin(){   
            $conn=connect_db();
    		if(
                isset($_POST['student_no']) &&  !empty($_POST['student_no']) &&
			    isset($_POST['password']) && !empty($_POST['password'])
           	){
            $student_no=mysqli_real_escape_string($conn,$_POST['student_no']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);
            
            $loginSql="SELECT * FROM students WHERE student_no ='$student_no' LIMIT 1";
	        $result=$conn->query($loginSql);

            if(!$result){
                echo json_encode(array(
                    'status' => 'error',
                    'message' => mysqli_error($conn)
                ));
                exit();
		    }
            else if($result->num_rows===1){

				$student=$result->fetch_array(MYSQLI_ASSOC);

				if(password_verify($password, $student['password'])){
				
				$_SESSION['elms-user_id']=$student['id'];
				$_SESSION['elms-username']=$student['student_no'];
                $_SESSION['elms-type']=1;

				echo json_encode(array(
                    'status' => 'success',
                    'user_id'=>$student['id'],
                    'student_no'=>$student['student_no']
				));
				exit();
			
            }
			else{
				echo json_encode(array(
					'status' => 'failed',
					'message' => 'Password combination does not match the Username'
				));
				exit();
			}
			}
			else{
           
				echo json_encode(array(
					'status' => 'failed',
					'message' => 'Student Number does not exist'
				));
				exit();
			}
    }
    else{
    	echo json_encode(array(
			'status' => 'failed',
			'message' => 'Please provide Username and password'
		));
		exit();
    }

}




//intern codinator

function inLogin(){   
            $conn=connect_db();
    		if(
                isset($_POST['username']) &&  !empty($_POST['username']) &&
			    isset($_POST['password']) && !empty($_POST['password'])
           	){
            $username=mysqli_real_escape_string($conn,$_POST['username']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);
            
            $loginSql="SELECT * FROM internship_codinator WHERE username ='$username' LIMIT 1";
	        $result=$conn->query($loginSql);

            if(!$result){
                echo json_encode(array(
                    'status' => 'error',
                    'message' => mysqli_error($conn)
                ));
                exit();
		    }
            else if($result->num_rows===1){

				$user=$result->fetch_array(MYSQLI_ASSOC);

				if(password_verify($password, $user['password'])){
				
				$_SESSION['elms-user_id']=$user['id'];
				$_SESSION['elms-username']=$user['username'];
                $_SESSION['elms-type']=2;

				echo json_encode(array(
                    'status' => 'success',
                    'user_id'=>$user['id'],
                    'student_no'=>$user['username']
				));
				exit();
			
            }
			else{

				echo json_encode(array(
					'status' => 'failed',
					'message' => 'Password combination does not match the Username: '.$user['username']
				));
				exit();
			}
			}
			else{
           
				echo json_encode(array(
					'status' => 'failed',
					'message' => 'Username does not exist'
				));
				exit();
			}
    }
    else{
    	echo json_encode(array(
			'status' => 'failed',
			'message' => 'Please provide Username and password'
		));
		exit();
    }

}




function suLogin(){   
            $conn=connect_db();
    		if(
                isset($_POST['username']) &&  !empty($_POST['username']) &&
			    isset($_POST['password']) && !empty($_POST['password'])
           	){
            $username=mysqli_real_escape_string($conn,$_POST['username']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);
            
            $loginSql="SELECT * FROM supervisors WHERE username ='$username' LIMIT 1";
	        $result=$conn->query($loginSql);

            if(!$result){
                echo json_encode(array(
                    'status' => 'error',
                    'message' => mysqli_error($conn)
                ));
                exit();
		    }
            else if($result->num_rows===1){

				$user=$result->fetch_array(MYSQLI_ASSOC);

				if(password_verify($password, $user['password'])){
				
				$_SESSION['elms-user_id']=$user['id'];
				$_SESSION['elms-username']=$user['username'];
                $_SESSION['elms-type']=3;

				echo json_encode(array(
                    'status' => 'success',
                    'user_id'=>$user['id'],
                    'student_no'=>$user['username']
				));
				exit();
			
            }
			else{

				echo json_encode(array(
					'status' => 'failed',
					'message' => 'Password combination does not match the Username: '.$user['username']
				));
				exit();
			}
			}
			else{
           
				echo json_encode(array(
					'status' => 'failed',
					'message' => 'Username does not exist'
				));
				exit();
			}
    }
    else{
    	echo json_encode(array(
			'status' => 'failed',
			'message' => 'Please provide Username and password'
		));
		exit();
    }

}




        //logout

function logout($conn){

	$_SESSION=array();
	session_destroy();
	
	echo json_encode(array(
												'status' => 'success',
												'message' => 'Logged out successfully'
								));
				exit();



}



?>