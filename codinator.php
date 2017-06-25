<?php
	include("inc/header.php");
?>


<div class="container">
	<div class="row">
    <div class="col-md-4 listOfStudnets">
    <h3 class="page-header">List of Students to Not Assigned</h3>
        <div class="studentsAssigned">
<span class="vAlign">Student Name</span> <input type="checkbox" class="">
        </div>

     <h3 class="page-header">List of Supervisors</h3>
        <div class="studentsAssigned">
            <span class="vAlign">Student Name</span> <input type="checkbox" class="">
    </div>
    <br>
       <button class="btn btn-lg btn-primary">Assign</button>
    </div>

 

    <div class="col-md-8 activityByDate">
         <h3 class="page-header">Student Name Assigned <button class="btn btn-sm btn-primary">Unassign</button> &nbsp; <button class="btn btn-sm btn-primary">Add Supervisor</button></h3>
         
         <p>Already assigned students.</p>
         <h4 class="page-header">Supervisor 1</h4>
         <div class="studentsAssigned">
            <span class="vAlign">Student Name</span> <input type="checkbox" class="">
        </div>
         
        
    </div>


    </div>	



</div>

<?php
	include("inc/footer.php");
?>