<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	require_once 'connecting.php';

	$sql="SELECT count(id) AS jsno from users where type='jobseeker' ";
	$sql1="SELECT count(id) AS cno from users where type='company' ";
	$sql2="SELECT count(id) AS jobno from vacancy where vacancy_type='Job' ";
	$sql3="SELECT count(id) AS intno from vacancy where vacancy_type='Internship' ";
		
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
		$res1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_assoc($res1);
		$res2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_assoc($res2);
		$res3=mysqli_query($conn,$sql3);
		$row3=mysqli_fetch_assoc($res3);

		$result=array();
		$result['data']=array();
	if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql1)&&mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql3)){

			$index['jsno']=$row['jsno'];
			$index['cno']=$row1['cno'];
			$index['jobno']=$row2['jobno'];
			$index['intno']=$row3['intno'];
			array_push($result['data'], $index);
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