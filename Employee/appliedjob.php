    <?php
      include 'header.php';
      $recent_applied_job = total_apply_job($conn,$_SESSION['id'],10,'`job_apply`.`id`');
    ?>
    <style type="text/css">
      .ftco-navbar-light .navbar-nav > .nav-item:nth-child(2) > .nav-link
      {
        color: #95a5a6;
      }
      .ftco-navbar-light.scrolled .nav-item:nth-child(2) > a
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

    <section class="ftco-section bg-light" style="padding: 1rem 0;margin-top: 7rem;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <span class="subheading">Recently Applied Jobs</span>
            <h2 class="mb-4"><span>Recent Applied</span> Jobs</h2>
          </div>
        </div>
        <div class="row">
          <?php
            $recent_applied_job_count = 0;
            while ($row = mysqli_fetch_array($recent_applied_job)) 
            {
              $recent_applied_job_count += 1;
              $color_value = color_label($row['job_type']);
              $round_color_value = color_label($row['message']);
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
                      <span class="<?php echo $round_color_value; ?>"><?php echo $row['message'];?></span>
                    </div>
                  </div>
                </div>
              <?php
            } 
            if($recent_applied_job_count < 10)
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