<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	$n=$_POST['name'];
	$s=$_POST['suggestion'];
	$r=$_POST['rating'];

	require_once 'connecting.php';

	$sql="INSERT INTO feedback (name, suggestion, rating) VALUES ('$n','$s','$r')";

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