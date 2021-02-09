<?php
	include '../common_function.php';
    include '../company_function.php';
    include '../connection.php';
	if(isset($_POST['status_number'])){
		$status_number = $_POST['status_number'];
		$employee_name = $_POST['employee_name'];
		$employee_location = $_POST['employee_location'];
		$total_candidate = total_candidate($conn,'',$status_number,'id',$employee_name,$employee_location);
		$result = '';
		while ($row = mysqli_fetch_array($total_candidate)) {
      $status_button = '';
      if ($row['status'] == 3) {
        $status_button = '<a href="candidate_change_status.php?employee_id='.$row['id'].'&status=2" class="btn btn-warning py-2 mr-1">Active</a>';
      } elseif ($row['status'] == 2) {
        $status_button = '<a href="candidate_change_status.php?employee_id='.$row['id'].'&status=3" class="btn btn-danger py-2 mr-1">Deactive</a>';
      }
			$result .= '<div class="col-md-12">
                  <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                    <div class="mb-4 mb-md-0 mr-5">
                      <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h3">'.$row["firstname"].' '.$row["middlename"].' '.$row["lastname"].'</h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a>'.$row["colleagename"].'</a></div>
                        <div><span class="icon-my_location"></span> <span>'.$row["district"].','.$row["state"].'</span></div>
                      </div>
                    </div>

                    <div class="ml-auto d-flex">
                      '.$status_button.'
                      <a href="candidate_details.php?employee_id='.$row['id'].'&status=1" class="btn btn-primary py-2 mr-1">More Details</a>
                    </div>
                  </div>
                </div>';
        }
        if($result){
        	$output = array(
				'success' =>	true,
				'dataBody'	=>	$result
			);
        }else{
        	$output = array(
				'success' =>false,
				'dataBody'	=>	$result
			);
        }
        echo json_encode($output);
	}else{
		$link = 'index.php';
        redirect_link('',$link);
	}
?>