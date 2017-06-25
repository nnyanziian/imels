<?php
	include("inc/header.php");
?>


<div class="container">
	<div class="row">
    <div class="col-md-4 listOfStudnets">
    <h3 class="page-header">List of Students</h3>
        <div class="studentsAssigned">
            <p><span class="vAlign">Student Name</span> <a href="#" class="pull-right btn btn-sm btn-primary">View Logbook</a></p>
        </div>
    </div>

    <div class="col-md-4 activityByDate">
         <h3 class="page-header">Student Name: Logbook</h3>
         <p>Select a Date to see the activity of the logbook</p>
         <div class="dates">
        <a href="#" class="btn btn-sm btn-default">1</a>
        <a href="#" class="btn btn-sm btn-default">2</a>
        <a href="#" class="btn btn-sm btn-default">3</a>
        <a href="#" class="btn btn-sm btn-default">4</a>
        <a href="#" class="btn btn-sm btn-default">5</a>

        </div>
        <h4 class="page-header">Student Name: Logbook</h4>
        <div class="activtyByDateSelected">
            <div class="activty">
                <p><span class="vAlign">Details go here and here</span> <a href="#" class="pull-right btn btn-sm btn-primary">Commnet</a></p>
            </div>
        </div>
    </div>

    <div class="col-md-4 commmentOnActivity">
         <h3 class="page-header">Comment on Activity</h3>
         <p>Comments will appear here</p>
         <form>
            <textarea class="form-control"></textarea>
            <br>
            <button class="btn btn-sm btn-primary">Comment</button>
         </form>

          <h3 class="page-header">Student's progress</h3>
          <div class="progress-circle">
              <span>5%</span>
          </div>
          <p class="text-center">Completed</p>
    </div>
    </div>	



</div>

<?php
	include("inc/footer.php");
?>