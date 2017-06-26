<?php

	require 'vendor/autoload.php';
	require 'config.php';
	//custom libraries
	require 'student.php';
	require 'comments.php';
	require 'intern_codinator.php';
	require 'logbook.php';
	require 'supervisor.php';
	require 'assign.php';
	require 'main.php';

	use \Slim\App;
	$app = new App(["settings" => $config]);
	
		
	//api/students/all *
	$app->get('/students/all', 'getAllStudents');

	//api/student/id *
	$app->get('/student/{id}', function ($request, $response, $args){
		$studentId=(int)$args['id'];
		return getStudentById($studentId);
	});


	//Register Student *
	$app->post('/student/register', 'registerStudent');	

	//update Student Details *
	$app->post('/student/update/{id}', function ($request, $response, $args){
		$studentId=(int)$args['id'];
		return updateStudentDetails($studentId);
	});

	



	//delete Student *
	$app->get('/student/delete/{id}', function ($request, $response, $args){
		$studentId=(int)$args['id'];
		return deleteStudent($studentId);
	});


	//Get Comment By Id *
	$app->get('/comment/{id}', function ($request, $response, $args){
		$commentId=(int)$args['id'];
		return getCommentById($commentId);
	});

	//Get Comment By activity *
	$app->get('/comment/activity/{id}', function ($request, $response, $args){
		$commentId=(int)$args['id'];
		return getCommentByActivity($commentId);
	});

	//Add Student *
	$app->post('/comment/add', 'addComment');	


	//delete comment *
	$app->get('/comment/delete/{id}', function ($request, $response, $args){
		$commentId=(int)$args['id'];
		return deleteComment($commentId);
	});


	//register internship cordinator *
		$app->post('/internc/register', 'registerInternshipCodinator');	

	//internship cordinator by id *
	$app->get('/internc/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return internshipCodinatorById($id);
	});

	//update ic *
	$app->post('/internc/update/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return updateInternshipCodinator($id);
	});


//delete ic deleteInternshipCodinator *
$app->get('/internc/delete/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return deleteInternshipCodinator($id);
	});

	//Add an activity *
		$app->post('/logbook/add', 'createActivity');	

		//activity by id *
	$app->get('/activity/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return activityById($id);
	});

	//delete activity *
$app->get('/activity/delete/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return deleteActivity($id);
	});


//register supervisor *
		$app->post('/supervisor/add', 'addSupervisor');	

//get supervisor by type getafSupervisor *
	$app->get('/supervisor/type/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return getafSupervisor($id);
	});

//get supervisor by id getafSupervisor *
	$app->get('/supervisor/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return getSupervisorById($id);
	});


//update Supervisor *

	$app->post('/supervisor/update/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return updateSupervisor($id);
	});

//delete supervisor *
	$app->get('/supervisor/delete/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return deleteSupervisor($id);
	});

// assign student to supervisor *
		$app->post('/assign/ac', 'assignSupervisorA');	

		// assign student to supervisor *
		$app->post('/assign/f', 'assignSupervisorF');	

//delete supervisorf *
	$app->get('/assignf/delete/{id}/{st}', function ($request, $response, $args){
		$id=(int)$args['id'];
		$st=(int)$args['st'];
		return deleteAssignmentf($id, $st);
	});

//delete supervisora *
	$app->get('/assigna/delete/{id}/{st}', function ($request, $response, $args){
		$id=(int)$args['id'];
		$st=(int)$args['st'];
		return deleteAssignmenta($id, $st);
	});



//student login *
	$app->post('/student/login', 'studentLogin');

	//In login *
	$app->post('/internc/login', 'inLogin');

	//Supervisorlogin *
	$app->post('/supervisor/login', 'suLogin');	


	//Logout all *
	$app->get('/user/logout', 'logout');


	
	//students unasigned by academic *
	$app->get('/student/unassigned/a', 'getStudentNotAssignedToAcademic');

		//students unasigned by field *
	$app->get('/student/unassigned/f', 'getStudentNotAssignedToField');


	//get assigned to supervisor *
	$app->get('/assign/supervisor/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return studentAssignBySupervisor($id);
	});

		//approve activity *
	$app->get('/activity/approve/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return approveActivity($id);
	});


			//activity  by Day *
	$app->get('/activity/{id}/{st}', function ($request, $response, $args){
		$id=(int)$args['id'];
		$st=(int)$args['st'];
		return activityByDay($id, $st);

	
	});


					//prpgress loogBookProgress *
	$app->get('/progress/{id}', function ($request, $response, $args){
		$id=(int)$args['id'];
		return loogBookProgress($id);

	
	});

	$app->run();