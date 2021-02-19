<?php

	function admin_get_id($conn,$value)
	{
		$email= $value['email'];

		$sql= "SELECT * FROM `admin` WHERE `email`='".$email."'";

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

	function admin_get_name($conn,$value)
	{
		$id= $value;
		$sql= "SELECT * FROM `admin` WHERE `id`='".$id."'";

		$result = mysqli_query($conn,$sql);
		if($result)
		{
			if(mysqli_affected_rows($conn))
			{
				while ($row = mysqli_fetch_array($result)) {
					$name = $row['name'];
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

	function admin_select($conn,$value)
	{
		$email= $value['email'];
		$password= md5($value['password']);
		
		$sql= "SELECT * FROM `admin` WHERE `email`='".$email."' AND `password` = '".$password."'";

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

	function admin_session($conn,$value)
	{
		$_SESSION['id'] = admin_get_id($conn,$value);
		$_SESSION['name'] = admin_get_name($conn,$_SESSION['id']);
		$_SESSION['type'] = 'Admin'; 
	}

	function blog_insert($conn,$value,$filevalue)
	{
		$blogTitle = $value['blogTitle'];
		$blogImage_temp_name = $filevalue['blogImage']['tmp_name'];
	    $blogImage_extension = pathinfo($filevalue['blogImage']['name'],PATHINFO_EXTENSION);
	    $blogImage_name = time().'.'.$blogImage_extension;
	    $url = Blog_Image_Upload_Url.$blogImage_name;
	    move_uploaded_file($blogImage_temp_name, $url);
		$blogDescription = $value['blogDescription'];
		$sql= "INSERT INTO `blog` (`image`, `heading`, `description`) VALUES ('".$blogImage_name."','".$blogTitle."','".$blogDescription."')";
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

	function blog_update($conn,$value,$filevalue,$id)
	{	
		$blogTitle = $value['blogTitle'];
		$blogImage_temp_name = $filevalue['blogImage']['tmp_name'];
	    $blogImage_extension = pathinfo($filevalue['blogImage']['name'],PATHINFO_EXTENSION);
	    $blogImage_name = time().'.'.$blogImage_extension;
	    $url = Blog_Image_Upload_Url.$blogImage_name;
	    move_uploaded_file($blogImage_temp_name, $url);
		$blogDescription = $value['blogDescription'];
		$sql= "UPDATE `blog` SET `image` = '".$blogImage_name."', `heading` = '".$blogTitle."', `description` = '".$blogDescription."' WHERE `id` = '".$id."'";
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

	function admin_total_candidate($conn,$limit='',$status='',$desc='',$employee_name='',$employee_location='')
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

	function company_change_status($conn ,$company_id ,$status)
	{
		$sql = "UPDATE `company` SET `status`='".$status."' WHERE `id` = '".$company_id."'";
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

	function candidate_change_status($conn ,$post_id ,$status)
	{
		$sql = "UPDATE `employee` SET `status`='".$status."' WHERE `id` = '".$post_id."'";
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

	function admin_total_apply_counter($conn ,$company_id='',$status='')
	{
		$sql = "SELECT * FROM `job_apply`,`job_post` WHERE `job_apply`.`job_post_id` = `job_post`.`id` AND `job_post`.`created_by` = '".$company_id."'";
		if($status){
			$sql .= " AND `job_apply`.`round_status` = '".$status."' ";
		}
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			return mysqli_num_rows($result);
		}
		else
		{
			return false;
		}
	}
	function contact_list($conn)
	{
		$sql = "SELECT * FROM `contact` ORDER BY `read_unread_status`,`created_time` DESC";
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
			return false;
		}
	}
	function fetch_contact_details($conn,$id){
		$sql = "SELECT * FROM `contact` WHERE `id` = '".$id."'";
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
	function contact_change_status($conn ,$post_id ,$status)
	{
		$sql = "UPDATE `contact` SET `read_unread_status`='".$status."' WHERE `id` = '".$post_id."'";
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
	function testimonial_list($conn)
	{
		$sql = "SELECT * FROM `testimonial` ORDER BY `id` DESC";
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
			return false;
		}
	}
	function fetch_testimonial_details($conn,$id){
		$sql = "SELECT * FROM `testimonial` WHERE `id` = '".$id."'";
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
	function testimonial_insert($conn,$value,$filevalue)
	{
		$personName = $value['personName']; 
        $personDesignation = $value['personDesignation']; 
        $personImage = $filevalue['personImage'];
        $personImage_temp_name = $filevalue['personImage']['tmp_name'];
	    $personImage_extension = pathinfo($filevalue['personImage']['name'],PATHINFO_EXTENSION);
	    $personImage_name = time().'.'.$personImage_extension;
	    $url = Testimonial_Image_Upload_Url.$personImage_name;
	    move_uploaded_file($personImage_temp_name, $url);
        $personMessage = $value['personMessage'];
		$sql= "INSERT INTO `testimonial` (`person_name`, `person_designation`, `person_image`, `person_message`) VALUES ('".$personName."','".$personDesignation."','".$personImage_name."','".$personMessage."')";
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

	function testimonial_update($conn,$value,$filevalue,$id)
	{	
		$personName = $value['personName']; 
        $personDesignation = $value['personDesignation']; 
        $personImage = $filevalue['personImage'];
        $personImage_temp_name = $filevalue['personImage']['tmp_name'];
	    $personImage_extension = pathinfo($filevalue['personImage']['name'],PATHINFO_EXTENSION);
	    $personImage_name = time().'.'.$personImage_extension;
	    $url = Testimonial_Image_Upload_Url.$personImage_name;
	    move_uploaded_file($personImage_temp_name, $url);
        $personMessage = $value['personMessage'];
		$sql= "UPDATE `testimonial` SET `person_name` = '".$personName."', `person_designation` = '".$personDesignation."', `person_image` = '".$personImage_name."', `person_message` = '".$personMessage."' WHERE `id` = '".$id."'";
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
?>