<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	$FA=$_POST['FA'];
	$jsid=$_POST['jsid'];
	


	require_once 'connecting.php';

	$sql="INSERT INTO functionalarea (user_id,functional_area) VALUES ('$jsid','$FA')";

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