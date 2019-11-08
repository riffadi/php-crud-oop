<?php 
require_once('database.php');
$id = $_GET['id'];
$res = $database->read($id);
$r = mysqli_fetch_assoc($res);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application - UPDATE Operation</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
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
					
					$res = $database->update($first_name, $last_name, $email_id, $gender, $age, $id);
					if($res){
					 	echo "Successfully updated data";
					}else{
					 	echo "failed to update data";
					}
				}
			?>
		</div>
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
			<h2>Update Operation in CRUD Application</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">First Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="first_name"  class="form-control" id="input1" value="<?php echo $r['first_name'] ?>" placeholder="First Name" />
			    </div>
			</div>
		 
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Last Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="last_name"  class="form-control" id="input1" value="<?php echo $r['last_name'] ?>" placeholder="Last Name" />
			    </div>
			</div>
		 
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">E-Mail</label>
			    <div class="col-sm-10">
			      <input type="email" name="email_id"  class="form-control" id="input1" value="<?php echo $r['email_id'] ?>" placeholder="E-Mail" />
			    </div>
			</div>
		 
			<div class="form-group" class="radio">
			<label for="input1" class="col-sm-2 control-label">Gender</label>
			<div class="col-sm-10">
			  <label>
			    <input type="radio" name="gender" id="optionsRadios1" value="male" <?php if($r['gender'] == 'male'){ echo "checked";} ?>> Male
			  </label>
			  	  <label>
			    <input type="radio" name="gender" id="optionsRadios1" value="female" <?php if($r['gender'] == 'female'){ echo "checked";} ?>> Female
			  </label>
			</div>
			</div>
		 
			<div class="form-group">
			<label for="input1" class="col-sm-2 control-label">Age</label>
			<div class="col-sm-10">
				<select name="age" class="form-control">
					<option>Select Your Age</option>
					<option value="18" <?php if($r['age'] == '18'){ echo "selected";} ?>>18</option>
					<option value="19" <?php if($r['age'] == '19'){ echo "selected";} ?>>19</option>
					<option value="20" <?php if($r['age'] == '20'){ echo "selected";} ?>>20</option>
					<option value="21" <?php if($r['age'] == '21'){ echo "selected";} ?>>21</option>
					<option value="22" <?php if($r['age'] == '22'){ echo "selected";} ?>>22</option>
					<option value="23" <?php if($r['age'] == '23'){ echo "selected";} ?> >23</option>
					<option value="24" <?php if($r['age'] == '24'){ echo "selected";} ?>>24</option>
					<option value="25" <?php if($r['age'] == '25'){ echo "selected";} ?>>25</option>
				</select>
			</div>
			</div>
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update" />
		</form>
	</div>
</div>
</body>
</html>