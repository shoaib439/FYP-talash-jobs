<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	require_once 'connecting.php';

	$jsid=$_POST['jsid'];

$sql = "select * from `jsproject` where user_id='$jsid'";
$result = $conn->query($sql);

$data = [];

$i = 0;
$data['data'] = [];
if ($result->num_rows > 0) {
	$data['feedback']=TRUE;

	while($row = $result->fetch_assoc()){
		$data['data'][$i] = [];
		$data['data'][$i]['pid'] = $row['id'];
		$data['data'][$i]['ptitle'] = $row['project_title'];
		$data['data'][$i]['pdesr'] = $row['project_desc'];
		$data['data'][$i]['psdate'] = $row['project_sd'];
		$data['data'][$i]['pldate'] = $row['project_ed'];
		$data['data'][$i]['purl'] = $row['project_url'];
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