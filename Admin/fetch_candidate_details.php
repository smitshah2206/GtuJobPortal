<?php
	$titlename = "Fetch Candidate Details";
	include '../common_function.php';
    include '../company_function.php';
    include '../connection.php';
	if(isset($_POST['round_number'])){
		$round_number = $_POST['round_number'];
		$post_id = $_POST['post_id'];
		$candidate_list = company_candidate_list($conn,$post_id,$round_number);
		$a = 1;
		$result = '';
		$resultHead = '<tr><th scope="col">Sr No.</th><th scope="col">Full Name</th><th scope="col">Enrollment No.</th><th scope="col">Email Address</th><th scope="col">Gender</th><th scope="col">Colleage Name</th><th scope="col">Round Status Message</th><th>More Details</th></tr>';
		while ($row = mysqli_fetch_array($candidate_list)) {
                        if ($row['status'] == 3) {
                         	$status=2;
                        } elseif ($row['status'] == 2) {
                          	$status=3;
                        } else {
                        	$status= '';
                        }
			$color_value = color_label($row['message']);
			$result .= "<tr><td>".$a++."</td><td>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td><td>".$row['enrollmentno']."</td><td>".$row['email']."</td><td>".$row['gender']."</td><td>".$row['colleagename']." , ".$row['district']."</td><td class=".$color_value.">".$row['message']."</td><td><a href='candidate_details.php?employee_id=".$row['id']."&status=".$status."' target='_blank' class='text-muted'>Click Here</a></td></tr>";
        }
        if($result){
        	$output = array(
				'success' =>	true,
				'dataHead' =>	$resultHead,
				'dataBody'	=>	$result
			);
        }else{
        	$output = array(
				'success' =>false,
				'dataHead' =>	$resultHead,
				'dataBody'	=>	$result
			);
        }
        echo json_encode($output);
	}else{
		$link = 'index.php';
        redirect_link('',$link);
	}
?>