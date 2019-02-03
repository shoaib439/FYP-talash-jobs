<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	$jsid=$_POST['jsid'];
	$cname=$_POST['cname'];
	$cloc=$_POST['cloc'];
	$pos=$_POST['pos'];
	$jt=$_POST['jt'];
	$sdate=$_POST['sdate'];
	$ldate=$_POST['ldate'];
	


	require_once 'connecting.php';

	$sql="INSERT INTO workexperience (user_id,company_name,company_location,company_position,job_type,start_date,end_date) VALUES ('$jsid','$cname','$cloc','$pos','$jt','$sdate','$ldate')";

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