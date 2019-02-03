<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

		$jsid=$_POST['jsid'];

		require_once 'connecting.php';


	$sql = "SELECT * from `savedvacancies` WHERE `jobseeker_id`='{$jsid}' order by id desc";

	$result = $conn->query($sql);

	$data = [];

	$i = 0;
	$data['data'] = [];

	if ($result->num_rows > 0) {
		$data['feedback']=TRUE;

		while($row = $result->fetch_assoc()){
			$data['data'][$i] = [];
			$data['data'][$i]['svid'] = $row['id'];
			$data['data'][$i]['vid'] = $row['vacancy_id'];

			$result1 = $conn->query("SELECT * FROM `vacancy` WHERE `id`='{$row['vacancy_id']}'");
				if($result1->num_rows > 0){
					$row1 = $result1->fetch_assoc();
					$data['data'][$i]['vtitle'] = $row1['title'];
					$data['data'][$i]['vtype'] = $row1['vacancy_type'];
					$data['data'][$i]['vindustry'] = $row1['industry'];
					$data['data'][$i]['vjcity'] = $row1['job_city'];
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