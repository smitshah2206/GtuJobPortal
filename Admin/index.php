    <?php
      $titlename = "Home Page";
      include 'header.php';
      $total_candidate = total_candidate($conn,4,2);
      $allpost_job = total_company($conn,4,2);

      $total_candidate_counter = total_candidate_counter($conn);
      $total_apply_counter = total_apply_counter($conn,'');
      $total_got_aptitude_counter = total_apply_counter($conn,'',2);
      $total_got_interview_counter = total_apply_counter($conn,'',3);
      $total_got_offer_counter = total_apply_counter($conn,'',4);

      $total_company_counter = total_company_counter($conn);
      $total_post_job_counter = total_post_job_counter($conn);
      $total_job_vacancies_counter = total_job_vacancies_counter($conn);
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
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-1 d-flex justify-content-center counter-wrap ftco-animate">
              </div>
              <div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_candidate_counter;?>"><?php echo $total_candidate_counter;?></strong>
                    <span>Total Candidate</span>
                  </div>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_apply_counter;?>"><?php echo $total_apply_counter;?></strong>
                    <span>Applied For a Job</span>
                  </div>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_got_aptitude_counter;?>"><?php echo $total_got_aptitude_counter;?></strong>
                    <span>Got the Aptitude</span>
                  </div>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_got_interview_counter;?>"><?php echo $total_got_interview_counter;?></strong>
                    <span>Got the Interview</span>
                  </div>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_got_offer_counter;?>"><?php echo $total_got_offer_counter;?></strong>
                    <span>Got the offer letter</span>
                  </div>
                </div>
              </div>
              <div class="col-md-1 d-flex justify-content-center counter-wrap ftco-animate">
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
            <span class="subheading">Recently Added Candidate</span>
            <h2 class="mb-4"><span>Recent Added</span> Candidate</h2>
          </div>
        </div>
        <div class="row">
          <?php
            while ($row = mysqli_fetch_array($total_candidate)) 
            {
              ?>
                <div class="col-md-12 ftco-animate">
                  <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                    <div class="mb-4 mb-md-0 mr-5">
                      <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h3"><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a><?php echo $row['colleagename'];?></a></div>
                        <div><span class="icon-my_location"></span> <span><?php echo $row['district'].','.$row['state'];?></span></div>
                      </div>
                    </div>

                    <div class="ml-auto d-flex">
                      <a href="candidate_details.php?employee_id=<?php echo $row['id']; ?>&status=1" class="btn btn-primary py-2 mr-1">More Details</a>
                    </div>
                  </div>
                </div>
              <?php
            } 
          ?>
          <div class="col-md-12 ftco-animate">
            <div class="p-4 d-block align-items-center">
              <div class="justify-content-center align-items-center d-flex">
                <a href="candidate.php" class="btn btn-success py-2 mr-1">View All Candidate</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-counter img" id="section-counter" style="background-color: #1c60a5;padding: 1rem 0;" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_company_counter;?>"><?php echo $total_company_counter;?></strong>
                    <span>Total Company</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_post_job_counter; ?>"><?php echo $total_post_job_counter; ?></strong>
                    <span>Total Job Post</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_job_vacancies_counter; ?>"><?php echo $total_job_vacancies_counter; ?></strong>
                    <span>Total Vacancies</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="<?php echo $total_got_offer_counter;?>"><?php echo $total_got_offer_counter;?></strong>
                    <span>Selected Candidate</span>
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
            <span class="subheading">Recently Added Company</span>
            <h2 class="mb-4"><span>Recent Added</span> Company</h2>
          </div>
        </div>

        <div class="row">
          <?php
            while ($row = mysqli_fetch_array($allpost_job)) 
            {
              ?>
                <div class="col-md-12 ftco-animate">

                  <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                     <div class="d-flex mr-5">
                      <a href="<?php echo $row['company_website']; ?>" target = "_blank"><img src="<?php echo Company_Logo_Url.$row['company_logo']; ?>" alt="<?php echo $row['company_name']; ?>" style = 'background-size: cover;width:70px;height:70px;'></a>
                    </div>
                    <div class="mb-4 mb-md-0 mr-5">
                      <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h3"><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="<?php echo $row['company_website'];?>" target="_blank"><?php echo $row['company_name'];?></a></div>
                        <div><span class="icon-my_location"></span> <span><?php echo $row['company_district'].','.$row['company_state'];?></span></div>
                      </div>
                    </div>

                    <div class="ml-auto d-flex">
                      <a href="company_details.php?company_id=<?php echo $row['id']; ?>&status=1" class="btn btn-primary py-2 mr-1">More Details</a>
                    </div>
                  </div>
                </div>
              <?php
            } 
          ?>
          <div class="col-md-12 ftco-animate">
            <div class="p-4 d-block align-items-center">
              <div class="justify-content-center align-items-center d-flex">
                <a href="company.php" class="btn btn-success py-2 mr-1">View All Company</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
      include 'footer.php';
    ?>