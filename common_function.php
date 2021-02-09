<?php
	session_start();

	define('ROOT_FOLDER', 'GtuJobPortal');
	define('PROTOCOL_SECURE', $_SERVER['REQUEST_SCHEME']);
	define('HOST_NAME', $_SERVER['SERVER_NAME']);
	define('BASE_URL', PROTOCOL_SECURE.'://'.HOST_NAME.'/'.ROOT_FOLDER.'/');
	
	define('Company_Logo_Url', PROTOCOL_SECURE.'://'.HOST_NAME.'/'.ROOT_FOLDER.'/CompanyLogo/');
	define('Employee_Cv_Url', PROTOCOL_SECURE.'://'.HOST_NAME.'/'.ROOT_FOLDER.'/Cv/');
	define('Blog_Image_Url', PROTOCOL_SECURE.'://'.HOST_NAME.'/'.ROOT_FOLDER.'/BlogImage/');
	define('Company_Logo_Upload_Url', '../CompanyLogo/');
	define('Employee_Cv_Upload_Url', '../Cv/');
	define('Blog_Image_Upload_Url', '../BlogImage/');
	function dashboard_session()
	{
		if(isset($_SESSION['type']))
		{
			if($_SESSION['type'] == 'Employee')
			{
				if(! (dirname($_SERVER['PHP_SELF']) == '/GtuJobPortal/Employee' ) )
				{
					redirect_link('',BASE_URL.'Employee/index.php');
				}
			}
			else if($_SESSION['type'] == 'Company')
			{
				if(! (dirname($_SERVER['PHP_SELF']) == '/GtuJobPortal/Company' ) )
				{
					redirect_link('',BASE_URL.'Company/index.php');
				}
			}
			else if($_SESSION['type'] == 'Admin')
			{
				if(! (dirname($_SERVER['PHP_SELF']) == '/GtuJobPortal/Admin' ) )
				{
					redirect_link('',BASE_URL.'Admin/index.php');
				}
			}
		}
		else
		{
			if((dirname($_SERVER['PHP_SELF']) == '/GtuJobPortal/Employee') OR (dirname($_SERVER['PHP_SELF']) == '/GtuJobPortal/Company') )
			{
				redirect_link('',BASE_URL.'signin.php');
			}
			elseif ((dirname($_SERVER['PHP_SELF']) == '/GtuJobPortal/Admin')) {
				redirect_link('',BASE_URL.'admin_signin.php');
			}
			redirect_link('',BASE_URL);
		}
	}

	function index_session()
	{
		if(isset($_SESSION['type']))
		{
			if($_SESSION['type'] == 'Employee')
			{
				redirect_link('','Employee/index.php');
			}
			else if($_SESSION['type'] == 'Company')
			{
				redirect_link('','Company/index.php');
			}
			else if($_SESSION['type'] == 'Admin')
			{
				redirect_link('','Admin/index.php');
			}
		}
	}

	function input_data($data) 
	{
	  
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	function redirect_link($msg='',$link)
	{
		?>
			<script type="text/javascript">
				<?php
					if(isset($msg) && $msg != '')
					{
				?>
						alert('<?php echo $msg;?>');
				<?php
					}
				?>
				window.location.href = '<?php echo $link;?>';
			</script>
		<?php
	}

	function session_close()
	{
		session_destroy();
	}

	function contact_insert($conn,$value)
	{
		$name = $value['name'];
		$email = $value['email'];
		$subject = $value['subject'];
		$message = $value['message'];

		$sql= "INSERT INTO `contact` (`name`, `email`, `subject`, `message`, `status`) VALUES ('".$name."','".$email."','".$subject."','".$message."','4')";
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

	function color_label($value)
	{
		switch ($value) 
		{
			case 'Part Time':
				return 'bg-primary';
				break;
			case 'Full Time':
				return 'bg-warning';
				break;
			case 'Freelance':
				return 'bg-info';
				break;
			case 'Internship':
				return 'bg-secondary';
				break;
			case 'Applied':
				return 'text-dark';
				break;
			case 'Apptitude':
				return 'text-primary';
				break;
			case 'Interview':
				return 'text-warning';
				break;
			case 'Selected':
				return 'text-success';
				break;
			case 'Rejected':
				return 'text-danger';
				break;
			default:
				return 'bg-dark';
				break;
		}
	}

	function total_index_job($conn,$limit='',$desc='')
	{
		$sql = "SELECT `id`,`job_title`,`job_deadlinedate`,`job_type`,`job_location` FROM `job_post` WHERE status = 4 ";
		
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

	function total_company_counter($conn,$status='')
	{
		$sql = "SELECT * FROM `company` ";
		if($status){
			$sql .= " WHERE `status` = '".$status."' ";
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

	function total_post_job_counter($conn,$id='')
	{
		$sql = "SELECT * FROM `job_post` ";
		if($id){
			$sql .= " WHERE created_by = '".$id."'";
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

	function total_job_vacancies_counter($conn, $company_id='')
	{
		$sql = "SELECT SUM(`job_vacancies`) as `job_vacancies` FROM `job_post`";
		if ($company_id) {
			$sql .= " WHERE `created_by`='".$company_id."'";
		}
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			$row = mysqli_fetch_array($result);
			return $row['job_vacancies'];
		}
		else
		{
			return false;
		}
	}

	function total_candidate_counter($conn,$id='',$round_status_id='')
	{
		if($id){
			$sql = "SELECT * FROM `job_apply`,`job_post` WHERE `job_apply`.`job_post_id` = `job_post`.`id` AND `job_post`.`created_by`='".$id."'";
		}else{
			$sql = "SELECT * FROM `employee`";
		}

		if($round_status_id){
			$sql .= " AND `job_apply`.`round_status` = ".$round_status_id." ";
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

	function job_post_counter($conn,$category)
	{
		$sql = "SELECT count(*) as `count`,`$category` as `title`FROM `job_post` GROUP BY `$category`";
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

	function blog_list($conn ,$limit='')
	{
		$sql = "SELECT * FROM `blog` ORDER BY `created_time` DESC";
		if($limit){
			$sql .= " LIMIT ".$limit." ";
		}
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


	function fetch_job_details($conn,$id){
		$sql = "SELECT `job_post`.`id`,`job_title`,`job_ctc`,`job_deadlinedate`,`job_vacancies`,`job_type`,`job_location`,`job_eligiblity`,`job_description`,`email`,`company_name`,`company_website`,`company_about`,`company_logo` FROM `job_post`, `company` WHERE `job_post`.`id`= '$id' AND `company`.`id` = `job_post`.`created_by`";
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

	function fetch_company_details($conn,$id){
		$sql = "SELECT * FROM `company` WHERE `id` = '".$id."'";
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

	function fetch_employee_details($conn,$id){
		$sql = "SELECT * FROM `employee` WHERE `id` = '".$id."'";
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

	function total_apply_counter($conn,$id='',$status=''){

		$sql = "SELECT * FROM `job_apply`";
		if($id){
			$sql .= " WHERE `employee_id` = '".$id."' ";
		}
		if($status){
			if ($id) {
				$sql .= " AND";
			} else {
				$sql .= " WHERE";
			}
			$sql .= "`round_status` = '".$status."' ";
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

	function job_category($conn,$id='')
	{
		$sql = "SELECT DISTINCT `job_title` FROM `job_post`";
		if ($id) {
			$sql .= " WHERE `created_by` ='".$id."'";
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

	function job_location($conn,$id='')
	{
		$sql = "SELECT DISTINCT `job_location` FROM `job_post`";
		if ($id) {
			$sql .= " WHERE `created_by` ='".$id."'";
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

	function find_candidate($conn)
	{
		$sql = "SELECT DISTINCT `firstname` FROM `employee`";
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

	function find_location($conn)
	{
		$sql = "SELECT DISTINCT `district` FROM `employee` WHERE `district` != '' OR `state` != '' OR `contry` != ''";
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

	function find_company($conn)
	{
		$sql = "SELECT DISTINCT `company_name` FROM `company`";
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

	function find_company_location($conn)
	{
		$sql = "SELECT DISTINCT `company_district` FROM `company` WHERE `company_district` != '' OR `company_state` != '' OR `company_contry` != ''";
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

	function news_letter_insert($conn,$value)
	{
		$email= $value['email'];
		$sql= "INSERT INTO `news_letter` (`email`) VALUES ('".$email."')";
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