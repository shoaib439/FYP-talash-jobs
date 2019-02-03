<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	require_once 'connecting.php';

	$jsid=$_POST['jsid'];

$sql = "select * from `languages` where user_id='$jsid'";
$result = $conn->query($sql);

$data = [];

$i = 0;
$data['data'] = [];
if ($result->num_rows > 0) {
	$data['feedback']=TRUE;

	while($row = $result->fetch_assoc()){
		$data['data'][$i] = [];
		$data['data'][$i]['lid'] = $row['id'];
		$data['data'][$i]['lang'] = $row['language'];
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