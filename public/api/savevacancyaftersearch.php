<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	$jsid=$_POST['jsid'];
	$svid=$_POST['vid'];
	
	require_once 'connecting.php';

	$sql="INSERT INTO `savedvacancies` ( `jobseeker_id`, `vacancy_id`, `created_at`, `updated_at`) VALUES ('$jsid', '$svid', NOW(), NOW())";

	if($res =mysqli_query($conn,$sql)){

			$result["success"]="1";
			$result["message"]="success";

			echo json_encode($result);
			mysqli_close($conn);
	} else{

			var_dump(mysqli_error($conn));
			die();

			$result["success"]="0";
			$result["message"]="error";

			echo json_encode($result);
			mysqli_close($conn);		
	}
}

?>