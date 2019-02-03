<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

		$jsid=$_POST['jsid'];

		require_once 'connecting.php';


	$sql = "SELECT * from `invites` WHERE `jobseeker_id`='{$jsid}' order by id desc";

	$result = $conn->query($sql);
	$data = [];

	$i = 0;
	$data['data'] = [];

	if ($result->num_rows > 0) {
		$data['feedback']=TRUE;

		while($row = $result->fetch_assoc()){
			$data['data'][$i] = [];
			$data['data'][$i]['iid'] = $row['id'];
			$data['data'][$i]['cid'] = $row['company_id'];
			$data['data'][$i]['vid'] = $row['vacancy_id'];
			$data['data'][$i]['accept'] = $row['invite_accept'];

			$result1 = $conn->query("SELECT * FROM `vacancy` WHERE `id`='{$row['vacancy_id']}'");
				if($result1->num_rows > 0){
					$row1 = $result1->fetch_assoc();
					$data['data'][$i]['vtitle'] = $row1['title'];
					$data['data'][$i]['vtype'] = $row1['vacancy_type'];
					$data['data'][$i]['vdate'] = $row1['last_date'];
					$data['data'][$i]['vdesc'] = $row1['description'];
				}
			$result2 = $conn->query("SELECT * FROM `companyprofiles` WHERE `user_id`='{$row['company_id']}'");
				if($result2->num_rows > 0){
					$row2 = $result2->fetch_assoc();
					$data['data'][$i]['cname'] = $row2['company_name'];
					$data['data'][$i]['caddress'] = $row2['address'];
	
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