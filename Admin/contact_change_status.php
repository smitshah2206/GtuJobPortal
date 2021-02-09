<?php
	include 'header.php';
	if (isset($_GET['contact_id']) && !empty(trim($_GET['contact_id'])) && isset($_GET['status'])) {
		$contact_id = $_GET['contact_id'];
		$status = $_GET['status'];
		$change_status = contact_change_status($conn,$contact_id,$status);
		if ($change_status) {
			switch ($status) {
				case 0:
					$msg = 'Contact Read Sucessfully .!';
					break;
				case 1:
					$msg = 'Contact Un-Read Sucessfully .!';
					break;
				default:
					$msg = '';
					break;
			}
			$link = 'contact.php';
        	redirect_link($msg,$link);
		} else {
			$msg = 'Something went wrong.';
			$link = 'contact.php';
        	redirect_link($msg,$link);
		}
	} else {
		$link = 'contact.php';
        redirect_link('',$link);
	}
?>