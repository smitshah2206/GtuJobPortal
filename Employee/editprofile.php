    <?php
      include 'header.php';
      $id = $_SESSION['id'];
      $value = employee_get_details($conn,$id);
      $firstname_msg = '';
      $middlename_msg = '';
      $lastname_msg = '';
      $email_msg = '';
      $contactnumber_msg = '';
      $dateofbirth_msg = '';
      $gender_msg = '';
      $contry_msg = '';
      $state_msg = '';
      $district_msg = '';

      $colleagename_msg = '';
      $sgpa_msg = '';
      $graduationyear_msg = '';
      $hscschoolname_msg = '';
      $hscboardname_msg = '';
      $hsccgpa_msg = '';
      $hscpassout_msg = '';
      $sscschoolname_msg = '';
      $sscboardname_msg = '';
      $ssccgpa_msg = '';
      $sscpassout_msg = '';

      $coverletter_msg = '';
      $intrestarea_msg = '';
      $uploadcv_msg = '';

      $whatsapp_msg = '';
      $github_msg = '';
      $linkedin_msg = '';
      $skype_msg = '';
      
      $firstname = $value['firstname'];
      $middlename = $value['middlename'];
      $lastname = $value['lastname'];
      $email = $value['email'];
      $contactnumber = $value['contactnumber'];
      $dateofbirth = $value['dateofbirth'];
      $gender = $value['gender'];
      $contry = $value['contry'];
      $state = $value['state'];
      $district = $value['district'];

      $colleagename = $value['colleagename'];
      $sgpa = $value['sgpa'];
      $graduationyear = $value['graduationyear'];
      $hscschoolname = $value['hscschoolname'];
      $hscboardname = $value['hscboardname'];
      $hsccgpa = $value['hsccgpa'];
      $hscpassout = $value['hscyear'];
      $sscschoolname = $value['sscschoolname'];
      $sscboardname = $value['sscboardname'];
      $ssccgpa = $value['ssccgpa'];
      $sscpassout = $value['sscyear'];

      $coverletter = $value['coverletter'];
      $intrestarea = $value['intrestarea'];
      $uploadcv = $value['resume'];

      $whatsapp = $value['whatsapp'];
      $github = $value['github'];
      $linkedin = $value['linkedin'];
      $skype = $value['skype'];
      if(isset($_POST['submit']))
      {
        $firstname = input_data($_POST['firstname']);
        $middlename = input_data($_POST['middlename']);
        $lastname = input_data($_POST['lastname']);
        $email = input_data($_POST['email']);
        $contactnumber = input_data($_POST['contactnumber']);
        $dateofbirth = input_data($_POST['dateofbirth']);
        $gender = input_data($_POST['gender']);
        $contry = 'India';
        $state = input_data($_POST['state']);
        $district = input_data($_POST['district']);

        $colleagename = input_data($_POST['colleagename']);
        $sgpa = input_data($_POST['sgpa']);
        $graduationyear = input_data($_POST['graduationyear']);
        $hscschoolname = input_data($_POST['hscschoolname']);
        $hscboardname = input_data($_POST['hscboardname']);
        $hsccgpa = input_data($_POST['hsccgpa']);
        $hscpassout = input_data($_POST['hscpassout']);
        $sscschoolname = input_data($_POST['sscschoolname']);
        $sscboardname = input_data($_POST['sscboardname']);
        $ssccgpa = input_data($_POST['ssccgpa']);
        $sscpassout = input_data($_POST['sscpassout']);

        $coverletter = input_data($_POST['coverletter']);
        $intrestarea = input_data($_POST['intrestarea']);
        $uploadcv = $_FILES['uploadcv'];

        $whatsapp = input_data($_POST['whatsapp']);
        $github = input_data($_POST['github']);
        $linkedin = input_data($_POST['linkedin']);
        $skype = input_data($_POST['skype']);

        $firstname_validation = 0;
        $middlename_validation = 0;
        $lastname_validation = 0;
        $email_validation = 0;
        $contactnumber_validation = 0;
        $dateofbirth_validation = 0;
        $gender_validation = 0;
        $contry_validation = 0;
        $state_validation = 0;
        $district_validation = 0;

        $colleagename_validation = 0;
        $sgpa_validation = 0;
        $graduationyear_validation = 0;
        $hscschoolname_validation = 0;
        $hscboardname_validation = 0;
        $hsccgpa_validation = 0;
        $hscpassout_validation = 0;
        $sscschoolname_validation = 0;
        $sscboardname_validation = 0;
        $ssccgpa_validation = 0;
        $sscpassout_validation = 0;

        $coverletter_validation = 0;
        $uploadcv_validation = 0;

        $whatsapp_validation = 0;
        $github_validation = 0;
        $linkedin_validation = 0;
        $skype_validation = 0;


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
            if (employee_email_exist($conn,$email,$id))
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
              if (employee_contactnumber_exist($conn,$contactnumber,$id))
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

        if($dateofbirth)
        {
          $dateofbirth_validation = 0;
        }
        else
        {
          $dateofbirth_msg = 'Date of Birth is required';
          $dateofbirth_validation = 1;
        }

        if($gender)
        {
          $gender_validation = 0;
        }
        else
        {
          $gender_msg = 'Gender is required';
          $gender_validation = 1;
        }

        if($contry)
        {
          if (ctype_alpha($contry))
          {
            $contry_validation = 0;
          }
          else
          {
            $contry_msg = 'Only Character is required';
            $contry_validation = 1;
          }
        }
        else
        {
          $contry_msg = 'Contry is required';
          $contry_validation = 1;
        }


        if($state)
        {
          if (ctype_alpha($state))
          {
            $state_validation = 0;
          }
          else
          {
            $state_msg = 'Only Character is required';
            $state_validation = 1;
          }
        }
        else
        {
          $state_msg = 'State is required';
          $state_validation = 1;
        }


        if($district)
        {
          if (ctype_alpha($district))
          {
            $district_validation = 0;
          }
          else
          {
            $district_msg = 'Only Character is required';
            $district_validation = 1;
          }
        }
        else
        {
          $district_msg = 'District is required';
          $district_validation = 1;
        }

        if($colleagename)
        {
          if (ctype_alpha(str_replace(' ','', $colleagename)))
          {
            $colleagename_validation = 0;
          }
          else
          {
            $colleagename_msg = 'Only Character is required';
            $colleagename_validation = 1;
          }
        }
        else
        {
          $colleagename_msg = 'Colleage Name is required';
          $colleagename_validation = 1;
        }

        if($sgpa)
        {
          if (ctype_digit($sgpa))
          {
            $sgpa_validation = 0;
          }
          else
          {
            $sgpa_msg = 'Only Character is required';
            $sgpa_validation = 1;
          }
        }
        else
        {
          $sgpa_msg = 'SGPA is required';
          $sgpa_validation = 1;
        }

        if($graduationyear)
        {
          $graduationyear_validation = 0;
        }
        else
        {
          $graduationyear_msg = 'Graduation Year is required';
          $graduationyear_validation = 1;
        }


        if($hscschoolname)
        {
          if (ctype_alpha(str_replace(' ','', $hscschoolname)))
          {
            $hscschoolname_validation = 0;
          }
          else
          {
            $hscschoolname_msg = 'Only Character is required';
            $hscschoolname_validation = 1;
          }
        }
        else
        {
          $hscschoolname_msg = 'HSC School Name is required';
          $hscschoolname_validation = 1;
        }

        if($hscboardname)
        {
          $hscboardname_validation = 0;
        }
        else
        {
          $hscboardname_msg = 'HSC Board Name is required';
          $hscboardname_validation = 1;
        }

        if($hsccgpa)
        {
          if (ctype_digit($hsccgpa))
          {
            $hsccgpa_validation = 0;
          }
          else
          {
            $hsccgpa_msg = 'Only Character is required';
            $hsccgpa_validation = 1;
          }
        }
        else
        {
          $hsccgpa_msg = 'HSC CGPA is required';
          $hsccgpa_validation = 1;
        }

        if($hscpassout)
        {
          $hscpassout_validation = 0;
        }
        else
        {
          $hscpassout_msg = 'HSC Passout Year is required';
          $hscpassout_validation = 1;
        }


        if($sscschoolname)
        {
          if (ctype_alpha(str_replace(' ','', $sscschoolname)))
          {
            $sscschoolname_validation = 0;
          }
          else
          {
            $sscschoolname_msg = 'Only Character is required';
            $sscschoolname_validation = 1;
          }
        }
        else
        {
          $sscschoolname_msg = 'SSC School Name is required';
          $sscschoolname_validation = 1;
        }

        if($sscboardname)
        {
          $sscboardname_validation = 0;
        }
        else
        {
          $sscboardname_msg = 'SSC Board Name is required';
          $sscboardname_validation = 1;
        }

        if($ssccgpa)
        {
          if (ctype_digit($ssccgpa))
          {
            $ssccgpa_validation = 0;
          }
          else
          {
            $ssccgpa_msg = 'Only Character is required';
            $ssccgpa_validation = 1;
          }
        }
        else
        {
          $ssccgpa_msg = 'SSC CGPA is required';
          $ssccgpa_validation = 1;
        }

        if($sscpassout)
        {
          $sscpassout_validation = 0;
        }
        else
        {
          $sscpassout_msg = 'SSC Passout Year is required';
          $sscpassout_validation = 1;
        }

        if (strlen($coverletter) < 250) 
        {
          $coverletter_validation = 0;
        }
        else
        {
          $coverletter_msg = 'Less than 250 letter required';
          $coverletter_validation = 1;
        }

        if($uploadcv)
        {
          if($uploadcv['type'] == 'application/pdf')
          {
            if($uploadcv['size'] < 2097152)
            {
              $uploadcv_validation = 0;
            }
            else
            {
              $uploadcv_msg = 'Please upload less than 2 MB file.';
              $uploadcv_validation = 1;
            }
          }
          else
          {
            $uploadcv_msg = 'Please use valid PDF formated file.';
            $uploadcv_validation = 1;
          }
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
        
        if($github)
        {
          if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$github)) 
          {
            $github_validation = 0;
          }
          else
          {
            $github_msg = 'Please enter valid Profile link';
            $github_validation = 1;
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

        if($skype)
        {
          if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$skype)) 
          {
            $skype_validation = 0;
          }
          else
          {
            $skype_msg = 'Please enter valid Profile link';
            $skype_validation = 1;
          }  
        }


        if($firstname_validation == 0 && $middlename_validation == 0 && $lastname_validation == 0 && $email_validation == 0 && $contactnumber_validation == 0 && $dateofbirth_validation == 0 && $gender_validation == 0 && $contry_validation == 0 && $state_validation == 0 && $district_validation == 0 && $colleagename_validation == 0 && $sgpa_validation == 0 && $graduationyear_validation == 0 && $hscschoolname_validation == 0 && $hscboardname_validation == 0 && $hsccgpa_validation == 0 && $hscpassout_validation == 0 && $sscschoolname_validation == 0 && $sscboardname_validation == 0 && $ssccgpa_validation == 0 && $sscpassout_validation == 0 && $coverletter_validation == 0 && $uploadcv_validation == 0 && $whatsapp_validation == 0 && $github_validation == 0 && $linkedin_validation == 0 && $skype_validation == 0)
        {
          if(employee_update($conn,$_POST,$_FILES,$id))
          {
            $msg = 'Profile Updated .!';
            $link = BASE_URL.'Employee/index.php';
            redirect_link($msg,$link);
          }
          else
          {
            $msg = 'Some thing went wrong .!';
            $link = BASE_URL.'Employee/editprofile.php';
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
                        <div class="col-md-2" style="padding-right: 0;">
                          <label for="email">Date of Birth</label>
                            <input id="email" type="date" class="form-control" name="dateofbirth" value="<?php echo $dateofbirth; ?>" style="padding-left: 1px;padding-right: 0;">
                            <div class="invalid-feedback">
                              <?php echo $dateofbirth_msg; ?>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-right: 0;">
                          <label for="email">Gender</label><br>
                            <div class="row">
                              <div class="col-md-6">
                                <?php 
                                    if(isset($gender) && $gender == 'Male')
                                    {
                                      ?>
                                        <input type="radio" id="option-job-type-4" name="gender" value="Male" checked>
                                      <?php
                                    }
                                    else
                                    {
                                      ?>
                                        <input type="radio" id="option-job-type-4" name="gender" value="Male" checked>
                                      <?php
                                    }
                                ?>
                                <label for="option-job-type-4" >Male</label>
                              </div>
                              <div class="col-md-6" style="padding-right: 0;">
                                <?php 
                                    if(isset($gender) && $gender == 'Female')
                                    {
                                      ?>
                                        <input type="radio" id="option-job-type-4" name="gender" value="Female" checked>
                                      <?php
                                    }
                                    else
                                    {
                                      ?>
                                        <input type="radio" id="option-job-type-4" name="gender" value="Female">
                                      <?php
                                    }
                                ?>
                                <label for="option-job-type-4" >Female</label>
                              </div>
                            </div>
                            <div class="invalid-feedback">
                              <?php echo $gender_msg; ?>
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
                          <label for="email">Contry</label>
                            <input id="email" type="text" class="form-control" name="contry" required value="India" readonly>
                            <div class="invalid-feedback">
                              <?php echo $contry_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">State</label>
                            <input id="email" type="text" class="form-control" name="state" value="<?php echo $state; ?>">
                            <div class="invalid-feedback">
                              <?php echo $state_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">District</label>
                            <input id="email" type="text" class="form-control" name="district" value="<?php echo $district; ?>">
                            <div class="invalid-feedback">
                              <?php echo $district_msg; ?>
                            </div>
                        </div>
                      </div>
                    </div>
            </div>
          </div>
        </fieldset>

        <fieldset class="scheduler-border">
          <legend class="scheduler-border">Education Details</legend>
          <div class="row">
            <div class="col-md-12">
                    <div class="form-group mb-2">
                      <div class="row w-100" style="margin: 0;">
                        <div class="col-md" style="padding-left: 0;">
                          <label for="email">Colleage Name</label>
                            <input id="email" type="text" class="form-control" name="colleagename" value="<?php echo $colleagename; ?>">
                            <div class="invalid-feedback">
                              <?php echo $colleagename_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">Semester Grade Point Average ( SGPA )</label>
                            <input id="email" type="Number" class="form-control" name="sgpa" value="<?php echo $sgpa; ?>">
                            <div class="invalid-feedback">
                              <?php echo $sgpa_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">Graduation Year</label>
                            <select name="graduationyear" id="" class="form-control">
                                    <?php 
                                      if(isset($graduationyear) && $graduationyear != '')
                                      {
                                        ?>
                                          <option value="<?php echo $graduationyear;?>">
                                            <?php echo $graduationyear; ?>
                                          </option>
                                        <?php
                                      }
                                    ?>
                                    <option value="2026">2026</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                            </select>
                            <div class="invalid-feedback">
                              <?php echo $graduationyear_msg; ?>
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
                          <label for="email">H.S.C School Name</label>
                            <input id="email" type="text" class="form-control" name="hscschoolname" value="<?php echo $hscschoolname; ?>">
                            <div class="invalid-feedback">
                              <?php echo $hscschoolname_msg; ?>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-right: 0;">
                          <label for="email">H.S.C Board Name</label>
                            <select name="hscboardname" id="" class="form-control">
                                    <?php 
                                      if(isset($hscboardname) && $hscboardname != '')
                                      {
                                        ?>
                                          <option value="<?php echo $hscboardname;?>">
                                            <?php echo $hscboardname; ?>
                                          </option>
                                        <?php
                                      }
                                    ?>
                                    <option value="Gujarat Board">Gujarat Board</option>
                                    <option value="ICSE">ICSE</option>
                                    <option value="CBSE">CBSE</option>
                                    <option value="NIOS">NIOS</option>
                                    <option value="Other">Other</option>
                            </select>
                            <div class="invalid-feedback">
                              <?php echo $hscboardname_msg; ?>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-right: 0;">
                          <label for="email">Percantage </label>
                            <input id="email" type="number" class="form-control" name="hsccgpa" value="<?php echo $hsccgpa; ?>">
                            <div class="invalid-feedback">
                              <?php echo $hsccgpa_msg; ?>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-right: 0;">
                          <label for="email">H.S.C Passout Year</label>
                            <select name="hscpassout" id="" class="form-control">
                                    <?php 
                                      if(isset($hscpassout) && $hscpassout != '')
                                      {
                                        ?>
                                          <option value="<?php echo $hscpassout;?>">
                                            <?php echo $hscpassout; ?>
                                          </option>
                                        <?php
                                      }
                                    ?>
                                    <option value="2026">2026</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                            </select>
                            <div class="invalid-feedback">
                              <?php echo $hscpassout_msg; ?>
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
                          <label for="email">S.S.C School Name</label>
                            <input id="email" type="text" class="form-control" name="sscschoolname" value="<?php echo $sscschoolname; ?>">
                            <div class="invalid-feedback">
                              <?php echo $sscschoolname_msg; ?>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-right: 0;">
                          <label for="email">S.S.C Board Name</label>
                            <select name="sscboardname" id="" class="form-control">
                                   <?php 
                                      if(isset($sscboardname) && $sscboardname != '')
                                      {
                                        ?>
                                          <option value="<?php echo $sscboardname;?>">
                                            <?php echo $sscboardname; ?>
                                          </option>
                                        <?php
                                      }
                                    ?>
                                    <option value="Gujarat Board">Gujarat Board</option>
                                    <option value="ICSE">ICSE</option>
                                    <option value="CBSE">CBSE</option>
                                    <option value="NIOS">NIOS</option>
                                    <option value="Other">Other</option>
                            </select>
                            <div class="invalid-feedback">
                              <?php echo $sscboardname_msg; ?>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-right: 0;">
                          <label for="email"> Percantage </label>
                            <input id="email" type="number" class="form-control" name="ssccgpa" value="<?php echo $ssccgpa; ?>">
                            <div class="invalid-feedback">
                              <?php echo $ssccgpa_msg; ?>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-right: 0;">
                          <label for="email">S.S.C Passout Year</label>
                            <select name="sscpassout" id="" class="form-control">
                                    <?php 
                                      if(isset($sscpassout) && $sscpassout != '')
                                      {
                                        ?>
                                          <option value="<?php echo $sscpassout;?>">
                                            <?php echo $sscpassout; ?>
                                          </option>
                                        <?php
                                      }
                                    ?>
                                    <option value="2026">2026</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                            </select>
                            <div class="invalid-feedback">
                              <?php echo $sscpassout_msg; ?>
                            </div>
                        </div>
                      </div>
                    </div>
            </div>
          </div>
        </fieldset>

        <fieldset class="scheduler-border">
          <legend class="scheduler-border">Other Details</legend>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2 h-100">
                <div class="row w-100 h-100" style="margin: 0;">
                  <div class="col-md" style="padding-left: 0;">
                    <label for="email">Cover Letter</label>
                    <textarea class="form-control" style="height: 75% !important" name="coverletter"><?php echo $coverletter; ?></textarea>
                    <div class="invalid-feedback"><?php echo $coverletter_msg; ?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group mb-2">
                      <div class="row w-100" style="margin: 0;">
                        <div class="col-md" style="padding-left: 0;">
                          <label for="email">Intrest Area</label>
                            <input id="email" type="text" class="form-control" name="intrestarea" value="<?php echo $intrestarea; ?>">
                            <div class="invalid-feedback">
                              <?php echo $intrestarea_msg; ?>
                            </div>
                        </div>
                      </div>
                      <div class="row w-100" style="margin: 0;">
                        <div class="col-md" style="padding-left: 0;">
                          <label for="email">Upload Resume / CV</label>
                            <input id="email" type="file" class="form-control" name="uploadcv" value="<?php echo $uploadcv; ?>">
                            <div class="invalid-feedback">
                              <?php echo $uploadcv_msg; ?>
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
                          <label for="email">GitHub</label>
                            <input id="email" type="url" class="form-control" name="github" value="<?php echo $github; ?>">
                            <div class="invalid-feedback">
                              <?php echo $github_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">LinkedIn</label>
                            <input id="email" type="url" class="form-control" name="linkedin" value="<?php echo $linkedin; ?>">
                            <div class="invalid-feedback">
                              <?php echo $linkedin_msg; ?>
                            </div>
                        </div>
                        <div class="col-md" style="padding-right: 0;">
                          <label for="email">Skype</label>
                            <input id="email" type="url" class="form-control" name="skype" value="<?php echo $skype; ?>">
                            <div class="invalid-feedback">
                              <?php echo $skype_msg; ?>
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
                  <input type="submit" name="submit" value="Update" class="btn btn-success  py-2 px-5">
                </div>
              </div>
        </form>
      </div>
    </section>


<?php
  include 'footer.php';
?>