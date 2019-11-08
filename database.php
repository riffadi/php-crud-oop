<?php 
/**
 * Create database class and instantiate the database object.
 */
class Database
{
	private $connection;

	public function connect_db()
	{
		$this->connection = mysqli_connect('localhost', 'root', '', 'crud_oop');
		if (mysqli_connect_error())
		{
			die("Dtabase Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
		}
	}
	
	public function __construct()
	{
		$this->connect_db();
	}

	public function sanitize($var)
	{
		$return = mysqli_real_escape_string($this->connection, $var);
		return $return;
	}

	public function create($first_name,$last_name,$email_id,$gender,$age){
		$sql = "INSERT INTO `crud` (first_name, last_name, email_id, gender, age) VALUES ('$first_name', '$last_name', '$email_id', '$gender', '$age')";
		$res = mysqli_query($this->connection, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}

	}

	public function read($id=null){
		$sql = "SELECT * FROM `crud`";
		if($id){$sql .=" WHERE id=$id";};
		$res = mysqli_query($this->connection, $sql);
		return $res;
	}

	

	public function update($first_name,$last_name,$email_id,$gender,$age, $id){
		$sql = "UPDATE `crud` SET first_name='$first_name', last_name='$last_name', email_id='$email_id', gender='$gender', age='$age' WHERE id=$id";
		
		$res = mysqli_query($this->connection, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		$sql = "DELETE FROM `crud` WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}
}

$database = new Database();
$database->connect_db();