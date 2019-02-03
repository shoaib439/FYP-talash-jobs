<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	$jsid=$_POST['jsid'];
	$ptitle=$_POST['ptitle'];
	$pdesr=$_POST['pdesr'];
	$psdate=$_POST['psdate'];
	$pldate=$_POST['pldate'];
	$purl=$_POST['purl'];
	


	require_once 'connecting.php';

	$sql="INSERT INTO jsproject (user_id,project_title,project_desc,project_sd,project_ed,project_url) VALUES ('$jsid','$ptitle','$pdesr','$psdate','$pldate','$purl')";

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