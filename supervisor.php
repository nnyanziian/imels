<?php
session_start();

	if( isset($_SESSION['elms-user_id']) && isset($_SESSION['elms-username']) && isset($_SESSION['elms-type']) && $_SESSION['elms-type']==1){
	//student
	header('Location:student.php');
	}
	else if(isset($_SESSION['elms-user_id']) && isset($_SESSION['elms-username']) && isset($_SESSION['elms-type']) && $_SESSION['elms-type']==2){
	//supervisor
	//header('Location:supervisor.php');
	}
	else if(isset($_SESSION['elms-user_id']) && isset($_SESSION['elms-username']) && isset($_SESSION['elms-type']) && $_SESSION['elms-type']==3){
	//condinaot
	header('Location:codinator.php');
	}
else{
//clear the session and logout
  $_SESSION=array();
  session_destroy();

 header('Location:index.php');
  
}

?>

<?php
	include("inc/header.php");
?>


<div class="container super" su-id="<?php echo $_SESSION['elms-user_id']; ?>" su-type="<?php echo $_SESSION['elms-sutype']; ?>">
	<div class="row">
    <div class="col-md-3 listOfAssignedStudents">
    <h3 class="page-header">List of Students</h3>
        <div class="form-group">
  		<label for="assignedStudents">Students:</label>
  		<select name="assignedStudents" class="form-control assignedStudents" id=""></select>
		</div>

          <h3 class="page-header">Student's progress</h3>
          <div class="progress-circle">
              <span class="progressP">0%</span>
          </div>
          <p class="text-center">Completed</p>
    </div>

    <div class="col-md-6 activityStudent">
         <h3 class="page-header">Student Name: Logbook</h3>
         <p>Select a Date to see the activity of the logbook</p>
         <div class="datesFilled">
            <a href="#" class="btn btn-sm btn-default">1</a>
            <a href="#" class="btn btn-sm btn-default">2</a>
            <a href="#" class="btn btn-sm btn-default">3</a>
            <a href="#" class="btn btn-sm btn-default">4</a>
            <a href="#" class="btn btn-sm btn-default">5</a>
        </div>
        <h4 class="page-header">Day Activities</h4>
        <div class="activtyByDateSelected">
            <div class="activtyList">
               
            </div>
        </div>
    </div>

    <div class="col-md-3 commmentOnActivity">
         <h3 class="page-header">Comment on Activity</h3>
         <p>Comments will appear here</p>
         <form class="addComment" name="addComment">
            <textarea class="form-control comment_details"></textarea>
            <br>
            <button class="btn btn-sm btn-primary">Comment</button>
         </form>
<br>
             <div class="commentList">
                <p class="commentItem"><span class="vAlign">Details go here and here </span> <button href="#" class="pull-right btn btn-sm btn-primary">&times;</button></p>
            </div>

    </div>
    </div>	



</div>

<?php
	include("inc/footer.php");
?>
<script src="js/supervisor.js"></script>