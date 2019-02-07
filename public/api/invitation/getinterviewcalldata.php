<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

		$jsid=$_POST['jsid'];

		require_once 'connecting.php';

	$sql = "SELECT * from `minterviews` WHERE `user_id`='{$jsid}' order by id desc";

	$result = $conn->query($sql);
	$data = [];

	$i = 0;
	$data['data'] = [];

	if ($result->num_rows > 0) {
		$data['feedback']=TRUE;

		while($row = $result->fetch_assoc()){
			$data['data'][$i] = [];
			$data['data'][$i]['vid'] = $row['vacancy_id'];
			$data['data'][$i]['cid'] = $row['company_id'];
			$data['data'][$i]['time'] = $row['time'];
			$data['data'][$i]['date'] = $row['date'];

			$result1 = $conn->query("SELECT * FROM `vacancy` WHERE `id`='{$row['vacancy_id']}'");
				if($result1->num_rows > 0){
					$row1 = $result1->fetch_assoc();
					$data['data'][$i]['vtitle'] = $row1['title'];
				}
			$result2 = $conn->query("SELECT * FROM `companyprofiles` WHERE `user_id`='{$row['company_id']}'");
				if($result2->num_rows > 0){
					$row2 = $result2->fetch_assoc();
					$data['data'][$i]['cname'] = $row2['company_name'];
					$data['data'][$i]['caddress'] = $row2['address'];
	
				}

			$i++;

			$sql1="UPDATE `notifications` SET viewed='1' Where user_id='$jsid'And type='call for interview'";
				if(mysqli_query($conn,$sql1)){
					$data['success']=TRUE;
				}else{
					$data['success']=FALSE;
				}
		}

	} else {
    	$data['feedback']=FALSE;
    	$data['msg']= 'Incorrect Credentials';
	}

	$conn->close();
	echo json_encode($data);
}
?>