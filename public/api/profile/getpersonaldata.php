<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

		$jsid=$_POST['jsid'];

		require_once 'connecting.php';

		$sql="SELECT display_name,gender,phoneno,city,email FROM users  WHERE id='$jsid'";

		$respone=mysqli_query($conn,$sql);
		$result=array();
		$result['data']=array();

		if(mysqli_num_rows($respone)===1){
			$row=mysqli_fetch_assoc($respone);

				$index['name']=$row['display_name'];
				$index['gender']=$row['gender'];
				$index['email']=$row['email'];
				$index['no']=$row['phoneno'];
				$index['city']=$row['city'];
				
				array_push($result['data'], $index);

				$result['success']="1";
				$result['message']="success";
				echo json_encode($result);
				mysqli_close($conn);
		}else{

				$result['success']="0";
				$result['message']="error";
				echo json_encode($result);
				mysqli_close($conn);
			}
		
} 

?>