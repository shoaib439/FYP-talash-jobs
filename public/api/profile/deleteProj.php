<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	$pid=$_POST['id'];
	
	require_once 'connecting.php';

	$sql="DELETE FROM `jsproject` WHERE id='$pid'";

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