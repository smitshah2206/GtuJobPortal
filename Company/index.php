    <?php
      $titlename = "Home Page";
      include 'header.php';
      $total_post_job_counter = total_post_job_counter($conn,$_SESSION['id']);
      $total_candidate_counter = total_candidate_counter($conn,$_SESSION['id']);
      $total_selected_candidate_counter = total_candidate_counter($conn,$_SESSION['id'],4);
      $total_got_interview_candidate_counter = total_candidate_counter($conn,$_SESSION['id'],3);

      $newset_job = total_post_job($conn,$_SESSION['id'],4,'id');
      $allpost_job = total_post_job($conn,$_SESSION['id'],10,'`job_post`.`created_time`');

    ?>
    <style type="text/css">
      .ftco-navbar-light .navbar-nav > .nav-item:nth-child(1) > .nav-link
      {
        color: #95a5a6;
      }
      .ftco-navbar-light.scrolled .nav-item:nth-child(1) > a
      {
        color: #157efb !important;
      }
      .d-md-flex
      {
        margin-top: 0;
      }
    </style>
    <?php
      include 'navigation.php';
    ?>
    <!-- END nav -->
    
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-color: #1c60a5;padding: 1rem 0;margin-top:7%;" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_post_job_counter; ?>"><?php echo $total_post_job_counter; ?></strong>
                    <span>Post a Job</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_candidate_counter; ?>"><?php echo $total_candidate_counter; ?></strong>
                    <span>Total Candidate</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_selected_candidate_counter; ?>"><?php echo $total_selected_candidate_counter; ?></strong>
                    <span>Selected Candidate</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_got_interview_candidate_counter; ?>"><?php echo $total_got_interview_candidate_counter; ?></strong>
                    <span>Got the Interview</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light" style="padding: 1rem 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <span class="subheading">Recently Post Jobs</span>
            <h2 class="mb-4"><span>New Post a</span> Jobs</h2>
          </div>
        </div>
        <div class="row">
          <?php
            $newset_job_count = 0;
            while ($row = mysqli_fetch_array($newset_job)) 
            {
              $newset_job_count += 1;
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
                        <div><span class="icon-my_location"></span> <span><?php echo $row['job_location'];?></span></div>
                      </div>
                    </div>

                    
                    <div class="ml-auto d-flex justify-content-center align-items-center flex-column">
                      <div class="ml-auto d-flex">
                        <a href="createnewpost.php?post_id=<?php echo $row['id']; ?>" class="btn btn-warning py-2 mr-1">Edit Details</a>
                        <a href="job_details.php?post_id=<?php echo $row['id']; ?>" class="btn btn-primary py-2 mr-1">More Details</a>
                      </div>
                      <span><?php echo date("F d, Y",strtotime($row['job_deadlinedate']));?></span>
                    </div>
                  </div>
                </div>
              <?php
            } 
            if($newset_job_count < 4)
            {
              ?>
                <div class="col-md-12 ftco-animate">

                  <div class="p-4 d-block align-items-center">
                    <div class="justify-content-center align-items-center d-flex">
                      <a href="createnewpost.php" class="btn btn-success py-2 mr-1">Create a New Post</a>
                    </div>
                  </div>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </section>


    <section class="ftco-section bg-light" style="padding: 1rem 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-4"><span>All Post a</span> Jobs</h2>
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
                        <div><span class="icon-my_location"></span> <span><?php echo $row['job_location'];?></span></div>
                      </div>
                    </div>
                    
                    <div class="ml-auto d-flex justify-content-center align-items-center flex-column">
                      <div class="ml-auto d-flex">
                        <a href="createnewpost.php?post_id=<?php echo $row['id']; ?>" class="btn btn-warning py-2 mr-1">Edit Details</a>
                        <a href="job_details.php?post_id=<?php echo $row['id']; ?>" class="btn btn-primary py-2 mr-1">More Details</a>
                      </div>
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
                      <a href="createnewpost.php" class="btn btn-success py-2 mr-1">Create a New Post</a>
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