<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	$userid=$_POST['userid'];
	$uname=$_POST['uname'];
	$uemail=$_POST['uemail'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];


	require_once 'connecting.php';

	$sql="INSERT INTO contactus (type,name, email, subject, message) VALUES ('jobseeker','$uname','$uemail','$subject','$message')";

	if(mysqli_query($conn,$sql)){

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
}

?>