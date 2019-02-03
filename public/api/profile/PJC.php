<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	$jsid=$_POST['jsid'];
	$pjcity=$_POST['Pjcity'];
	


	require_once 'connecting.php';

	$sql="INSERT INTO prefferedcity (user_id,preffered_city) VALUES ('$jsid', '$pjcity')";

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