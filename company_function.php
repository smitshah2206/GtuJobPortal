<?php

	function company_get_id($conn,$value)
	{
		$email= $value['email'];

		$sql= "SELECT * FROM `company` WHERE `email`='".$email."' AND `status` != 3";

		$result = mysqli_query($conn,$sql);
		if($result)
		{
			if(mysqli_affected_rows($conn))
			{
				while ($row = mysqli_fetch_array($result)) {
					$id = $row['id'];
				}
				return $id;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

	function company_get_name($conn,$value)
	{
		$id= $value;

		$sql= "SELECT * FROM `company` WHERE `id`='".$id."' AND `status` != 3";

		$result = mysqli_query($conn,$sql);
		if($result)
		{
			if(mysqli_affected_rows($conn))
			{
				while ($row = mysqli_fetch_array($result)) {
					$name = $row['firstname'];
					$name .= ' '.$row['middlename'];
					$name .= ' '.$row['lastname'];
				}
				return $name;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

	function company_get_status($conn,$value)
	{
		$id= $value;

		$sql= "SELECT * FROM `company` WHERE `id`='".$id."'";

		$result = mysqli_query($conn,$sql);
		if($result)
		{
			if(mysqli_affected_rows($conn))
			{
				while ($row = mysqli_fetch_array($result)) {
					$status = $row['status'];
				}
				return $status;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

	function company_get_details($conn,$value)
	{
		$id= $value;

		$sql= "SELECT * FROM `company` WHERE `id`='".$id."'";

		$result = mysqli_query($conn,$sql);
		if($result)
		{
			if(mysqli_affected_rows($conn))
			{
				$row = mysqli_fetch_array($result);
				return $row;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

	function company_email_exist($conn,$emailvalue,$idvalue = '')
	{
		$sql = "SELECT * FROM `company` WHERE `email` = '".$emailvalue."' AND `id` != '".$idvalue."'";
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		if($count > 0)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

	function company_contactnumber_exist($conn,$contactvalue,$idvalue= '')
	{
		$sql = "SELECT * FROM `company` WHERE `contactnumber` = '".$contactvalue."' AND `id` != '".$idvalue."'";
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		if($count > 0)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

	function company_insert($conn,$value)
	{
		$firstname= $value['firstname'];
		$lastname= $value['lastname'];
		$email= $value['email'];
		$password= md5($value['password']);

		$sql= "INSERT INTO `company` (`firstname`, `lastname`, `email`, `password`, `status`) VALUES ('".$firstname."','".$lastname."','".$email."','".$password."','1')";
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			if(mysqli_affected_rows($conn))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

	function company_select($conn,$value)
	{
		$email= $value['email'];
		$password= md5($value['password']);

		$sql= "SELECT * FROM `company` WHERE `email`='".$email."' AND `password` = '".$password."' AND `status` != 3";

		$result = mysqli_query($conn,$sql);
		if($result)
		{
			if(mysqli_affected_rows($conn))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

	function company_update($conn,$value,$filevalue,$idvalue)
	{
		if (isset($_SESSION['first_time_login'])) {
			$status = 5;
		} else {
			$status = 2;
		}
		$firstname = $value['firstname'];
	    $middlename = $value['middlename'];
	    $lastname = $value['lastname'];
	    $email = $value['email'];
	    $contactnumber = $value['contactnumber'];
	    
	    $company_name = $value['company_name'];
	    $company_website = $value['company_website'];
	    $company_about = $value['company_about'];
	    $company_logo_temp_name = $filevalue['company_logo']['tmp_name'];
	    $company_logo_extension = pathinfo($filevalue['company_logo']['name'],PATHINFO_EXTENSION);
	    $company_logo_name = time().'.'.$company_logo_extension;
	    $company_contry = $value['company_contry'];
	    $company_state = $value['company_state'];
	    $company_district = $value['company_district'];

	    $whatsapp = $value['whatsapp'];
	    $facebook = $value['facebook'];
	    $linkedin = $value['linkedin'];
	    $url = Company_Logo_Upload_Url.$company_logo_name;
	    move_uploaded_file($company_logo_temp_name, $url);
	    $sql = "UPDATE `company` SET `firstname`='".$firstname."',`middlename`='".$middlename."',`lastname`='".$lastname."',`email`='".$email."',`contactnumber`='".$contactnumber."',`company_name`='".$company_name."',`company_website`='".$company_website."',`company_about`='".$company_about."',`company_contry`='".$company_contry."',`company_state`='".$company_state."',`company_district`='".$company_district."',`whatsapp`='".$whatsapp."',`facebook`='".$facebook."',`linkedin`='".$linkedin."',`company_logo`='".$company_logo_name."',`status`='".$status."' WHERE `id` = '".$idvalue."'";
	    $result = mysqli_query($conn,$sql);
		if($result)
		{
			return 1;
		}
		else
		{
			return 0;
		}	
	}

	function company_password_update($conn,$value)
	{
		$email = $value['email'];
		$password = $value['password'];
		$sql = "UPDATE `company` SET `password`='".md5($password)."' WHERE `email`='".$email."'";
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			if(mysqli_affected_rows($conn))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

	function company_job_insert($conn,$value,$idvalue)
	{
		$job_title= $value['job_title'];
		$job_ctc= $value['job_ctc'];
		$job_deadlinedate= $value['job_deadlinedate'];
		$job_vacancies= $value['job_vacancies'];
		$job_type= $value['job_type'];
		$job_location= $value['job_location'];
		$job_eligiblity= $value['job_eligiblity'];
		$job_description= $value['job_description'];
		$id = $idvalue;

		$sql= "INSERT INTO `job_post`(`job_title`, `job_ctc`, `job_deadlinedate`, `job_vacancies`, `job_type`, `job_location`, `job_eligiblity`, `job_description`, `status`, `created_by`) VALUES ('".$job_title."','".$job_ctc."','".$job_deadlinedate."','".$job_vacancies."','".$job_type."','".$job_location."','".$job_eligiblity."','".$job_description."','4','".$id."')";
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			if(mysqli_affected_rows($conn))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

	function company_job_update($conn,$value)
	{
		$post_id = $value['post_id'];
		$job_title= $value['job_title'];
		$job_ctc= $value['job_ctc'];
		$job_deadlinedate= $value['job_deadlinedate'];
		$job_vacancies= $value['job_vacancies'];
		$job_type= $value['job_type'];
		$job_location= $value['job_location'];
		$job_eligiblity= $value['job_eligiblity'];
		$job_description= $value['job_description'];
		
		$sql = " UPDATE `job_post` SET `job_title` = '".$job_title."',`job_ctc` = '".$job_ctc."',`job_deadlinedate` = '".$job_deadlinedate."',`job_vacancies` = '".$job_vacancies."',`job_type` = '".$job_type."',`job_location` = '".$job_location."',`job_eligiblity` = '".$job_eligiblity."',`job_description` = '".$job_description."' WHERE `id` = '".$post_id."'";
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	function company_job_fetch($conn,$idvalue)
	{
		$sql= "SELECT * FROM `job_post` WHERE `id` = '".$idvalue."'";
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			if(mysqli_affected_rows($conn))
			{
				return $result;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

	function company_session($conn,$value)
	{
		$_SESSION['id'] = company_get_id($conn,$value);
		$_SESSION['name'] = company_get_name($conn,$_SESSION['id']);
		$_SESSION['type'] = 'Company'; 
	}

	function total_post_job($conn,$id,$limit='',$desc='',$job_category='',$job_type='',$job_location='')
	{
		$sql = "SELECT `job_post`.`id`,`job_title`,`job_deadlinedate`,`job_type`,`job_location`,`company_website`,`company_logo` FROM `job_post`,`company` WHERE created_by = '".$id."' AND `job_post`.`status` = 4 AND `job_post`.`created_by` = `company`.`id`";
		if (!empty(trim($job_category))) {
			$sql .= " AND `job_title` LIKE '%".$job_category."%' ";
		}

		if (!empty(trim($job_type))) {
			$sql .= " AND `job_type` LIKE '%".$job_type."%' ";
		}

		if (!empty(trim($job_location))) {
			$sql .= " AND `job_location` LIKE '%".$job_location."%' ";
		}

		if ($desc) {
			$sql .= " ORDER BY ".$desc." DESC ";
		}

		if($limit){
			$sql .= " LIMIT ".$limit." ";
		}
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			return $result;
		}
		else
		{
			return false;
		}
	}

	function total_candidate($conn,$limit='',$status='',$desc='',$employee_name='',$employee_location='')
	{
		if (!empty(trim($employee_name)) OR !empty(trim($employee_location))) {
			$employeeValidation = 1;
		} else {
			$employeeValidation = 0;
		}

		$sql = "SELECT * FROM `employee`";
		
		if($status){
			$sql .= " WHERE `status` = '".$status."' ";
		}
		
		if (!$status && $employeeValidation) {
			$sql .= " WHERE";
		}

		if (!empty(trim($employee_name))) {
			if ($status) {
				$sql .=" AND";
			}

			$sql .= " (`firstname` LIKE '%".$employee_name."%' OR `middlename` LIKE '%".$employee_name."%' OR `lastname` LIKE '%".$employee_name."%') ";
		}

		if (!empty(trim($employee_location))) {
			if ($status OR !empty(trim($employee_name))) {
				$sql .=" AND";
			}
			$sql .= " (`district` LIKE '%".$employee_location."%') ";
		}

		if($desc){
			$sql .= " ORDER BY `id` DESC";
		}

		if($limit){
			$sql .= " LIMIT ".$limit." ";
		}
		$result = mysqli_query($conn,$sql);
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	function total_company($conn,$limit='',$status='',$company_name='',$company_location='',$extra_status='')
	{
		$sql = "SELECT * FROM `company`";
		if($status){
			$sql .= " WHERE ( `status` = '".$status."' ";
		}
		if (!$extra_status) {
			$sql .= ")";
		}
		if($extra_status){
			$sql .= " OR `status` = '".$extra_status."' )";
		}
		if (!empty(trim($company_name))) {
			$sql .= " AND `company_name` LIKE '%".$company_name."%' ";
		}
		if (!empty(trim($company_location))) {
			$sql .= " AND `company_district` LIKE '%".$company_location."%' ";
		}
		$sql .= " ORDER BY `id` DESC";
		if($limit){
			$sql .= " LIMIT ".$limit." ";
		}
		$result = mysqli_query($conn,$sql);
		if($result){
			return $result;
		}else{
			return false;
		}
	}

	function company_candidate_list($conn,$id,$round_status='')
	{
		$sql = "SELECT `employee`.`id`,`employee`.`firstname`,`employee`.`middlename`,`employee`.`lastname`,`employee`.`enrollmentno`,`employee`.`email`,`employee`.`gender`,`employee`.`district`,`employee`.`colleagename`,`employee`.`status`,`round_status`.`message` FROM `job_apply`,`employee`,`round_status` WHERE `job_apply`.`job_post_id` = '".$id."' AND `employee`.`id` = `job_apply`.`employee_id` AND `round_status`.`id` = `job_apply`.`round_status`";
		if($round_status){
			$sql .= " AND `job_apply`.`round_status` = '".$round_status."' ";
		}
		$sql .= " ORDER BY `round_status` DESC";
		$result = mysqli_query($conn,$sql);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
?>