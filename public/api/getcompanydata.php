<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	$cid=$_POST['cid'];
	require_once 'connecting.php';

	$sql="SELECT id,email,phoneno,city from `users` WHERE id='$cid'";
	$result = $conn->query($sql);

	$data = [];

	$i = 0;
	$data['data'] = [];
	if ($result->num_rows > 0) {
		$data['feedback']=TRUE;

		while($row = $result->fetch_assoc()){
		$data['data'][$i] = [];
		$data['data'][$i]['cid'] = $row['id'];
		$data['data'][$i]['cno'] = $row['phoneno'];
		$data['data'][$i]['ccity'] = $row['city'];
		$data['data'][$i]['cemail'] = $row['email'];
		

		$result1 = $conn->query("SELECT * FROM `companyprofiles` WHERE `user_id`='{$row['id']}'");
			if($result1->num_rows > 0){
				$row1 = $result1->fetch_assoc();
					$data['data'][$i]['cperson'] = $row1['person_name'];
					$data['data'][$i]['cname'] = $row1['company_name'];
					$data['data'][$i]['cskype'] = $row1['skype'];
					$data['data'][$i]['cweb'] = $row1['website'];
					$data['data'][$i]['caddress'] = $row1['address'];
					$data['data'][$i]['cpdesignation'] = $row1['person_designation'];
					$data['data'][$i]['lat'] = $row1['company_lat'];
					$data['data'][$i]['lng'] = $row1['company_lng'];

			}
		

		$i++;


	}

	} else {
    	$data['feedback']=FALSE;
    	$data['msg']= 'Incorrect Credentials';
		}
	$conn->close();
	echo json_encode($data);
}

?>