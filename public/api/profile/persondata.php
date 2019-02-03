<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	$jsid=$_POST['jsid'];
	$city=$_POST['city'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	


	require_once 'connecting.php';

	$sqln="INSERT INTO jobseekerprofiles (user_id,date_of_birth,js_address) VALUES ('$jsid','$dob','$address')";
	$sql="UPDATE `users` SET city='$city' Where id='$jsid'";

	if(mysqli_query($conn,$sql)){
		if(mysqli_query($conn,$sqln)){

			$result["success"]="1";
			$result["message"]="success";

			echo json_encode($result);
			mysqli_close($conn);
		} else{

			$result["success"]="0";
			$result["message"]="error";

			echo json_encode($result);
			mysqli_close($conn);		
	    }
	} else{

			$result["success"]="0";
			$result["message"]="error";

			echo json_encode($result);
			mysqli_close($conn);		
	    }
}

?>