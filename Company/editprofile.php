     <?php
      $titlename = "Edit Profile";
      include 'header.php';
      $id = $_SESSION['id'];
      $value = company_get_details($conn,$id);
      $firstname_msg = '';
      $middlename_msg = '';
      $lastname_msg = '';
      $email_msg = '';
      $contactnumber_msg = '';

      $company_name_msg = '';
      $company_about_msg = '';
      $company_website_msg = '';
      $company_logo_msg = '';
      $company_contry_msg = '';
      $company_state_msg = '';
      $company_district_msg = '';

      $whatsapp_msg = '';
      $facebook_msg = '';
      $linkedin_msg = '';
      
      $firstname = $value['firstname'];
      $middlename = $value['middlename'];
      $lastname = $value['lastname'];
      $email = $value['email'];
      $contactnumber = $value['contactnumber'];
      
      $company_name = $value['company_name'];
      $company_website = $value['company_website'];
      $company_about = $value['company_about'];
      $company_contry = $value['company_contry'];
      $company_state = $value['company_state'];
      $company_district = $value['company_district'];


      $whatsapp = $value['whatsapp'];
      $facebook = $value['facebook'];
      $linkedin = $value['linkedin'];

      if(isset($_POST['submit']))
      {
        $firstname = input_data($_POST['firstname']);
        $middlename = input_data($_POST['middlename']);
        $lastname = input_data($_POST['lastname']);
        $email = input_data($_POST['email']);
        $contactnumber = input_data($_POST['contactnumber']);
        
        $company_name = input_data($_POST['company_name']);
        $company_website = input_data($_POST['company_website']);
        $company_about = input_data($_POST['company_about']);
        $company_logo = $_FILES['company_logo'];
        $company_contry = 'India';
        $company_state = input_data($_POST['company_state']);
        $company_district = input_data($_POST['company_district']);

        $whatsapp = input_data($_POST['whatsapp']);
        $facebook = input_data($_POST['facebook']);
        $linkedin = input_data($_POST['linkedin']);


        $firstname_validation = 0;
        $middlename_validation = 0;
        $lastname_validation = 0;
        $email_validation = 0;
        $contactnumber_validation = 0;

        $company_name_validation = 0;
        $company_website_validation = 0;
        $company_about_validation = 0;
        $company_logo_validation = 0;
        $company_contry_validation = 0;
        $company_state_validation = 0;
        $company_district_validation = 0;

        $whatsapp_validation = 0;
        $facebook_validation = 0;
        $linkedin_validation = 0;


        if($firstname)
        {
          if (ctype_alpha($firstname))
          {
            $firstname_validation = 0;
          }
          else
          {
            $firstname_msg = 'Only Character is required';
            $firstname_validation = 1;
          }
        }
        else
        {
          $firstname_msg = 'First Name is required';
          $firstname_validation = 1;
        }


        if($middlename)
        {
          if (ctype_alpha($middlename))
          {
            $middlename_validation = 0;
          }
          else
          {
            $middlename_msg = 'Only Character is required';
            $middlename_validation = 1;
          }
        }
        else
        {
          $middlename_msg = 'Middle Name is required';
          $middlename_validation = 1;
        }


        if($lastname)
        {
          if (ctype_alpha($lastname))
          {
            $lastname_validation = 0;
          }
          else
          {
            $lastname_msg = 'Only Character is required';
            $lastname_validation = 1;
          }
        }
        else
        {
          $lastname_msg = 'Last Name is required';
          $lastname_validation = 1;
        }


        if($email)
        {
          if (filter_var($email, FILTER_VALIDATE_EMAIL))
          {
            if (company_email_exist($conn,$email,$id))
            {
              $email_validation = 0;
            }
            else
            {
              $email_msg = 'Email address is already used.';
                $email_validation = 1;
            }
          }
          else
          {
            $email_msg = 'Use Proper Email format.';
            $email_validation = 1;
          }
        }
        else
        {
          $email_msg = 'E-mail Address is required';
          $email_validation = 1;
        }


        if($contactnumber)
        {
          if (ctype_digit($contactnumber))
          {
            if (strlen($contactnumber) == 10)
            {
              if (company_contactnumber_exist($conn,$contactnumber,$id))
              {
                $contactnumber_validation = 0;
              }
              else
              {
                $contactnumber_msg = 'Contactnumber is already used.';
                  $contactnumber_validation = 1;
              }
            }
            else
            {
              $contactnumber_msg = 'Contactnumber must be a 10 digit.';
              $contactnumber_validation = 1;
            }
          }
          else
          {
            $contactnumber_msg = 'Only Number\'s required';
            $contactnumber_validation = 1;
          }
        }
        else
        {
          $contactnumber_msg = 'Contactnumber is required';
          $contactnumber_validation = 1;
        }
        

        if($company_name)
        {
          if (ctype_alpha(str_replace(' ','', $company_name)))
          {
            $company_name_validation = 0;
          }
          else
          {
            $company_name_msg = 'Only Character is required';
            $company_name_validation = 1;
          }
        }
        else
        {
          $company_name_msg = 'Company Name is required';
          $company_name_validation = 1;
        }

        if($company_about)
        {
          if (strlen($company_about) < 250) 
          {
            $company_about_validation = 0;
          }
          else
          {
            $company_about_msg = 'Less than 250 letter required';
            $company_about_validation = 1;
          }
        }
        else
        {
          $company_about_msg = 'This is required';
          $company_about_validation = 1;
        }

        if($company_website)
        {
          if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$company_website)) 
          {
            $company_website_validation = 0;
          }
          else
          {
            $company_website_msg = 'Please enter valid website link';
            $company_website_validation = 1;
          }  
        }
        else
        {
          $company_website_msg = 'Company Website is required';
          $company_website_validation = 1;
        }

        if($company_logo)
        {
          if($company_logo['type'] == 'image/png' OR $company_logo['type'] == 'image/jpg' OR $company_logo['type'] == 'image/jpeg')
          {
            if($company_logo['size'] < 1048576)
            {
              $company_logo_validation = 0;
            }
            else
            {
              $company_logo_msg = 'Please upload less than 1 MB file.';
              $company_logo_validation = 1;
            }
          }
          else
          {
            $company_logo_msg = 'Please use valid image formated file.';
            $company_logo_validation = 1;
          }
        }

        if($company_contry)
        {
          if (ctype_alpha($company_contry))
          {
            $company_contry_validation = 0;
          }
          else
          {
            $company_contry_msg = 'Only Character is required';
            $company_contry_validation = 1;
          }
        }
        else
        {
          $company_contry_msg = 'Contry is required';
          $company_contry_validation = 1;
        }


        if($company_state)
        {
          if (ctype_alpha($company_state))
          {
            $company_state_validation = 0;
          }
          else
          {
            $company_state_msg = 'Only Character is required';
            $company_state_validation = 1;
          }
        }
        else
        {
          $company_state_msg = 'State is required';
          $company_state_validation = 1;
        }


        if($company_district)
        {
          if (ctype_alpha($company_district))
          {
            $company_district_validation = 0;
          }
          else
          {
            $company_district_msg = 'Only Character is required';
            $company_district_validation = 1;
          }
        }
        else
        {
          $company_district_msg = 'District is required';
          $company_district_validation = 1;
        }        

        if($whatsapp)
        {
          if(ctype_digit($whatsapp))
          {
            if (strlen($whatsapp) == 10) 
            {
              $whatsapp_validation = 0;
            }
            else
            {
              $whatsapp_msg = 'Whatsapp number must be a 10 digit.';
              $whatsapp_validation = 1;
            }
          }
          else
          {
            $whatsapp_msg = 'Only Number\'s required.';
            $whatsapp_validation = 1;
          }
        }

        if($facebook)
        {
          if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$facebook)) 
          {
            $facebook_validation = 0;
          }
          else
          {
            $facebook_msg = 'Please enter valid Profile link';
            $facebook_validation = 1;
          }  
        }

        if($linkedin)
        {
          if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin)) 
          {
            $linkedin_validation = 0;
          }
          else
          {
            $linkedin_msg = 'Please enter valid Profile link';
            $linkedin_validation = 1;
          }  
        }



        if($firstname_validation == 0 && $middlename_validation == 0 && $lastname_validation == 0 && $email_validation == 0 && $contactnumber_validation == 0 && $company_name_validation == 0 && $company_website_validation == 0 && $company_about_validation == 0  && $company_contry_validation == 0 && $company_state_validation == 0 && $company_district_validation == 0 && $whatsapp_validation == 0 && $facebook_validation == 0 && $linkedin_validation == 0 && $company_logo_validation == 0)
        {
          if(company_update($conn,$_POST,$_FILES,$id))
          {
            $msg = 'Profile Updated .!';
            $link = BASE_URL.'Company/index.php';
            redirect_link($msg,$link);
          }
          else
          {
            $msg = 'Some thing went wrong .!';
            $link = BASE_URL.'Company/editprofile.php';
            redirect_link($msg,$link);
          }
        }

      }
    ?>
    <style type="text/css">
      .form-control {
        border-width: 2.3px;
        height: unset !important;
        outline: 1;
      }
      fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
              box-shadow:  0px 0px 0px 0px #000;
      }
      legend.scheduler-border {
          font-size: 1.2em !important;
          font-weight: bold !important;
          text-align: left !important;
          width:auto;
          padding:0 10px;
          border-bottom:none;
      }
    </style>
    <?php
      include 'navigation.php';
    ?>
    <section class="ftco-section bg-light" style="padding: 1rem 0;margin-top:7%;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-5"><span>Edit</span> Profile</h2>
          </div>
        </div>
        <form action="editprofile.php" method="post" enctype="multipart/form-data">
        <fieldset class="scheduler-border">
          <legend class="scheduler-border">Personal Details</legend>
          <div class="row">
            <div class="col-md-12">
                    <div class="form-group mb-2">
                      <div class="row w-100" style="margin: 0;">
                        <div class="col-md" style="padding-left: 0;">
                          <label for="email">First Name</label>
                            <input id="email" type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                            <div class="invalid-feedback">
                              <?php echo $firstname_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">Middle Name</label>
                            <input id="email" type="text" class="form-control" name="middlename" value="<?php echo $middlename; ?>">
                            <div class="invalid-feedback">
                              <?php echo $middlename_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">Last Name</label>
                            <input id="email" type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                            <div class="invalid-feedback">
                              <?php echo $lastname_msg; ?>
                            </div>
                        </div>
                      </div>
                    </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                    <div class="form-group mb-2">
                      <div class="row w-100" style="margin: 0;">
                        <div class="col-md" style="padding-left: 0;">
                          <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                            <div class="invalid-feedback">
                              <?php echo $email_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">Contact Number</label>
                            <input id="email" type="number" class="form-control" name="contactnumber" value="<?php echo $contactnumber; ?>">
                            <div class="invalid-feedback">
                              <?php echo $contactnumber_msg; ?>
                            </div>
                        </div>
                      </div>
                    </div>
            </div>
          </div>
        </fieldset>

        <fieldset class="scheduler-border">
          <legend class="scheduler-border">Company Details</legend>
          <div class="row">

            <div class="col-md-6">
                    <div class="form-group mb-2">
                      <div class="row w-100" style="margin: 0;">
                        <div class="col-md" style="padding-left: 0;">
                          <label for="email">Company Name</label>
                            <input id="email" type="text" class="form-control" name="company_name" value="<?php echo $company_name; ?>">
                            <div class="invalid-feedback">
                              <?php echo $company_name_msg; ?>
                            </div>
                        </div>
                      </div>
                      <div class="row w-100" style="margin: 0;">
                        <div class="col-md" style="padding-left: 0;">
                          <label for="email">Company Website</label>
                            <input id="email" type="text" class="form-control" name="company_website" value="<?php echo $company_website; ?>">
                            <div class="invalid-feedback">
                              <?php echo $company_website_msg; ?>
                            </div>
                        </div>
                        
                      </div>
                    </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2 h-100">
                <div class="row w-100 h-100" style="margin: 0;">
                  <div class="col-md" style="padding-left: 0;">
                    <label for="email">About Company</label>
                    <textarea class="form-control" name="company_about" style="height: 75% !important"><?php echo $company_about; ?></textarea>
                    <div class="invalid-feedback"><?php echo $company_about_msg; ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
                    <div class="form-group mb-2">
                      <div class="row w-100" style="margin: 0;">
                        <div class="col-md" style="padding-left: 0;">
                          <label for="company_logo">Company Logo</label>
                            <input id="company_logo" type="file" class="form-control" name="company_logo">
                            <div class="invalid-feedback">
                              <?php echo $company_logo_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-left: 0;">
                          <label for="email">Contry</label>
                            <input id="email" type="text" class="form-control" name="company_contry" value="India" readonly>
                            <div class="invalid-feedback">
                              <?php echo $company_contry_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">State</label>
                            <input id="email" type="text" class="form-control" name="company_state" value="<?php echo $company_state; ?>">
                            <div class="invalid-feedback">
                              <?php echo $company_state_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">District</label>
                            <input id="email" type="text" class="form-control" name="company_district" value="<?php echo $company_district; ?>">
                            <div class="invalid-feedback">
                              <?php echo $company_district_msg; ?>
                            </div>
                        </div>
                      </div>
                    </div>
            </div>
          </div>
        </fieldset>

        <fieldset class="scheduler-border">
          <legend class="scheduler-border">Social Media Details</legend>
          <div class="row">
            <div class="col-md-12">
                    <div class="form-group mb-2">
                      <div class="row w-100" style="margin: 0;">
                        <div class="col-md" style="padding-left: 0;">
                          <label for="email">Whatsapp</label>
                            <input id="email" type="number" class="form-control" name="whatsapp" value="<?php echo $whatsapp; ?>">
                            <div class="invalid-feedback">
                              <?php echo $whatsapp_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">Facebook</label>
                            <input id="email" type="url" class="form-control" name="facebook" value="<?php echo $facebook; ?>">
                            <div class="invalid-feedback">
                              <?php echo $facebook_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">LinkedIn</label>
                            <input id="email" type="url" class="form-control" name="linkedin" value="<?php echo $linkedin; ?>">
                            <div class="invalid-feedback">
                              <?php echo $linkedin_msg; ?>
                            </div>
                        </div>
                      </div>
                    </div>
            </div>
          </div>
        </fieldset>

        <div class="row form-group">
          <div class="col-md-4"></div>
                <div class="col-md-2">
                  <input type="reset" value="Reset" class="btn btn-danger  py-2 px-5">
                </div>
                <div class="col-md-2">
                  <input type="submit" value="Update" name="submit" class="btn btn-success  py-2 px-5">
                </div>
              </div>
        </form>
      </div>
    </section>


<?php
  include 'footer.php';
?>