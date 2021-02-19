    <?php
      $titlename = "Page";
      include 'header.php';
      $editAbout = admin_get_field($conn,'about_info');
      $editContactAddress = admin_get_field($conn,'contact_address');
      $editContactNumber = admin_get_field($conn,'contact_number');
      $editContactEmail = admin_get_field($conn,'contact_email');
      $editContactWebsite = admin_get_field($conn,'contact_website');

      $testimonialList = testimonial_list($conn);
      $personName = '';
      $personDesignation = '';
      $personImage = '';
      $personMessage = '';
      $testimonialId = '';

      $personName_msg = '';
      $personDesignation_msg = '';
      $personImage_msg = '';
      $personMessage_msg = '';
      if (isset($_POST['updateAbout'])) {
        if (isset($_POST['about_info'])) {
          if(admin_set_field($conn,'about_info',$_POST['about_info']))
          {
            $msg = 'About Info Updated .!';
            $link = BASE_URL.'Admin/page.php';
            redirect_link($msg,$link);
          }
          else
          {
            $msg = 'Some thing went wrong .!';
            $link = BASE_URL.'Admin/page.php';
            redirect_link($msg,$link);
          }
        }
      }
      if (isset($_POST['updateContact'])) {
        if (isset($_POST['contact_address']) && isset($_POST['contact_number']) && isset($_POST['contact_email']) && isset($_POST['contact_website'])) {
          if(admin_set_field($conn,'contact_address',$_POST['contact_address']) && admin_set_field($conn,'contact_number',$_POST['contact_number']) && admin_set_field($conn,'contact_email',$_POST['contact_email']) && admin_set_field($conn,'contact_website',$_POST['contact_website']))
          {
            $msg = 'Contact Info Updated .!';
            $link = BASE_URL.'Admin/page.php';
            redirect_link($msg,$link);
          }
          else
          {
            $msg = 'Some thing went wrong .!';
            $link = BASE_URL.'Admin/page.php';
            redirect_link($msg,$link);
          }
        }
      }
      if (isset($_POST['updateTestimonial'])) {
        $testimonialId = $_POST['testimonialId'];
        $personName = input_data($_POST['personName']); 
        $personDesignation = input_data($_POST['personDesignation']); 
        $personImage = $_FILES['personImage'];
        $personMessage = input_data($_POST['personMessage']);
        
        $personName_validation = 0;
        $personDesignation_validation = 0;
        $personImage_validation = 0;
        $personMessage_validation = 0;
        if($personName)
        {
          if (strlen($personName) < 50) 
          {
            $personName_validation = 0;
          }
          else
          {
            $personName_msg = 'Less than 50 letter required';
            $personName_validation = 1;
          }
        }
        else
        {
          $personName_msg = 'Person Name is required';
          $personName_validation = 1;
        }

        if($personDesignation)
        {
          if (strlen($personDesignation) < 50) 
          {
            $personDesignation_validation = 0;
          }
          else
          {
            $personDesignation_msg = 'Less than 50 letter required';
            $personDesignation_validation = 1;
          }
        }
        else
        {
          $personDesignation_msg = 'Person Designation is required';
          $personDesignation_validation = 1;
        }

        if($personImage)
        {
          if($personImage['type'] == 'image/jpeg' || $personImage['type'] == 'image/jpg' || $personImage['type'] == 'image/png')
          {
            if($personImage['size'] < 2097152)
            {
              $personImage_validation = 0;
            }
            else
            {
              $personImage_msg = 'Please upload less than 2 MB file.';
              $personmage_validation = 1;
            }
          }
          else
          {
            $personImage_msg = 'Please use valid Image formated file.';
            $personImage_validation = 1;
          }
        }
        else
        {
          $personImage_msg = 'Person Image is required';
          $personImage_validation = 1;
        }

        if($personMessage)
        {
          if (strlen($personMessage) < 250) 
          {
            $personMessage_validation = 0;
          }
          else
          {
            $personMessage_msg = 'Less than 250 letter required';
            $personMessage_validation = 1;
          }
        }
        else
        {
          $personMessage_msg = 'Person Message is required';
          $personMessage_validation = 1;
        }

        if ($personName_validation == 0 && $personImage_validation == 0 && $personDesignation_validation == 0 && $personMessage_validation == 0) {
          if (isset($_POST['testimonialId']) && !empty(trim($_POST['testimonialId']))) {
            if(testimonial_update($conn,$_POST,$_FILES,$_POST['testimonialId']))
            {
              $msg = 'Testimonial Updated .!';
              $link = BASE_URL.'Admin/page.php';
              redirect_link($msg,$link);
            }
            else
            {
              $msg = 'Some thing went wrong .!';
              $link = BASE_URL.'Admin/page.php';
              redirect_link($msg,$link);
            }
          } else {
            if(testimonial_insert($conn,$_POST,$_FILES))
            {
              $msg = 'New Testimonial Added .!';
              $link = BASE_URL.'Admin/page.php';
              redirect_link($msg,$link);
            }
            else
            {
              $msg = 'Some thing went wrong .!';
              $link = BASE_URL.'Admin/page.php';
              redirect_link($msg,$link);
            }
          }
        } 
      }
      if (isset($_GET['id'])) {
          $rowTestimonial = fetch_testimonial_details($conn,$_GET['id']);
          if (!mysqli_num_rows($rowTestimonial)) {
            $msg = 'Testimonial Id is invalid .!';
            $link = BASE_URL.'Admin/page.php';
            redirect_link($msg,$link);
          }
          $row = mysqli_fetch_array($rowTestimonial);
          $personName = $row['person_name'];
          $personDesignation = $row['person_designation'];
          $testimonialId = $row['id'];
          $personMessage = $row['person_message'];
      }
      if (isset($_GET['deleteTestimonial']) && !empty(trim($_GET['deleteTestimonial'])) && isset($_GET['deleteId']) && !empty(trim($_GET['deleteId']))) {
        if(testimonial_delete($conn,$_GET['deleteId']))
        {
          $msg = 'Testimonial Deleted .!';
          $link = BASE_URL.'Admin/page.php';
          redirect_link($msg,$link);
        }
        else
        {
          $msg = 'Some thing went wrong .!';
          $link = BASE_URL.'Admin/page.php';
          redirect_link($msg,$link);
        }
      }
    ?>
    <style type="text/css">
      .ftco-navbar-light .navbar-nav > .nav-item:nth-child(5) > .nav-link
      {
        color: #95a5a6;
      }
      .ftco-navbar-light.scrolled .nav-item:nth-child(5) > a
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

    <section class="ftco-section bg-light" style="padding: 1rem 0;margin-top:7%">
      <div class="container">
        <div class="row">
          <div class="col-md-10 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-4"><span>About</span> Page</h2>
          </div>
          <div class="col-md-2 heading-section ftco-animate fadeInUp ftco-animated pl-3">
              <div class="ml-auto d-flex" style="width: 100%;height: 100%;justify-content: center;align-items: center;">
                <a href="page.php?editabout=1" class="btn btn-success py-2 mr-1">Edit About</a>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?php
              if (isset($_GET['editabout']) && !empty(trim($_GET['editabout']))) {
                ?>
                  <form action="page.php" method="post" class="p-5 bg-white">
                    <div class="row form-group">
                      <div class="col-md-12 mb-3 mb-md-0">
                        <textarea name="about_info" class="form-control" cols="30" rows="5" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"><?php echo $editAbout; ?></textarea>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-md-12">
                        <input type="submit" name="updateAbout" value="Update" class="btn btn-primary  py-2 px-5">
                      </div>
                    </div>
                  </form>
                <?php
              } else {
                ?>
                  <h5><?php echo $editAbout; ?></h5>
                <?php
              }
            ?>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light" style="padding: 1rem 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-10 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-4"><span>Contact</span> Page</h2>
          </div>
          <div class="col-md-2 heading-section ftco-animate fadeInUp ftco-animated pl-3">
              <div class="ml-auto d-flex" style="width: 100%;height: 100%;justify-content: center;align-items: center;">
                <a href="page.php?editContact=1" class="btn btn-success py-2 mr-1">Edit Contact</a>
              </div>
          </div>
        </div>
        <form action="page.php" method="post">
          <div class="row form-group">
              <div class="col-md-3">
                <p>
                  <span><b>Address:</b></span><br>
                  <?php
                    if (isset($_GET['editContact']) && !empty(trim($_GET['editContact']))) {
                      ?>
                        <div class="row form-group">
                          <div class="col-md-12 mb-3 mb-md-0">
                            <textarea name="contact_address" class="form-control" cols="30" rows="5" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"><?php echo $editContactAddress; ?></textarea>
                          </div>
                        </div>
                      <?php
                    } else {
                      echo $editContactAddress;
                    }
                  ?>
                  </p>
              </div>
              <div class="col-md-3">
                <p>
                  <span><b>Phone:</b></span><br>
                  <?php
                    if (isset($_GET['editContact']) && !empty(trim($_GET['editContact']))) {
                      ?>
                        <div class="row form-group">
                          <div class="col-md-12 mb-3 mb-md-0">
                            <input type="number" name="contact_number" class="form-control" placeholder="1234567890" value="<?php echo $editContactNumber; ?>">
                          </div>
                        </div>
                      <?php
                    } else {
                      ?>
                      <a href="javascript:void(0)"><?php echo '+91-'.$editContactNumber; ?></a>
                      <?php
                    }
                  ?>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <span><b>Email:</b></span><br>
                  <?php
                    if (isset($_GET['editContact']) && !empty(trim($_GET['editContact']))) {
                      ?>
                        <div class="row form-group">
                          <div class="col-md-12 mb-3 mb-md-0">
                            <a href="javascript:void(0)">
                              <input type="email" name="contact_email" class="form-control" placeholder="abc@gmail.com" value="<?php echo $editContactEmail; ?>">
                            </a>
                          </div>
                        </div>
                      <?php
                    } else {
                      ?>
                        <a href="javascript:void(0)">
                          <?php echo $editContactEmail; ?>
                        </a>
                      <?php
                    }
                  ?>
                </p>
              </div>
              <div class="col-md-3">
                <p>
                  <span><b>Website:</b></span><br>
                  <?php
                    if (isset($_GET['editContact']) && !empty(trim($_GET['editContact']))) {
                      ?>
                        <div class="row form-group">
                          <div class="col-md-12 mb-3 mb-md-0">
                            <a href="javascript:void(0)">
                              <input type="url" name="contact_website" class="form-control" placeholder="https://www.yoursite.com" value="<?php echo $editContactWebsite; ?>">
                            </a>
                          </div>
                        </div>
                      <?php
                    } else {
                      ?>
                        <a href="javascript:void(0)">
                          <?php echo $editContactWebsite; ?>
                        </a>
                      <?php
                    }
                  ?></p>
              </div>
          </div>
          <?php
            if (isset($_GET['editContact']) && !empty(trim($_GET['editContact']))) {
              ?>
                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" name="updateContact" value="Update" class="btn btn-primary  py-2 px-5">
                  </div>
                </div>
              <?php
            }
          ?>
        </form>
      </div>
    </section>

    <section class="ftco-section bg-light" style="padding: 1rem 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-10 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-4"><span>Testimonial</span></h2>
          </div>
          <div class="col-md-2 heading-section ftco-animate fadeInUp ftco-animated pl-3">
              <div class="ml-auto d-flex" style="width: 100%;height: 100%;justify-content: center;align-items: center;">
                <a href="page.php?addTestimonial=1" class="btn btn-success py-2 mr-1">Add Testimonial</a>
              </div>
          </div>
        </div>
        <?php
          if ((isset($_GET['addTestimonial']) && !empty(trim($_GET['addTestimonial']))) OR (isset($testimonialId) && !empty(trim($testimonialId)))) {
            ?>
              <div class="row">
                <form action="page.php" method="post" class="p-5" enctype="multipart/form-data">
                <input type="hidden" name="testimonialId" value="<?php echo $testimonialId;?>">
                <div class="row form-group">
                  <div class="col-md-4 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="personName">Person Name</label>
                    <input type="text" name="personName" class="form-control" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" value="<?php echo $personName;?>">
                     <div class="invalid-feedback">
                            <?php echo $personName_msg;?>
                      </div>
                  </div>
                  <div class="col-md-4 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="personDesignation">Person Designation</label>
                    <input type="text" name="personDesignation" class="form-control" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" value="<?php echo $personDesignation;?>">
                     <div class="invalid-feedback">
                            <?php echo $personDesignation_msg;?>
                      </div>
                  </div>
                  <div class="col-md-4 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="personImage">Person Image</label>
                    <input type="file" name="personImage" class="form-control" value="<?php echo $personImage;?>">
                     <div class="invalid-feedback">
                            <?php echo $personImage_msg;?>
                      </div>
                  </div>
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="personMessage">Person Message</label>
                    <textarea name="personMessage" class="form-control" cols="30" rows="5" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"><?php echo $personMessage;?></textarea>
                     <div class="invalid-feedback">
                          <?php echo $personMessage_msg;?>
                      </div>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" name="updateTestimonial" value="Save" class="btn btn-primary  py-2 px-5">
                  </div>
                </div>
              </form>
              </div>
            <?php
          }
        ?>
        <div class="row">
          
        </div>
        <div class="row">
          <?php
            if (isset($testimonialList) && !empty($testimonialList)) {
              while ($row = mysqli_fetch_array($testimonialList)) {
                ?>
                  <div class="col-md-4 mt-5">
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5">
                          <div class="user-img mb-4" style="background-image: url(<?php echo Testimonial_Image_Url.$row['person_image']; ?>)">
                            <span class="quote d-flex align-items-center justify-content-center">
                              <i class="icon-quote-left"></i>
                            </span>
                          </div>
                          <div class="text">
                            <p class="mb-4"><?php echo $row['person_message'];?></p>
                            <p class="name"><?php echo $row['person_name'];?></p>
                            <span class="position"><?php echo $row['person_designation'];?></span>
                          </div>
                          <div class="text">
                            <a href="page.php?addTestimonial=1&id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit Details</a>
                            <a href="page.php?deleteTestimonial=1&deleteId=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Delete Details</a>
                          </div>
                        </div>
                      </div>
                  </div>
                <?php
              }
            }
          ?>
        </div>
      </div>
    </section>

    <?php
      include 'footer.php';
    ?>