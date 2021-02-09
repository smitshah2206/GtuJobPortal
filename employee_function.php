<?php
	function employee_get_id($conn,$value)
	{
		$enno= $value['enno'];

		$sql= "SELECT * FROM `employee` WHERE `enrollmentno`='".$enno."' AND `status` != 3";

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

	function employee_get_name($conn,$value)
	{
		$id= $value;

		$sql= "SELECT * FROM `employee` WHERE `id`='".$id."' AND `status` != 3";

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

	function employee_get_status($conn,$value)
	{
		$id= $value;

		$sql= "SELECT * FROM `employee` WHERE `id`='".$id."'";

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

	function employee_get_details($conn,$value)
	{
		$id= $value;

		$sql= "SELECT * FROM `employee` WHERE `id`='".$id."'";

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

	function employee_eno_exist($conn,$value)
	{
		$sql = "SELECT * FROM `employee` WHERE `enrollmentno` = '".$value."'";
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

	function employee_email_exist($conn,$emailvalue,$idvalue = '')
	{
		$sql = "SELECT * FROM `employee` WHERE `email` = '".$emailvalue."' AND `id` != '".$idvalue."'";
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

	function employee_contactnumber_exist($conn,$contactvalue,$idvalue= '')
	{
		$sql = "SELECT * FROM `employee` WHERE `contactnumber` = '".$contactvalue."' AND `id` != '".$idvalue."' ";
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

	function employee_insert($conn,$value)
	{
		$firstname= $value['firstname'];
		$lastname= $value['lastname'];
		$enno= $value['enno'];
		$email= $value['email'];
		$password= md5($value['password']);

		$sql= "INSERT INTO `employee` (`firstname`, `lastname`, `enrollmentno`, `email`, `password`, `status`) VALUES ('".$firstname."','".$lastname."','".$enno."','".$email."','".$password."','1')";
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

	function employee_select($conn,$value)
	{
		$enno= $value['enno'];
		$password= md5($value['password']);

		$sql= "SELECT * FROM `employee` WHERE `enrollmentno`='".$enno."' AND `password` = '".$password."' AND `status` != 3";

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

	function employee_update($conn,$value,$filevalue,$idvalue)
	{
		$firstname = $value['firstname'];
	    $middlename = $value['middlename'];
	    $lastname = $value['lastname'];
	    $email = $value['email'];
	    $contactnumber = $value['contactnumber'];
	    $dateofbirth = $value['dateofbirth'];
	    $gender = $value['gender'];
	    $contry = $value['contry'];
	    $state = $value['state'];
	    $district = $value['district'];

	    $colleagename = $value['colleagename'];
	    $sgpa = $value['sgpa'];
	    $graduationyear = $value['graduationyear'];
	    $hscschoolname = $value['hscschoolname'];
	    $hscboardname = $value['hscboardname'];
	    $hsccgpa = $value['hsccgpa'];
	    $hscpassout = $value['hscpassout'];
	    $sscschoolname = $value['sscschoolname'];
	    $sscboardname = $value['sscboardname'];
	    $ssccgpa = $value['ssccgpa'];
	    $sscpassout = $value['sscpassout'];

	    $coverletter = $value['coverletter'];
	    $intrestarea = $value['intrestarea'];
	    $uploadcv_temp_name = $filevalue['uploadcv']['tmp_name'];
	    $uploadcv_extension = pathinfo($filevalue['uploadcv']['name'],PATHINFO_EXTENSION);
	    $uploadcv_name = time().'.'.$uploadcv_extension;

	    $whatsapp = $value['whatsapp'];
	    $github = $value['github'];
	    $linkedin = $value['linkedin'];
	    $skype = $value['skype'];
	    $url = Employee_Cv_Upload_Url.$uploadcv_name;
	    move_uploaded_file($uploadcv_temp_name, $url);
	    $sql = "UPDATE `employee` SET `firstname`='".$firstname."',`middlename`= '".$middlename."' ,`lastname`= '".$lastname."',`email`='".$email."',`contactnumber`='".$contactnumber."',`dateofbirth`='".$dateofbirth."',`gender`='".$gender."',`contry`='".$contry."',`state`='".$state."',`district`='".$district."',`colleagename`='".$colleagename."',`sgpa`='".$sgpa."',`graduationyear`='".$graduationyear."',`hscschoolname`='".$hscschoolname."',`hscboardname`='".$hscboardname."',`hsccgpa`='".$hsccgpa."',`hscyear`='".$hscpassout."',`sscschoolname`='".$sscschoolname."',`sscboardname`='".$sscboardname."',`ssccgpa`='".$ssccgpa."',`sscyear`='".$sscpassout."',`coverletter`='".$coverletter."',`intrestarea`='".$intrestarea."',`resume`='".$uploadcv_name."',`whatsapp`='".$whatsapp."',`github`='".$github."',`linkedin`='".$linkedin."',`skype`='".$skype."',`status`='2' WHERE `id` = '".$idvalue."'";
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

	function employee_password_update($conn,$value)
	{
		$enno = $value['enno'];
	    $password = $value['password'];
	    $sql = "UPDATE `employee` SET `password`='".md5($password)."' WHERE `enrollmentno`='".$enno."'";
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
	
	function employee_session($conn,$value)
	{
		$_SESSION['id'] = employee_get_id($conn,$value);
		$_SESSION['name'] = employee_get_name($conn,$_SESSION['id']);
		$_SESSION['type'] = 'Employee';
	}

	function employee_total_post_job($conn,$limit='',$desc='',$job_category='',$job_type='',$job_location='')
	{
		$sql = "SELECT `job_post`.`id`,`job_title`,`job_deadlinedate`,`job_type`,`job_location`,`company_name`,`company_website`,`company_logo` FROM `job_post`, `company` WHERE `job_post`.`status` = 4 AND `company`.`id` = `job_post`.`created_by`";

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

	function employee_apply_job($conn,$job_post_id,$employee_id)
	{
		
		$sqla = "SELECT * FROM `job_post` WHERE `id` = '".$job_post_id."' AND `status` = 4";
		$resulta = mysqli_query($conn,$sqla);
		if($resulta){
			if(mysqli_num_rows($resulta) > 0){

				$sql = "INSERT INTO `job_apply` (`job_post_id`,`employee_id`,`round_status`) VALUES ('".$job_post_id."','".$employee_id."',1)";
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

			}else{
				return 0;
			}
		} else{
			return 0;
		}
	}

	function total_apply_job($conn,$id,$limit='',$desc='')
	{
		$sql = "SELECT `job_post`.`id`,`job_title`,`job_type`,`job_location`,`company_name`,`company_website`,`company_logo`,`job_apply`.`round_status`,`round_status`.`message` FROM `job_post`, `company` , `job_apply` , `round_status` WHERE `company`.`id` = `job_post`.`created_by` AND `job_apply`.`job_post_id` = `job_post`.`id` AND `job_apply`.`employee_id` = '".$id."' AND `job_apply`.`round_status` = `round_status`.`id`	";
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

	

	function fetch_current_employee_round_status($conn,$job_post_id,$employee_id)
	{
		$sql = "SELECT `round_status`.`message` FROM `job_apply`,`round_status` WHERE (`employee_id` = '".$employee_id."' AND `job_post_id` = '".$job_post_id."') AND `job_apply`.`round_status` = `round_status`.`id` ";
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

	function employee_job_applied($conn,$job_post_id,$employee_id)
	{
		$sql = "SELECT * FROM `job_post` WHERE `id` = '".$job_post_id."'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1){
			$sql = "SELECT * FROM `job_apply` WHERE `job_post_id` = '".$job_post_id."' AND `employee_id` = '".$employee_id."'";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) == 0){
				$sql = "INSERT INTO `job_apply` (`job_post_id`,`employee_id`,`round_status`) VALUES ('".$job_post_id."','".$employee_id."','1')";
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
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
?>