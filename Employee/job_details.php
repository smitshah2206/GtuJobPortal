    <?php
      $titlename = "Job Details";
      include 'header.php';
      if(isset($_GET['post_id'])){
        $id = $_GET['post_id'];
        $current_job_details_check = fetch_job_details($conn,$id);
        $current_job_details_check_count = mysqli_num_rows($current_job_details_check);
        if($current_job_details_check_count > 0){
          $current_job_details = mysqli_fetch_array($current_job_details_check);
          $round_status = fetch_current_employee_round_status($conn,$current_job_details['id'],$_SESSION['id']);
          if(mysqli_num_rows($round_status) > 0){
            $round_message = mysqli_fetch_array($round_status);
          }
        }else{
          $msg = 'Something Went wrong !';
          $link = 'index.php';
          redirect_link($msg,$link);
        }
      }else{
        $link = 'index.php';
        redirect_link('',$link);
      }
      $allpost_job = employee_total_post_job($conn,10,'job_deadlinedate');
    ?>
    <link rel="stylesheet" type="text/css" href="../css/extra_style.css">
    <style type="text/css">
      .btn:not(:disabled):not(.disabled) {
        cursor: pointer;
      }

      .btn.btn-primary {
        background: #157efb !important;
        border: 1px solid #157efb !important;
        color: #fff !important;
      }
      .btn {
        cursor: pointer;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
      }
      .pb-2, .py-2 {
        padding-bottom: 0.5rem !important;
      }
      .pt-2, .py-2 {
        padding-top: 0.5rem !important;
      }
      .mr-1, .mx-1 {
        margin-right: 0.25rem !important;
      }
      .btn-primary {
        color: #212529;
        background-color: #78d5ef;
        border-color: #78d5ef;
      }
      .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        -o-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
      }
      a{
        color: #157efb;
      }
      a:hover, a:focus {
        text-decoration: none;
        color: #157efb;
        outline: none !important; }
        .d-md-flex
        {
          margin-top: 0;
        }
      </style>
    <?php
      include 'navigation.php';
    ?>
    <section class="ftco-section bg-light" style="padding: 0; padding-top: 7rem;">
      <div class="job-post-company pt-20 pb-20">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-xl-7 col-lg-8">

              <div class="single-job-items mb-50">
                <div class="job-items">
                  <div class="company-img company-img-details">
                    <a href="<?php echo $current_job_details['company_website']; ?>" target = "_blank"><img src="<?php echo Company_Logo_Url.$current_job_details['company_logo']; ?>" alt="<?php echo $current_job_details['company_name']; ?>" style = 'background-size: cover;width:85px;height:85px;'></a>
                  </div>
                  <div class="job-tittle">
                    <!-- <a href="#">
                      <h4><?php echo $current_job_details['job_title']; ?></h4>
                    </a> -->
                    <div class="job-post-item-header d-flex align-items-center mb-3">
                        <h2 class="mr-3 mb-0 text-black h3"><?php echo $current_job_details['job_title'];?></h2>
                        <div class="badge-wrap">
                         <span class="<?php echo color_label($current_job_details['job_type']); ?> text-white badge py-2 px-3"><?php echo $current_job_details['job_type'];?></span>
                        </div>
                      </div>
                    <ul>
                      <a href="<?php echo $current_job_details['company_website']; ?>">
                        <li><?php echo $current_job_details['company_name']; ?></li>
                      </a>
                      <li><i class="fas fa-map-marker-alt"></i><?php echo $current_job_details['job_location']; ?></li>
                      <li><?php echo $current_job_details['job_ctc']; ?> INR</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="job-post-details">
                <div class="post-details1 mb-50">

                  <div class="small-section-tittle">
                    <h4>Job Description</h4>
                  </div>
                  <p><?php echo $current_job_details['job_description']; ?></p>
                </div>
                <div class="post-details2  mb-50">
                  <div class="small-section-tittle">
                    <h4>Required Knowledge, Skills, and Abilities</h4>
                  </div>
                  <ul>
                    <?php
                      $job_eligiblity_arr = explode(PHP_EOL,$current_job_details['job_eligiblity']);
                      foreach ($job_eligiblity_arr as $row) {
                        ?>
                          <li><?php echo $row; ?></li>
                        <?php
                      }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4">
              <div class="post-details3  mb-50">

                <div class="small-section-tittle">
                  <h4>Job Overview</h4>
                </div>
                <ul>
                  <li>Location : <span><?php echo $current_job_details['job_location']; ?></span></li>
                  <li>Vacancy : <span><?php echo $current_job_details['job_vacancies']; ?></span></li>
                  <li>Job nature : <span><?php echo $current_job_details['job_type']; ?></span></li>
                  <li>Salary : <span><?php echo $current_job_details['job_ctc']; ?> INR</span></li>
                  <li>Last Application date : <span><?php echo $current_job_details['job_deadlinedate']; ?></span></li>
                  <?php

                    if (isset($round_message['message']) && $round_message['message'] != 'Applied') {
                      ?>
                        <li>Exam Url : <span><a href="<?php echo $current_job_details['exam_url']; ?>" target="_blank">Click Here</a></span></li>
                      <?php
                    }
                  ?>
                </ul>
                <div class="apply-btn2">
                  <?php
                    if(isset($round_message)){
                      ?>
                        <span class="btn" style="opacity: 0.5"><?php echo $round_message['message']; ?></span>
                      <?php
                    }else{
                      $currentDate = date('Y-m-d');
                      if ($current_job_details['job_deadlinedate'] >= $currentDate){
                        ?>
                          <a href="job_applied.php?post_id=<?php echo $current_job_details['id']; ?>" class="btn" >Apply Now</a>
                        <?php
                      } else {
                        ?>
                          <a href="javascript:void(0)" class="btn disabled" >Apply Now</a>
                        <?php
                      }
                    }
                  ?>
                </div>
              </div>
              <div class="post-details4  mb-50">

                <div class="small-section-tittle">
                  <h4>Company Information</h4>
                </div>
                <span><?php echo $current_job_details['company_name']; ?></span>
                <p><?php echo $current_job_details['company_about'];?></p>
                <ul>
                  <li>Name: <span><?php echo $current_job_details['company_name']; ?></span></li>
                  <li>Web : <span style="word-break: break-all;display: initial;"><a href="<?php echo $current_job_details['company_website']; ?>"><?php echo $current_job_details['company_website']; ?></a></span></li>
                  <li>Email: <span><?php echo $current_job_details['email'];?></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light" style="padding: 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-4"><span>Related</span> Jobs</h2>
          </div>
        </div>
        <div class="row">
          <?php
            $allpost_job_count = 0;
            while ($row = mysqli_fetch_array($allpost_job)) 
            {
              $allpost_job_count += 1;
              $color_value = color_label($row['job_type']);
              ?>
                <div class="col-md-12 ftco-animate">

                  <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                    
                    <div class="d-flex mr-5">
                      <a href="<?php echo $row['company_website']; ?>" target = "_blank"><img src="<?php echo Company_Logo_Url.$row['company_logo']; ?>" alt="<?php echo $row['company_name']; ?>" style = 'background-size: cover;width:70px;height:70px;'></a>
                    </div>

                    <div class="mb-4 mb-md-0 mr-5">
                      <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h3"><?php echo $row['job_title'];?></h2>
                        <div class="badge-wrap">
                         <span class="<?php echo $color_value; ?> text-white badge py-2 px-3"><?php echo $row['job_type'];?></span>
                        </div>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="<?php echo $row['company_website'];?>" target="_blank"><?php echo $row['company_name'];?></a></div>
                        <div><span class="icon-my_location"></span> <span><?php echo $row['job_location'];?></span></div>
                      </div>
                    </div>
                    <div class="ml-auto d-flex justify-content-center align-items-center flex-column">
                      <a href="job_details.php?post_id=<?php echo $row['id']; ?>" class="btn btn-primary py-2 mr-1">More Details</a>
                      <span><?php echo date("F d, Y",strtotime($row['job_deadlinedate']));?></span>
                    </div>
                  </div>
                </div>
              <?php
            } 
            if($allpost_job_count < 10)
            {
              ?>
                <div class="col-md-12 ftco-animate">

                  <div class="p-4 d-block align-items-center">
                    <div class="justify-content-center align-items-center d-flex">
                      <a href="findjob.php" class="btn btn-success py-2 mr-1">Find More Job</a>
                    </div>
                  </div>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </section>

    <?php
      include 'footer.php';
    ?>