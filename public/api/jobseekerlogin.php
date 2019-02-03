<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

		$email=$_POST['email'];
		$password=$_POST['password'];


		require_once 'connecting.php';

		$sql="SELECT * FROM users WHERE email='$email' AND type='jobseeker'";

		$respone=mysqli_query($conn,$sql);
		$result=array();
		$result['login']=array();

		if(mysqli_num_rows($respone)===1){
			$row=mysqli_fetch_assoc($respone);

			if(password_verify($password,$row['password']) ){
				$index['id']=$row['id'];
				$index['name']=$row['display_name'];
				$index['email']=$row['email'];
				array_push($result['login'], $index);
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
		}else{
			$result['success']="0";
				$result['message']="conn error";
				echo json_encode($result);
				mysqli_close($conn);
			
		}

} 

?>