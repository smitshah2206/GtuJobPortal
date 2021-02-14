    <?php
      $titlename = "Create New Post";
      include 'header.php';
      $id = $_SESSION['id'];

      $job_title_msg = '';
      $job_ctc_msg = '';
      $job_deadlinedate_msg = '';
      $job_vacancies_msg = '';
      $job_type_msg = '';
      $job_location_msg = '';
      $job_url_msg = '';
      $job_eligiblity_msg = '';
      $job_description_msg = '';

      $job_title = '';
      $job_ctc = '';
      $job_deadlinedate = '';
      $job_vacancies = '';
      $job_type = '';
      $job_location = '';
      $job_url = '';
      $job_eligiblity = '';
      $job_description = '';

      if (isset($_GET['post_id']) && !empty(trim($_GET['post_id'])) && $_GET['post_id'] != '' ) {
        $post_id = $_GET['post_id'];
        $currentpost_job = mysqli_fetch_array(company_job_fetch($conn,$post_id));
        $job_title = $currentpost_job['job_title'];
        $job_ctc = $currentpost_job['job_ctc'];
        $job_deadlinedate = $currentpost_job['job_deadlinedate'];
        $job_vacancies = $currentpost_job['job_vacancies'];
        $job_type = $currentpost_job['job_type'];
        $job_location = $currentpost_job['job_location'];
        $job_url = $currentpost_job['exam_url'];
        $job_eligiblity = $currentpost_job['job_eligiblity'];
        $job_description = $currentpost_job['job_description'];
      }
      else if(isset($_POST['submit']))
      {
        $job_title = input_data($_POST['job_title']);
        $job_ctc = input_data($_POST['job_ctc']);
        $job_deadlinedate = input_data($_POST['job_deadlinedate']);
        $job_vacancies = input_data($_POST['job_vacancies']);
        $job_type = input_data($_POST['job_type']);
        $job_location = input_data($_POST['job_location']);
        $job_url = input_data($_POST['job_url']);
        $job_eligiblity = input_data($_POST['job_eligiblity']);
        $job_description = input_data($_POST['job_description']);

        $job_title_validation = 0;
        $job_ctc_validation = 0;
        $job_deadlinedate_validation = 0;
        $job_vacancies_validation = 0;
        $job_type_validation = 0;
        $job_location_validation = 0;
        $job_url_validation = 0;
        $job_eligiblity_validation = 0;
        $job_description_validation = 0;


        if($job_title)
        {
          if (ctype_alpha(str_replace(' ', '', $job_title)))
          {
            $job_title_validation = 0;
          }
          else
          {
            $job_title_msg = 'Only Character is required';
            $job_title_validation = 1;
          }
        }
        else
        {
          $job_title_msg = 'Job Title is required';
          $job_title_validation = 1;
        }

        if($job_ctc)
        {
          $job_ctc_validation = 0;
        }
        else
        {
          $job_ctc_msg = 'Job CTC is required';
          $job_ctc_validation = 1;
        }

        if($job_deadlinedate)
        {
          $job_deadlinedate_validation = 0;
        }
        else
        {
          $job_deadlinedate_msg = 'Job Date is required';
          $job_deadlinedate_validation = 1;
        }

        if($job_location)
        {
          $job_location_validation = 0;
        }
        else
        {
          $job_location_msg = 'Job Location is required';
          $job_location_validation = 1;
        }

        if($job_url)
        {
          if (filter_var($job_url, FILTER_VALIDATE_URL)) {
            $job_url_validation = 0;
          } else {
            $job_url_msg = "Use valid url format.";
            $job_url_validation = 1;
          }
          
        }
        else
        {
          $job_url_msg = 'Exam Url is required';
          $job_url_validation = 1;
        }

        if($job_eligiblity)
        {
          if (strlen($job_eligiblity) < 250) 
          {
            $job_eligiblity_validation = 0;
          }
          else
          {
            $job_eligiblity_msg = 'Less than 250 letter required';
            $job_eligiblity_validation = 1;
          }
        }
        else
        {
          $job_eligiblity_msg = 'Job Eligiblity is required';
          $job_eligiblity_validation = 1;
        }

        if($job_description)
        {
          if (strlen($job_description) < 250) 
          {
            $job_description_validation = 0;
          }
          else
          {
            $job_description_msg = 'Less than 250 letter required';
            $job_description_validation = 1;
          }
        }
        else
        {
          $job_description_msg = 'Job Description is required';
          $job_description_validation = 1;
        }

        if($job_title_validation == 0 && $job_ctc_validation == 0 && $job_deadlinedate_validation == 0 && $job_vacancies_validation == 0 && $job_type_validation == 0 && $job_location_validation == 0 && $job_url_validation == 0 && $job_eligiblity_validation == 0 && $job_description_validation == 0)
        {
          if (isset($_POST['post_id'])) {
            if(company_job_update($conn,$_POST))
            {
              $msg = 'Job Post Updated .!';
              $link = BASE_URL.'Company/postjob.php';
              redirect_link($msg,$link);
            }
            else
            {
              $msg = 'Some thing went wrong .!';
              $link = BASE_URL.'Company/postjob.php';
              redirect_link($msg,$link);
            }
          } else {
            if(company_job_insert($conn,$_POST,$id))
            {
              $msg = 'Job Post Created .!';
              $link = BASE_URL.'Company/postjob.php';
              redirect_link($msg,$link);
            }
            else
            {
              $msg = 'Some thing went wrong .!';
              $link = BASE_URL.'Company/createnewpost.php';
              redirect_link($msg,$link);
            }
          }
        }

      }
      $job_category_list = job_category($conn);
      $job_location_list = job_location($conn);
    ?>
    <?php
      include 'navigation.php';
    ?>

    <div class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-4"><span>Create New </span>Post</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-12 mb-5">
            <form action="createnewpost.php" method="Post" class="p-5 bg-white">
              <?php
                if (isset($post_id)) {
                  ?>
                    <input type="hidden" name="post_id" value="<?php echo $post_id;?>">
                  <?php
                }
              ?>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Job Title</label>
                  <input type="text" id="fullname" class="form-control" placeholder="eg. Professional UI/UX Designer" name="job_title" value="<?php echo $job_title; ?>" list="job_title" autocomplete="off">
                  <datalist id="job_title">
                                  <?php
                                    while ($row = mysqli_fetch_array($job_category_list)){
                                      ?>
                                        <option value="<?php echo $row['job_title'];?>">
                                      <?php
                                     } 
                                  ?>
                                </datalist>
                  <div class="invalid-feedback">
                    <?php echo $job_title_msg; ?>
                  </div>
                </div>
              </div>

              <div class="row form-group mb-5">
                <div class="col-md-12 col-lg-4 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="ctc">CTC ( INR )</label>
                  <input type="text" id="fullname" class="form-control" placeholder="2.50 L - 3.0 L" name="job_ctc" value="<?php echo $job_ctc; ?>">
                  <div class="invalid-feedback">
                    <?php echo $job_ctc_msg; ?>
                  </div>
                </div>
                <div class="col-md-12 col-lg-4 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="deadline">Dead-line Date</label>
                  <input type="date" id="fullname" class="form-control" name="job_deadlinedate" value="<?php echo $job_deadlinedate; ?>">
                  <div class="invalid-feedback">
                    <?php echo $job_deadlinedate_msg; ?>
                  </div>
                </div>
                <div class="col-md-12 col-lg-4 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="numberofvacancies">Number of Vacancies</label>
                  <select id="" class="form-control" name="job_vacancies">
                    <?php
                      if(isset($job_vacancies) && $job_vacancies != '')
                      {
                        ?>
                          <option><?php echo $job_vacancies; ?></option>
                        <?php
                      } 
                    ?>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="More than 5">More than 5</option>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo $job_vacancies_msg; ?>
                  </div>
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 col-lg-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="jobtype">Job Type</label>
                </div>
                  <?php
                    if($job_type == 'Part Time')
                    {
                      ?>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-1">
                          <input type="radio" id="option-job-type-1" name="job_type" class="mr-3" value="Full Time"> Full Time
                        </label>
                      </div>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-2">
                          <input type="radio" id="option-job-type-2" name="job_type" class="mr-3" value="Part Time" checked> Part Time
                        </label>
                      </div>

                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-3">
                          <input type="radio" id="option-job-type-3" name="job_type" class="mr-3" value="Freelance"> Freelance
                      </div>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-4">
                          <input type="radio" id="option-job-type-4" name="job_type" class="mr-3" value="Internship"> Internship
                        </label>
                      </div>
                    <?php
                    }
                    else if($job_type == 'Freelance')
                    {
                      ?>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-1">
                          <input type="radio" id="option-job-type-1" name="job_type" class="mr-3" value="Full Time"> Full Time
                        </label>
                      </div>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-2">
                          <input type="radio" id="option-job-type-2" name="job_type" class="mr-3" value="Part Time"> Part Time
                        </label>
                      </div>

                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-3">
                          <input type="radio" id="option-job-type-3" name="job_type" class="mr-3" value="Freelance" checked> Freelance
                      </div>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-4">
                          <input type="radio" id="option-job-type-4" name="job_type" class="mr-3" value="Internship"> Internship
                        </label>
                      </div>
                    <?php
                    }
                    else if($job_type == 'Internship')
                    {
                      ?>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-1">
                          <input type="radio" id="option-job-type-1" name="job_type" class="mr-3" value="Full Time"> Full Time
                        </label>
                      </div>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-2">
                          <input type="radio" id="option-job-type-2" name="job_type" class="mr-3" value="Part Time"> Part Time
                        </label>
                      </div>

                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-3">
                          <input type="radio" id="option-job-type-3" name="job_type" class="mr-3" value="Freelance"> Freelance
                      </div>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-4">
                          <input type="radio" id="option-job-type-4" name="job_type" class="mr-3" value="Internship" checked> Internship
                        </label>
                      </div>
                    <?php
                    }
                    else
                    {
                      ?>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-1">
                          <input type="radio" id="option-job-type-1" name="job_type" class="mr-3" value="Full Time" checked> Full Time
                        </label>
                      </div>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-2">
                          <input type="radio" id="option-job-type-2" name="job_type" class="mr-3" value="Part Time"> Part Time
                        </label>
                      </div>

                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-3">
                          <input type="radio" id="option-job-type-3" name="job_type" class="mr-3" value="Freelance"> Freelance
                      </div>
                      <div class="col-md-12 col-lg-3 mb-3 mb-md-0">
                        <label for="option-job-type-4">
                          <input type="radio" id="option-job-type-4" name="job_type" class="mr-3" value="Internship"> Internship
                        </label>
                      </div>
                    <?php
                    }
                  ?>
                  <div class="invalid-feedback">
                    <?php echo $job_type_msg; ?>
                  </div>
              </div>

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="location">Location</label>
                  <input type="text" class="form-control" name="job_location" placeholder="Ahmedabad" value="<?php echo $job_location; ?>" list="job_location" autocomplete="off">
                  <datalist id="job_location">
                                  <?php
                                    while ($row = mysqli_fetch_array($job_location_list)){
                                      ?>
                                        <option value="<?php echo $row['job_location'];?>">
                                      <?php
                                     } 
                                  ?>
                                </datalist>
                  <div class="invalid-feedback">
                    <?php echo $job_location_msg; ?>
                  </div>
                </div>
              </div>

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="url">Apptitude Exam Url</label>
                  <input type="url" class="form-control" name="job_url" placeholder="https://www.form.link" value="<?php echo $job_url; ?>">
                  <div class="invalid-feedback">
                    <?php echo $job_url_msg; ?>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="eligiblitycrieteria">Eligiblity Criteria  ( Note: Create multiline eligiblity press enter then type. )</label>
                  <textarea name="job_eligiblity" class="form-control" id="" cols="30" rows="5"><?php echo $job_eligiblity; ?></textarea>
                  <div class="invalid-feedback">
                    <?php echo $job_eligiblity_msg; ?>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="jobdescription">Job Description</label>
                  <textarea name="job_description" class="form-control" id="" cols="30" rows="5"><?php echo $job_description; ?></textarea>
                  <div class="invalid-feedback">
                    <?php echo $job_description_msg; ?>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" 
                  <?php
                    if (isset($_GET['post_id'])) {
                      ?>
                        value="Update"
                      <?php
                    } else {
                      ?>
                      value="Post"
                      <?php
                    }
                  ?> 
                  class="btn btn-primary  py-2 px-5">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
      include 'footer.php';
    ?>