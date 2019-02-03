<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	require_once 'connecting.php';

	$jsid=$_POST['jsid'];

$sql = "select * from `education` where user_id='$jsid'";
$result = $conn->query($sql);

$data = [];

$i = 0;
$data['data'] = [];
if ($result->num_rows > 0) {
	$data['feedback']=TRUE;

	while($row = $result->fetch_assoc()){
		$data['data'][$i] = [];
		$data['data'][$i]['eid'] = $row['id'];
		$data['data'][$i]['dtitle'] = $row['degree_title'];
		$data['data'][$i]['cyear'] = $row['year_of_completion'];
		$data['data'][$i]['cgpa'] = $row['cgpa'];
		$data['data'][$i]['dlevel'] = $row['degree_level'];
		$data['data'][$i]['inst'] = $row['institite'];
		$data['data'][$i]['location'] = $row['city'];
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