<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	$hid=$_POST['id'];
	
	require_once 'connecting.php';

	$sql="DELETE FROM `hobbies` WHERE id='$hid'";

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