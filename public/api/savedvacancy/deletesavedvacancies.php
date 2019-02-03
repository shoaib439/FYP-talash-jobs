<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	$jsid=$_POST['jsid'];
	$svid=$_POST['svid'];
	
	require_once 'connecting.php';

	$sql="DELETE FROM `savedvacancies` WHERE jobseeker_id='$jsid' AND id='$svid'";

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