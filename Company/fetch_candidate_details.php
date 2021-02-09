<?php
	include '../common_function.php';
    include '../company_function.php';
    include '../connection.php';
	if(isset($_POST['round_number'])){
		$round_number = $_POST['round_number'];
		$candidate_list = company_candidate_list($conn,$_SESSION['id'],$round_number);
		$a = 1;
		$result = '';
		if($round_number == ""){
			$resultHead = '<tr><th scope="col">Sr No.</th><th scope="col">Full Name</th><th scope="col">Enrollment No.</th><th scope="col">Email Address</th><th scope="col">Gender</th><th scope="col">Colleage Name</th><th scope="col">Round Status Message</th><th>More Details</th></tr>';
		}else{
			$resultHead = '<tr><th scope="col"><input type="checkbox" name="select" id="selectAll" onclick="selectAll(this)"></th><th scope="col">Sr No.</th><th scope="col">Full Name</th><th scope="col">Enrollment No.</th><th scope="col">Email Address</th><th scope="col">Gender</th><th scope="col">Colleage Name</th><th scope="col">Round Status Message</th><th>More Details</th></tr>';
		}

		while ($row = mysqli_fetch_array($candidate_list)) {
			$color_value = color_label($row['message']);
			if($round_number == ""){
				$result .= "<tr><td>".$a++."</td><td>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td><td>".$row['enrollmentno']."</td><td>".$row['email']."</td><td>".$row['gender']."</td><td>".$row['colleagename']." , ".$row['district']."</td><td class=".$color_value.">".$row['message']."</td><td><a href='candidate_details.php?employee_id=".$row['id']."' target='_blank' class='text-muted'>Click Here</a></td></tr>";
			}else{
				$result .= "<tr><td><input type='checkbox' name='employee_id[]' value=".$row['id']." onclick='set_employee_id(this.value)' id='employee_id'></td><td>".$a++."</td><td>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td><td>".$row['enrollmentno']."</td><td>".$row['email']."</td><td>".$row['gender']."</td><td>".$row['colleagename']." , ".$row['district']."</td><td class=".$color_value.">".$row['message']."</td><td><a href='candidate_details.php?employee_id=".$row['id']."' target='_blank' class='text-muted'>Click Here</a></td></tr>";
			}
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