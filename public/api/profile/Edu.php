<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	$jsid=$_POST['jsid'];
	$dtitle=$_POST['dtitle'];
	$cyear=$_POST['cyear'];
	$dlevel=$_POST['dlevel'];
	$cgpa=$_POST['cgpa'];
	$inst=$_POST['inst'];
	$location=$_POST['location'];
	


	require_once 'connecting.php';

	$sql="INSERT INTO education (user_id,degree_title,year_of_completion,cgpa,degree_level,institite,city) VALUES ('$jsid','$dtitle','$cyear','$cgpa','$dlevel','$inst','$location')";

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