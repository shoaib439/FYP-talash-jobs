<?php  

require_once 'connecting.php';

if($_SERVER['REQUEST_METHOD']=='POST'){


	$password=$_POST['password'];
	$id=$_POST['id'];

	$password=password_hash($password,PASSWORD_DEFAULT);
   
    $data=[];
	$sql = "UPDATE users SET password='$password' WHERE id='$id' ";


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