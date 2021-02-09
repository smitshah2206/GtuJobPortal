<?php
  include 'header.php';
  $job_category = '';
  $job_type = '';
  $job_location = '';

  $fullTimeValidation = '';
  $partTimeValidation = '';
  $freelanceValidation = '';
  $internshipValidation = '';
  if (isset($_GET['job_category'])){
    $job_category = trim($_GET['job_category']);
  } 
  if (isset($_GET['job_type'])) {
    $job_type = trim($_GET['job_type']);
    if ($job_type == 'Full Time') {
      $fullTimeValidation = "selected";
    } else if ($job_type == 'Part Time') {
      $partTimeValidation = "selected";
    } else if ($job_type == 'Freelance') {
      $freelanceValidation = "selected";
    } else if ($job_type == 'Internship') {
      $internshipValidation = "selected";
    }
  }
  if (isset($_GET['job_location'])) {
    $job_location = trim($_GET['job_location']);
  }

  $allpost_job = employee_total_post_job($conn,10,'job_deadlinedate',$job_category,$job_type,$job_location);
  $job_category_list = job_category($conn);
  $job_location_list = job_location($conn);
?>
  <style type="text/css">
    .ftco-navbar-light .navbar-nav > .nav-item:nth-child(4) > .nav-link
    {
      color: #95a5a6;
    }
    .ftco-navbar-light.scrolled .nav-item:nth-child(4) > a
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

<div class="ftco-search" style="margin-top: 7rem;">
  <div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10 tab-wrap">
      <div class="tab-content p-4" id="v-pills-tabContent">

        <div class="tab-pane show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
            <form action="postjob.php" class="search-job">
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <div class="form-field">
                        <div class="icon">
                          <span class="icon-briefcase"></span>
                        </div>
                        <input type="text" class="form-control" name="job_category" placeholder="eg. Garphic. Web Developer" value="<?php echo $job_category; ?>" list="job_category" autocomplete="off">
                                <datalist id="job_category">
                                  <?php
                                    while ($row = mysqli_fetch_array($job_category_list)){
                                      ?>
                                        <option value="<?php echo $row['job_title'];?>">
                                      <?php
                                     } 
                                  ?>
                                </datalist>
                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <div class="form-field">
                        <div class="select-wrap">
                          <div class="icon">
                            <span class="ion-ios-arrow-down"></span>
                          </div>
                          <select name="job_type" id="" class="form-control">
                            <option value="Full Time" <?php echo $fullTimeValidation; ?>>Full Time</option>
                            <option value="Part Time" <?php echo $partTimeValidation; ?>>Part Time</option>
                            <option value="Freelance" <?php echo $freelanceValidation; ?>>Freelance</option>
                            <option value="Internship" <?php echo $internshipValidation; ?>>Internship</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <div class="form-field">
                        <div class="icon">
                          <span class="icon-map-marker"></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Location" name="job_location" value="<?php echo $job_location; ?>" autocomplete="off" list="job_location">
                        <datalist id="job_location">
                                  <?php
                                    while ($row = mysqli_fetch_array($job_location_list)){
                                      ?>
                                        <option value="<?php echo $row['job_location'];?>">
                                      <?php
                                     } 
                                  ?>
                                </datalist>
                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <div class="form-field">
                        <input type="submit" value="Search" class="form-control btn btn-primary">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section bg-light" style="padding: 1rem 0;">
  <div class="container">
    <div class="row">
      <div class="col-md-12 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
        <h2 class="mb-4"><span>Recent Post</span> Jobs</h2>
      </div>
    </div>
    <div class="row">
      <?php
      while ($row = mysqli_fetch_array($allpost_job)) 
      {
        $color_value = color_label($row['job_type']);
        ?>
        <div class="col-md-12 ftco-animate">

          <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
            <div class="d-flex mr-5">
              <a href="<?php echo $row['company_website']; ?>" target = "_blank">
                <img src="<?php echo Company_Logo_Url.$row['company_logo']; ?>" alt="<?php echo $row['company_name']; ?>" style = 'background-size: cover;width:70px;height:70px;'>
              </a>
            </div>
            <div class="mb-4 mb-md-0 mr-5">
              <div class="job-post-item-header d-flex align-items-center">
                <h2 class="mr-3 text-black h3"><?php echo $row['job_title'];?></h2>
                <div class="badge-wrap">
                 <span class="<?php echo $color_value; ?> text-white badge py-2 px-3"><?php echo $row['job_type'];?></span>
               </div>
             </div>
             <div class="job-post-item-body d-block d-md-flex">
              <div class="mr-3">
                <span class="icon-layers"></span> 
                <a href="<?php echo $row['company_website'];?>" target="_blank"><?php echo $row['company_name'];?></a>
              </div>
              <div>
                <span class="icon-my_location"></span> 
                <span><?php echo $row['job_location'];?></span>
              </div>
            </div>
          </div>
          <div class="ml-auto d-flex">
            <a href="job_details.php?post_id=<?php echo $row['id']; ?>" class="btn btn-primary py-2 mr-1">More Details</a>
          </div>
        </div>
        </div>
        <?php
      }
      ?>
      <div class="col-md-12 ftco-animate">
        <div class="p-4 d-block align-items-center">
          <div class="justify-content-center align-items-center d-flex">
            <a href="" class="btn btn-success py-2 mr-1">More Job Coming Soon</a>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
      include 'footer.php';
    ?>