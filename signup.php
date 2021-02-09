    <?php
      include 'header.php';
      
      $firstname_msg = '';
      $lastname_msg = '';
      $enno_msg = '';
      $email_msg = '';
      $password_msg = '';
      $confirm_password_msg = '';
      $agree_msg = '';
      $category = '';
      $firstname = '';
      $lastname = '';
      $enno = '';
      $email = '';
      $password = '';
      $confirm_password = '';

      if(isset($_POST['submit']))
      {

        $category = input_data($_POST['category']);
        $firstname = input_data($_POST['firstname']);
        $lastname = input_data($_POST['lastname']);
        $enno = input_data($_POST['enno']);
        $email = input_data($_POST['email']);
        $password = input_data($_POST['password']);
        $confirm_password = input_data($_POST['confirm_password']);

        $firstname_validation = 0;
        $lastname_validation = 0;
        $enno_validation = 0;
        $email_validation = 0;
        $password_validation = 0;
        $confirm_password_validation = 0;
        $agree_validation = 0;

        if(isset($_POST['agree']))
        {
          $agree = $_POST['agree'];
          if($category == 'Candidate')
          {
            //First Name

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


            //Last Name

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

            //Enrollement Number

            if($enno)
            {

              if (ctype_digit($enno))
              {
                if (employee_eno_exist($conn,$enno))
                {
                  $enno_validation = 0;
                }
                else
                {
                  $enno_msg = 'Enrollement number is already used.';
                  $enno_validation = 1;
                }
              }
              else
              {
                $enno_validation = 'Only Number is required';
                $enno_validation = 1;
              }
              
            }
            else
            {
              $enno_msg = 'Enrollement No is required';
              $enno_validation = 1;
            }

            // Email 

            if($email)
            {

              if (filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                if (employee_email_exist($conn,$email))
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

            //Password 
            if($password)
            {

              if (strlen($password) >= 8)
              {
                $password_validation = 0;
              }
              else
              {
                $password_msg = 'Password should be greater than 8 Digit.';
                $password_validation = 1;
              }
              
            }
            else
            {
              $password_msg = 'Password is required';
              $password_validation = 1;
            }

            //Confirm Password 
            if($confirm_password)
            {

              if (strlen($confirm_password) >= 8)
              {
               
                if($confirm_password == $password)
                {
                   $confirm_password_validation = 0;
                }
                else
                {
                  $confirm_password_msg = 'Password and Confirm Password does not match.';
                  $confirm_password_validation = 1;
                }

              }
              else
              {
                $confirm_password_msg = 'Confirm Password should be greater than 8 Digit.';
                $confirm_password_validation = 1;
              }
              
            }
            else
            {
              $confirm_password_msg = 'Confirm Password is required';
              $confirm_password_validation = 1;
            }

            // Insert Query
            if($firstname_validation == 0 && $lastname_validation == 0 && $enno_validation == 0 && $email_validation == 0 && $password_validation == 0 && $confirm_password_validation == 0 )
            {
                if(employee_insert($conn,$_POST))
                {
                  $msg = 'Account Sucessfully Created .!';
                  $link = 'signin.php';
                  redirect_link($msg,$link);
                }
                else
                {
                  $msg = 'Some thing went wrong .!';
                  $link = 'signup.php';
                  redirect_link($msg,$link);
                }
            }
          }
          else if($category == 'Company')
          {
            //First Name

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


            //Last Name

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


            // Email 

            if($email)
            {

              if (filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                if (company_email_exist($conn,$email))
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

            //Password 
            if($password)
            {

              if (strlen($password) >= 8)
              {
                $password_validation = 0;
              }
              else
              {
                $password_msg = 'Password should be greater than 8 Digit.';
                $password_validation = 1;
              }
              
            }
            else
            {
              $password_msg = 'Password is required';
              $password_validation = 1;
            }

            //Confirm Password 
            if($confirm_password)
            {

              if (strlen($confirm_password) >= 8)
              {
               
                if($confirm_password == $password)
                {
                   $confirm_password_validation = 0;
                }
                else
                {
                  $confirm_password_msg = 'Password and Confirm Password does not match.';
                  $confirm_password_validation = 1;
                }

              }
              else
              {
                $confirm_password_msg = 'Confirm Password should be greater than 8 Digit.';
                $confirm_password_validation = 1;
              }
              
            }
            else
            {
              $confirm_password_msg = 'Confirm Password is required';
              $confirm_password_validation = 1;
            }

            // Insert Query
            if($firstname_validation == 0 && $lastname_validation == 0 && $email_validation == 0 && $password_validation == 0 && $confirm_password_validation == 0 )
            {
                if(company_insert($conn,$_POST))
                {
                  $msg = 'Account Sucessfully Created .!';
                  $link = 'signin.php';
                  redirect_link($msg,$link);
                }
                else
                {
                  $msg = 'Some thing went wrong .!';
                  $link = 'signup.php';
                  redirect_link($msg,$link);
                }
            }
          }
        }
        else
        {
          $agree_msg = 'You must agree with our Terms and Conditions';
        }
      }

    ?>
    <style type="text/css">
      
      html,body {
      }

      body {
        background-color: #f7f9fb;
        font-size: 14px;
      }

  

      .card-wrapper {
        width: auto;
      }

      .card {
        border-color: transparent;
        box-shadow: 0 4px 8px rgba(0,0,0,.05);
      }

      .card.fat {
        padding: 10px;
      }

      .form-control {
        border-width: 2.3px;
        height: unset !important;
        outline: 1;
      }

      .form-group label {
        width: 100%;
      }

      .btn.btn-block {
        padding: 12px 10px;
      }

      @media screen and (max-width: 425px) {
        .card-wrapper {
          width: 90%;
          margin: 0 auto;
        }
      }

      @media screen and (max-width: 320px) {
        .card.fat {
          padding: 0;
        }

        .card.fat .card-body {
          padding: 15px;
        }
      }



    </style>
    <?php
      include 'navigation.php';
    ?>
    <section class="h-100" style="margin-top: 8rem; margin-bottom: 8rem;">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="card-wrapper">
            <div class="card fat">
              <div class="card-body">
                <h2 class="card-title text-center">Start a New Journey with us !</h2>
                <form method="POST" class="my-login-validation" novalidate="" action="signup.php">
                  
                  <div class="form-group mb-2 float-right">
                    <select class="form-control" style="padding: 0.01rem;color: #999999 !important;" id="selectdropdown" name="category">
                      <?php

                          if($category == 'Company')
                          {
                            ?>
                              <option value="Candidate">Candidate</option>
                              <option value="Company" selected>Company</option>
                            <?php
                          }
                          else
                          {
                            ?>
                              <option value="Candidate" selected>Candidate</option>
                              <option value="Company">Company</option>
                              
                            <?php
                          } 
                      ?>
                    </select>
                  </div>

                  <div class="form-group mb-2">
                    <div class="row w-100" style="margin: 0;">
                      <div class="col-md" style="padding-left: 0;">
                        <label for="email">First Name</label>
                          <input id="email" type="text" class="form-control" name="firstname" value='<?php echo $firstname; ?>' required>
                          <div class="invalid-feedback">
                            <?php echo $firstname_msg;?>
                          </div>
                      </div>
                      <div class="col-md" style="padding-right: 0;">
                        <label for="email">Last Name</label>
                          <input id="email" type="text" class="form-control" name="lastname" value='<?php echo $lastname; ?>'>
                          <div class="invalid-feedback">
                            <?php echo $lastname_msg;?>
                          </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-2">
                    <div class="row w-100" style="margin: 0;">
                      <div class="col-md" style="padding-left: 0;" id="resultdropdown1">
                        <label for="enno">Enrollment No</label>
                        <input id="enno" type="number" class="form-control" name="enno" required value='<?php echo $enno; ?>'>
                        <div class="invalid-feedback">
                          <?php echo $enno_msg;?>
                        </div>
                      </div>
                      <div class="col-md" style="padding-right: 0;" id="resultdropdown2">
                        <label for="email">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value='<?php echo $email; ?>' required>
                        <div class="invalid-feedback">
                          <?php echo $email_msg;?>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  

                  <div class="form-group mb-2">
                    <div class="row w-100" style="margin: 0;">
                      <div class="col-md" style="padding-left: 0;">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required data-eye value='<?php echo $password; ?>'>
                        <div class="invalid-feedback">
                          <?php echo $password_msg;?>
                        </div>
                      </div>
                      <div class="col-md" style="padding-right: 0;">
                        <label for="password">Confirm Password</label>
                        <input id="password" type="password" class="form-control" name="confirm_password" required data-eye value='<?php echo $confirm_password; ?>'>
                        <div class="invalid-feedback">
                          <?php echo $confirm_password_msg;?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-checkbox custom-control">
                      <input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
                      <label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
                      <div class="invalid-feedback">
                        <?php echo $agree_msg;?>
                      </div>
                    </div>
                  </div>

                  <div class="form-group m-0">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                      Register
                    </button>
                  </div>
                  <div class="mt-4 text-center">
                    Already have an account? <a href="signin.php">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
      include 'footer.php';
    ?>

    <script type="text/javascript">
      function resultdropdown()
      {
        if($('#selectdropdown').val() == 'Candidate')
        {
          $('#resultdropdown1').css('display','block');
        }
        else if($('#selectdropdown').val() == 'Company')
        {
          $('#resultdropdown1').css('display','none');
          $('#resultdropdown2').css('padding','0');
        }
      }
      resultdropdown();
      $("#selectdropdown").change(resultdropdown);
    </script>