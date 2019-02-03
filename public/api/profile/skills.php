<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	$jsid=$_POST['jsid'];
	$skill=$_POST['skill'];	


	require_once 'connecting.php';

	$sql="INSERT INTO skill (user_id,skills) VALUES ('$jsid','$skill')";

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