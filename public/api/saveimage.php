<?php  

require_once 'connecting.php';

if($_SERVER['REQUEST_METHOD']=='POST'){


	$email=$_POST['email'];

	
	$target_dir="../images";

	$p_image=$_POST['p_image'];

	if(!file_exists($target_dir)){
		mkdir($target_dir, 0777, true);
	}

	$target_dir= $target_dir."/".rand()."_".time().".jpeg";

	if(file_put_contents($target_dir, base64_decode($p_image))){

		$target_dir = str_replace('../', '', $target_dir);

	$sql="UPDATE users SET profile_pic='$target_dir' WHERE email='$email' ";

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

}

?>