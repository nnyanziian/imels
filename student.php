<?php
	include("inc/header.php");
?>


<div class="container">
	<div class="row">
    <div class="col-md-4 listOfStudnets">
    <h3 class="page-header">Select date to fill logbook</h3>
              <a href="#" class="btn btn-sm btn-default">1</a>
        <a href="#" class="btn btn-sm btn-default">2</a>
        <a href="#" class="btn btn-sm btn-default">3</a>
        <a href="#" class="btn btn-sm btn-default">4</a>
        <a href="#" class="btn btn-sm btn-default">5</a>
    </div>

    <div class="col-md-4 activityByDate">
         <h3 class="page-header">Selected date 17th Jully 2017</h3>
         <p>Enter the activities done.</p>
        
        <div class="activtyByDateSelected">
        <form>
            <textarea class="form-control"></textarea>
            <br>
            <button class="btn btn-sm btn-primary">Add Activity</button>
         </form>
         <br>
         <p>Activites go here below in a list.</p>
                  <br>
         <p>Activites go here below in a list.</p>
        </div>
    </div>

    <div class="col-md-4 commmentOnActivity">
          <h3 class="page-header">Your progress</h3>
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