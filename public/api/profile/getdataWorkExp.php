<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	require_once 'connecting.php';

	$jsid=$_POST['jsid'];

$sql = "select * from `workexperience` where user_id='$jsid'";
$result = $conn->query($sql);

$data = [];

$i = 0;
$data['data'] = [];
if ($result->num_rows > 0) {
	$data['feedback']=TRUE;

	while($row = $result->fetch_assoc()){
		$data['data'][$i] = [];
		$data['data'][$i]['weid'] = $row['id'];
		$data['data'][$i]['cname'] = $row['company_name'];
		$data['data'][$i]['cloc'] = $row['company_location'];
		$data['data'][$i]['pos'] = $row['company_position'];
		$data['data'][$i]['jt'] = $row['job_type'];
		$data['data'][$i]['sdate'] = $row['start_date'];
		$data['data'][$i]['ldate'] = $row['end_date'];
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