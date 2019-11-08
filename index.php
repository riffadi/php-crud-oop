<?php 
require_once('database.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application in OOP PHP - Create</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CRUD OOP PHP</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="view.php">View</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>





<div class="container">
	<div class="row">
		<div style="text-align: center;">
			<?php 
				if(isset($_POST) & !empty($_POST)){
					$first_name = $database->sanitize($_POST['first_name']);
					$last_name = $database->sanitize($_POST['last_name']);
					$email_id = $database->sanitize($_POST['email_id']);
					$gender = $_POST['gender'];
					$age = $_POST['age'];

					$res = $database->create($first_name, $last_name, $email_id, $gender, $age);
					if($res){
						echo "Successfully inserted data";
					}else{
						echo "failed to insert data";
					}
				}
			?>
		</div>
		<form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">
			<h2>Create Operation in CRUD Application</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">First Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="first_name"  class="form-control" id="input1" placeholder="First Name" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Last Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="last_name"  class="form-control" id="input1" placeholder="Last Name" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">E-Mail</label>
			    <div class="col-sm-10">
			      <input type="email" name="email_id"  class="form-control" id="input1" placeholder="E-Mail" />
			    </div>
			</div>

			<div class="form-group" class="radio">
			<label for="input1" class="col-sm-2 control-label">Gender</label>
			<div class="col-sm-10">
			  <label>
			    <input type="radio" name="gender" id="optionsRadios1" value="male" checked> Male
			  </label>
			  	  <label>
			    <input type="radio" name="gender" id="optionsRadios1" value="female"> Female
			  </label>
			</div>
			</div>

			<div class="form-group">
			<label for="input1" class="col-sm-2 control-label">Age</label>
			<div class="col-sm-10">
				<select name="age" class="form-control">
					<option>Select Your Age</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
				</select>
			</div>
			</div>
			<button type="submit" class="btn btn-primary col-md-2 col-md-offset-10">Create</button>
			<!-- <input action="" type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" /> -->

		</form>
	</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/esm/popper-utils.min.js"></script>
</body>
</html>