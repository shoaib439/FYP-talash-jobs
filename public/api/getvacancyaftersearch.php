<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){


	$vid=$_POST['vid'];
	$jsid=$_POST['jsid'];
	
	require_once 'connecting.php';

	$sql="SELECT * from `vacancy` WHERE id='$vid'";
	$result = $conn->query($sql);

	$data = [];

	$i = 0;
	$data['data'] = [];
	if ($result->num_rows > 0) {
		$data['feedback']=TRUE;

		while($row = $result->fetch_assoc()){
		$data['data'][$i] = [];
		$data['data'][$i]['title'] = $row['title'];
		$data['data'][$i]['vtype'] = $row['vacancy_type'];
		$data['data'][$i]['vdesc'] = $row['description'];
		$data['data'][$i]['vposition'] = $row['no_of_position'];
		$data['data'][$i]['vindustry'] = $row['industry'];
		$data['data'][$i]['vjcity'] = $row['job_city'];
		$data['data'][$i]['vjobtype'] = $row['job_type'];
		$data['data'][$i]['vshift'] = $row['job_shift'];
		$data['data'][$i]['vdlevel'] = $row['degree_level'];
		$data['data'][$i]['vcarrier'] = $row['carrier_level'];
		$data['data'][$i]['vskills'] = $row['skills_required'];
		$data['data'][$i]['vsalary'] = $row['salary'];
		$data['data'][$i]['vexp'] = $row['experience'];
		$data['data'][$i]['vage'] = $row['age_range'];
		$data['data'][$i]['vwhour'] = $row['working_hours'];
		$data['data'][$i]['vadate'] = $row['last_date'];
		$data['data'][$i]['vinterview'] = $row['hr_no_of_interview'];
		$data['data'][$i]['vproced'] = $row['hr_procedure'];

		$data['data'][$i]['vldcheck'] = "no";
		if(strtotime($row['last_date']) < time()){
			$data['data'][$i]['vldcheck'] = "yes";
		}

		$result1 = $conn->query("SELECT * FROM `appliedvacancies` WHERE `jobseeker_id`='{$jsid}' AND `vacancy_id`='$vid'");

		if($result1->num_rows > 0){
			$data['data'][$i]['applied'] = 'yes';
		}
		else{
			$data['data'][$i]['applied'] = 'no';
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