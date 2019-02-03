<?php  

// Create connection
$conn = new mysqli('localhost' , 'root' , '' , 'talash');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
require_once 'connecting.php';

if($_SERVER['REQUEST_METHOD']=='POST'){


	$email=$_POST['email'];

	

$sql = "select profile_pic,id from `users` where email='$email'";
$result = $conn->query($sql);

$data = [];

$i = 0;
$data['data'] = [];
if ($result->num_rows > 0) {
	$data['feedback']=TRUE;

	while($row = $result->fetch_assoc()){
		$data['data'][$i] = [];
		$data['data'][$i]['image'] = $row['profile_pic'];
		$data['data'][$i]['id'] = $row['id'];
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