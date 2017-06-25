<?php
	include("inc/header.php");
?>


<div class="container">
	<div class="row">
		<div class="col-md-7">
			<h2 class="hero-text text-center">
			Welcome to imels your
			Internship Management E-log 
			System </h2>
		</div>

		<div class="col-md-5 loginForm">
			
			<form class="">
			
			<h3 class="text-center">Login</h3>


				<div class="input-group">
					<span class="input-group-addon">Student No</span>
					<input name="username" id="username" type="text" class="username form-control" placeholder="21500892" required>
				</div>
				<br>
                <div class="input-group">
					<span class="input-group-addon">Reg No</span>
					<input name="username" id="username" type="text" class="username form-control" placeholder="14/u/4433/PS" required>
				</div>
				<br>
                <div class="input-group">
					<span class="input-group-addon">Program</span>
					<input name="username" id="username" type="text" class="username form-control" placeholder="BA is Information System" required>
				</div>
				<br>
                <div class="input-group">
					<span class="input-group-addon">Field Placement</span>
					<input name="username" id="username" type="text" class="username form-control" placeholder="Bank of Uganda" required>
				</div>
				<br>
                <div class="input-group">
					<span class="input-group-addon">Tel</span>
					<input name="username" id="username" type="text" class="username form-control" placeholder="2567982457" required>
				</div>
				<br>
                <div class="input-group">
					<span class="input-group-addon">Email</span>
					<input name="username" id="username" type="text" class="username form-control" placeholder="example@mak.com" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon">Password</span>
					<input name="password" id="password" type="password" class="password form-control" placeholder="Password" required>
			    </div>

			<br>
           
				<div class="input-group">
					<span class="input-group-addon">Re - Type Password</span>
					<input name="password" id="password" type="password" class="password form-control" placeholder="Retype Password" required>
			    </div>
			

			<br>
			
			
			<Button type="submit" class="continue btn btn-primary">Register <span class="fa fa-angle-right"></span></Button>
			</form>
			<br>
			
				<p class="text-left page-header">I already have an acount !</p>
			<a href="index.php"class="continue btn btn-default">Login from here <span class="fa fa-edit"></span></a>
			<br>
			<br>
		</div>
	</div>
	<br>


</div>

<?php
	include("inc/footer.php");
?>