<?php
	$titlename = "Company Change Status";
	include 'header.php';
	if (isset($_GET['company_id']) && !empty(trim($_GET['company_id'])) && isset($_GET['status']) && !empty(trim($_GET['status']))) {
		$company_id = $_GET['company_id'];
		$status = $_GET['status'];
		$change_status = company_change_status($conn,$company_id,$status);
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
			$link = 'company.php';
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