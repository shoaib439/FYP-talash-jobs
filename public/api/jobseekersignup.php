<?php  

require_once 'connecting.php';

if($_SERVER['REQUEST_METHOD']=='POST'){


	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$name=$_POST['name'];
	$display_name=$_POST['display_name'];
	$phoneno=$_POST['phoneno'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$type=$_POST['type'];

	$password=password_hash($password,PASSWORD_DEFAULT);


	$sql = "SELECT * FROM `users` WHERE `email`='$email'";

	$data=[];

	if($result=mysqli_query($conn,$sql)){

		$row = $result->fetch_assoc();

		if(isset($row)):
			$data["success"]="0";
			$data["message"]= "email already exists";
			echo json_encode($data);
			mysqli_close($conn);
			die();
		endif;
	}


	$sql="INSERT INTO `users` (first_name,last_name,name,display_name,phoneno,gender,email,password,type,active_status) VALUES ('$first_name','$last_name','$name','$display_name','$phoneno','$gender','$email','$password','$type','0')";

	if(mysqli_query($conn,$sql)){

			$data["success"]="1";
			$data["message"]="success";

			echo json_encode($data);
			mysqli_close($conn);
	} else{

			$data["success"]="0";
			$data["message"]="error";

			echo json_encode($data);
			mysqli_close($conn);		
	}
}

?>