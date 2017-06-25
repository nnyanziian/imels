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
					<span class="input-group-addon">Login as</span>
					<select class="type form-control">
						<option selected value="1">Student</option>
						<option value="1">Supervisor</option>
						<option value="1">Internship Coordinator</option>
					</select>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input name="username" id="username" type="text" class="username form-control" placeholder="Username / Student No" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon"><span class="fa fa-asterisk"></span></span>
					<input name="password" id="password" type="password" class="password form-control" placeholder="Password" required>
			</div>
			<br>
			

			
			
			
			<Button type="submit" class="continue btn btn-primary">Login <span class="fa fa-angle-right"></span></Button>
			</form>
			<br>
			
				<p class="text-left page-header">I donot have an acount !</p>
			<a href="register.php"class="continue btn btn-default">Register <span class="fa fa-edit"></span></a>
			<br>
			<br>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12 jumbotron lightJumbo">
			<img src="img/tax.png" class="text-center img-responsive" style="margin:0 auto;">
			<br>
			<h3 class="text-center">The platform allows students and supervisors to manage logbooks during intern training</h3>
			
		</div>
	</div>

</div>

<?php
	include("inc/footer.php");
?>