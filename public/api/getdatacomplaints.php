<?php  

if($_SERVER['REQUEST_METHOD']=='POST'){

	require_once 'connecting.php';

	$email=$_POST['email'];
	$jsid=$_POST['jsid'];

$sql = "SELECT * from `contactus` where email='$email' ORDER BY id Desc";
$result = $conn->query($sql);

$data = [];

$i = 0;
$data['data'] = [];
if ($result->num_rows > 0) {
	$data['feedback']=TRUE;

	while($row = $result->fetch_assoc()){
		$data['data'][$i] = [];
		$data['data'][$i]['subject'] = $row['subject'];
		$data['data'][$i]['solve'] = $row['solve'];
		$i++;
	}
	$sql1="UPDATE `notifications` SET viewed='1' Where user_id='$jsid'And type='Customer Support'";
				if(mysqli_query($conn,$sql1)){
					$data['success']=TRUE;
				}else{
					$data['success']=FALSE;
				}

} else {
    $data['feedback']=FALSE;
    $data['msg']= 'Incorrect Credentials';
}

$conn->close();
echo json_encode($data);
}
?>