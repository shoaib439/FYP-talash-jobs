<?php  

require_once 'connecting.php';

if($_SERVER['REQUEST_METHOD']=='POST'){


	$sq=$_POST['squery'];
	$sc=$_POST['selectedcity'];
	$si=$_POST['selectedind'];
	$st=$_POST['selectedtype'];
	$jsid=$_POST['jsid'];


	if(!empty($sq) && empty($sc) && empty($si) && empty($st))
        {
			$search = "SELECT * FROM `users` INNER JOIN `vacancy` ON `vacancy`.`title` LIKE '%{$sq}%' AND `users`.`id`=`vacancy`.`user_fk`";
            
        }

        if(!empty($sq)  && !empty($sc) && empty($si) && empty($st))
        {
            
			$search = "SELECT * FROM `users` INNER JOIN `vacancy` ON `vacancy`.`title` LIKE '%{$sq}%' AND `vacancy`.`job_city`='{$sc}' AND `users`.`id`=`vacancy`.`user_fk`";
        }
		
		if(!empty($sq)  && empty($sc) && !empty($si) && empty($st))
        {
            
			$search = "SELECT * FROM `users` INNER JOIN `vacancy` ON `vacancy`.`title` LIKE '%{$sq}%' AND `vacancy`.`industry`='{$si}' AND `users`.`id`=`vacancy`.`user_fk`";
        }
		
		if(!empty($sq)  && empty($sc) && empty($si) && !empty($st))
        {
            
			$search = "SELECT * FROM `users` INNER JOIN `vacancy` ON `vacancy`.`title` LIKE '%{$sq}%' AND `vacancy`.`vacancy_type`='{$st}' AND `users`.`id`=`vacancy`.`user_fk`";
        }
		
		
		
		if(!empty($sq)  && !empty($sc) && !empty($si) && empty($st))
        {
     
			$search = "SELECT * FROM `users` INNER JOIN `vacancy` ON `vacancy`.`title` LIKE '%{$sq}%' AND `vacancy`.`job_city`='{$sc}' AND `vacancy`.`industry`='{$si}' AND `users`.`id`=`vacancy`.`user_fk`";
        }
		
		if(!empty($sq)  && !empty($sc) && empty($si) && !empty($st))
        {
           
			$search = "SELECT * FROM `users` INNER JOIN `vacancy` ON `vacancy`.`title` LIKE '%{$sq}%' AND `vacancy`.`job_city`='{$sc}' AND `vacancy`.`vacancy_type`='{$st}' AND `users`.`id`=`vacancy`.`user_fk`";
        }
		
		if(!empty($sq)  && empty($sc) && !empty($si) && !empty($st))
        {
     
			$search = "SELECT * FROM `users` INNER JOIN `vacancy` ON `vacancy`.`title` LIKE '%{$sq}%' AND `vacancy`.`vacancy_type`='{$st}' AND `vacancy`.`industry`='{$si}' AND `users`.`id`=`vacancy`.`user_fk`";
        }
		
		
		if(!empty($sq)  && !empty($sc) && !empty($si) && !empty($st))
        {
            $search = "SELECT * FROM `users` INNER JOIN `vacancy` ON `vacancy`.`title` LIKE '%{$sq}%' AND `vacancy`.`vacancy_type`='{$st}' AND `vacancy`.`industry`='{$si}' AND `vacancy`.`job_city`='{$sc}' AND `users`.`id`=`vacancy`.`user_fk`";
        
        }
		
		


   
   $result = $conn->query($search);

$data = [];

$i = 0;
$data['data'] = [];
if ($result->num_rows > 0) {
	$data['feedback']=TRUE;

	while($row = $result->fetch_assoc()){

	

		$data['data'][$i] = [];
		$data['data'][$i]['jobcity'] = $row['job_city'];
		$data['data'][$i]['title'] = $row['title'];
		$data['data'][$i]['display_name'] = $row['display_name'];
		$data['data'][$i]['last_date'] = $row['last_date'];
		$data['data'][$i]['experience'] = $row['experience'];
		$data['data'][$i]['vid'] = $row['id'];
		$data['data'][$i]['cfk'] = $row['user_fk'];

		$result1 = $conn->query("SELECT * FROM `savedvacancies` WHERE `jobseeker_id`='{$jsid}' AND `vacancy_id`='{$row['id']}'");

		if($result1->num_rows > 0){
			$data['data'][$i]['saved'] = 'yes';
		}
		else{
			$data['data'][$i]['saved'] = 'no';
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