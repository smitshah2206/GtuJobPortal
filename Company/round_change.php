<?php
	include '../common_function.php';
    include '../company_function.php';
    include '../connection.php';
	if (isset($_POST['employee_id'])) {
        $arrEmployeeId = explode(",",$_POST['employee_id']);
        $roundDropdown = $_POST['roundDropdown'];
        $sql = "UPDATE `job_apply` SET `round_status` = ".$roundDropdown." WHERE";
        foreach ($arrEmployeeId as $employee_id ) {
        	$sql .= " `employee_id` = ".$employee_id." OR";
        }
        $sql = rtrim($sql, "OR");
        $result = mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn) > 0){
        	$success = true;
        }else{
        	$success = false;
        }
        $output = array('success' =>	$success);
        echo json_encode($output);
    }
?>