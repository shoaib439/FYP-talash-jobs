<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	require_once 'connecting.php';

	$cid=$_POST['cid'];

	$sql="SELECT count(id) AS jobno from vacancy where vacancy_type='Job' And user_fk='$cid'";
	$sql1="SELECT count(id) AS intno from vacancy where vacancy_type='Internship' And user_fk='$cid'";
	$sql2="SELECT sum(no_of_position) AS position from vacancy where  user_fk='$cid' ";
	$sql3="SELECT count(user_id) AS ino from minterviews where company_id='$cid'";
	
		
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

			$index['jobno']=$row['jobno'];
			$index['intno']=$row1['intno'];
			$index['pos']=$row2['position'];
			$index['users']=$row3['ino'];
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