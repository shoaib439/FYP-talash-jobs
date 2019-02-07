<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	$jsid=$_POST['jsid'];
	$svid=$_POST['vid'];
	
	require_once 'connecting.php';
	$date = date('Y-m-d', time());
	$sql="INSERT INTO `appliedvacancies` ( `jobseeker_id`, `vacancy_id`,`applied_date`,`status`, `created_at`, `updated_at`) VALUES ('$jsid', '$svid','$date','pending', NOW(), NOW())";

	if($res =mysqli_query($conn,$sql)){

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