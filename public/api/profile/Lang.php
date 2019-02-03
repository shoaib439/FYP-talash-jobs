<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	$lang=$_POST['lang'];
	$jsid=$_POST['jsid'];
	


	require_once 'connecting.php';

	$sql="INSERT INTO languages (user_id,language) VALUES ('$jsid','$lang')";

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