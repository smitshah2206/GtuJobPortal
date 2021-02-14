
    <?php
      $titlename = "Candidate Details";
      include 'header.php';
      if(isset($_GET['employee_id'])){
        $employee_id = $_GET['employee_id'];
        $current_employee_details_check = fetch_employee_details($conn,$employee_id);
        $current_employee_details_check_count = mysqli_num_rows($current_employee_details_check);
        if($current_employee_details_check_count > 0){
          $current_employee_details = mysqli_fetch_array($current_employee_details_check);

          $total_apply_counter = total_apply_counter($conn,$employee_id);
          $total_got_aptitude_counter = total_apply_counter($conn,$employee_id,2);
          $total_got_interview_counter = total_apply_counter($conn,$employee_id,3);
          $total_got_offer_counter = total_apply_counter($conn,$employee_id,4);
          
          if (!$total_apply_counter) {
            $total_apply_counter = 0;
          }
          if (!$total_got_aptitude_counter) {
            $total_got_aptitude_counter = 0;
          }
          if (!$total_got_interview_counter) {
            $total_got_interview_counter = 0;
          }
          if (!$total_got_offer_counter) {
            $total_got_offer_counter = 0;
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
        .post-details4 ul li span{
          font-size: 15px;
        }
      </style>
    <?php
      include 'navigation.php';
    ?>
    <section class="ftco-section bg-light" style="padding: 0; padding-top: 7rem;">
      <div class="job-post-company pt-20 pb-20">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-xl-8 col-lg-8">

              <div class="single-job-items mb-50">
                <div class="job-items">
                  <div class="company-img company-img-details">
                   <!-- <a href="<?php echo $current_employee_details['company_website']; ?>" target = "_blank"><img src="<?php echo Company_Logo_Url.$current_employee_details['company_logo']; ?>" alt="<?php echo $current_employee_details['company_name']; ?>" style = 'background-size: cover;width:85px;height:85px;'></a> -->
                  </div>
                  <div class="job-tittle">
                    <!-- <a href="#">
                      <h4><?php echo $current_job_details['job_title']; ?></h4>
                    </a> -->
                    <div class="job-post-item-header d-flex align-items-center mb-3">
                        <h2 class="mr-3 mb-0 text-black h3"><?php echo $current_employee_details['firstname'].' '.$current_employee_details['middlename'].' '.$current_employee_details['lastname'];?></h2>
                        <div class="badge-wrap">
                         <!-- <span class="<?php echo color_label($current_company_details['job_type']); ?> text-white badge py-2 px-3"><?php echo $current_company_details['job_type'];?></span> -->
                        </div>
                      </div>
                    <ul>
                      <li><?php echo $current_employee_details['colleagename']; ?></li>
                      <li><i class="fas fa-map-marker-alt"></i><?php echo $current_employee_details['district'].','.$current_employee_details['state']; ?></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="job-post-details">
                <div class="post-details1 mb-50">

                  <div class="small-section-tittle">
                    <h4>Personal Bio</h4>
                  </div>
                  <p><?php echo $current_employee_details['coverletter']; ?></p>
                </div>
                <div class="post-details2  mb-50">
                  <div class="small-section-tittle">
                    <h4>Education Overview</h4>
                  </div>
                  <table class="table table-hover" id="resultTable">
                  <thead class="thead-dark" id="resultTableHead">
                    <tr>
                      <th scope="col">Passout Year</th>
                      <th scope="col">Board Name</th>
                      <th scope="col">Colleage Name / School Name</th>
                      <th scope="col">SGPA / %</th>
                    </tr>
                  </thead>
                  <tbody class="text-dark" id="resultTableBody">
                    <tr>
                      <td><?php echo $current_employee_details['graduationyear'];?></td>
                      <td>Gujarat Technical University</td>
                      <td><?php echo $current_employee_details['colleagename'];?></td>
                      <td><?php echo $current_employee_details['sgpa'];?></td>
                    </tr>
                    <tr>
                      <td><?php echo $current_employee_details['hscyear'];?></td>
                      <td><?php echo $current_employee_details['hscboardname'];?></td>
                      <td><?php echo $current_employee_details['hscschoolname'];?></td>
                      <td><?php echo $current_employee_details['hsccgpa'];?></td>
                    </tr>
                    <tr>
                      <td><?php echo $current_employee_details['sscyear'];?></td>
                      <td><?php echo $current_employee_details['sscboardname'];?></td>
                      <td><?php echo $current_employee_details['sscschoolname'];?></td>
                      <td><?php echo $current_employee_details['ssccgpa'];?></td>
                    </tr>
                  </tbody>
                </table>
                </div>
                <div class="post-details2  mb-50">
                  <div class="small-section-tittle">
                    <h4>Performance Overview</h4>
                  </div>
                  <ul>
                    <li>Total Applied Company: <span><?php echo $total_apply_counter; ?></span></li>
                    <li>Selected for offer-letter: <span><?php echo $total_got_offer_counter; ?></span></li>
                    <li>Selected for Interview: <span><?php echo $total_got_interview_counter; ?></span></li>
                    <li>Selected for Apptitude: <span><?php echo $total_got_aptitude_counter; ?></span></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4">
              <div class="post-details4  mb-5" style="border: 1px solid #ededed;padding: 15px 30px; ">

                <div class="small-section-tittle">
                  <h4>Personal Information</h4>
                </div>
                <span><?php echo $current_employee_details['firstname'].' '.$current_employee_details['middlename'].' '.$current_employee_details['lastname'];?></span>
                <p><?php echo $current_employee_details['coverletter'];?></p>
                <ul>
                  <li>Name: <span><?php echo $current_employee_details['firstname'].' '.$current_employee_details['middlename'].' '.$current_employee_details['lastname'];?></span></li>
                  <li>Email: <span><?php echo $current_employee_details['email'];?></span></li>
                  <li>Contact Number: <span><?php echo '+91-'.$current_employee_details['contactnumber'];?></span></li>
                  <li>Resume : <span style="word-break: break-all;display: initial;">
                    <?php
                      if (isset($current_employee_details['resume']) && !empty(trim($current_employee_details['resume'])) ) {
                        ?>
                        <a href="<?php echo Employee_Cv_Url.$current_employee_details['resume']; ?>" target="_blank">Click Here</a>
                        <?php    
                      } else {
                        ?>
                        <a href="">Not available</a>
                        <?php
                      }
                    ?>
                    </span></li>
                </ul>
              </div>
              <div class="post-details3  mb-50">

                <div class="small-section-tittle">
                  <h4>Social Media</h4>
                </div>
                <ul>
                  <li>Github: <span><a href="<?php echo $current_employee_details['github']; ?>" target="_blank"><?php echo $current_employee_details['github']; ?></a> </span></li>
                  <li>LinkedIn: <span><a href="<?php echo $current_employee_details['linkedin']; ?>" target="_blank"><?php echo $current_employee_details['linkedin']; ?></a></span></li>
                  <li>Skype: <span><a href="<?php echo $current_employee_details['skype']; ?>" target="_blank"><?php echo $current_employee_details['skype']; ?></a></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
      include 'footer.php';
    ?>