<?php
	$titlename = "Employee Change Status";
	include 'header.php';
	if (isset($_GET['employee_id']) && !empty(trim($_GET['employee_id'])) && isset($_GET['status']) && !empty(trim($_GET['status']))) {
		$employee_id = $_GET['employee_id'];
		$status = $_GET['status'];
		$change_status = candidate_change_status($conn,$employee_id,$status);
		if ($change_status) {
			switch ($status) {
				case 2:
					$msg = 'Profile Active Sucessfully .!';
					break;
				case 3:
					$msg = 'Profile Deactive Sucessfully .!';
					break;
				default:
					$msg = '';
					break;
			}
			$link = 'candidate.php';
        	redirect_link($msg,$link);
		} else {
			$msg = 'Something went wrong.';
			$link = 'index.php';
        	redirect_link($msg,$link);
		}
	} else {
		$link = 'index.php';
        redirect_link('',$link);
	}
?>