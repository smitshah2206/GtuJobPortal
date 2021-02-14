<?php
      $titlename = "Apply Job";
      include 'header.php';
      if(employee_get_status($conn,$_SESSION['id']) == 1)
      {
        redirect_link('','editprofile.php');
      }else{
      	if(isset($_GET['id'])){
      		$job_post_id = $_GET['id'];
      		$employee_id = $_SESSION['id'];
      		if(employee_apply_job($conn,$job_post_id,$employee_id)){
      			redirect_link('Applied Job Sucessfully . !','appliedjob.php');
      		}else{
      			redirect_link('Some thing went wrong .!','index.php');
      		}
      	}else{
      		redirect_link('','index.php');
      	}
      }
?>