    <?php
      include 'header.php';

      $enno_msg = '';
      $email_msg = '';
      $password_msg = '';
      $confirmpassword_msg = '';
      
      $enno = '';
      $email = '';
      $password = '';
      $confirmpassword = '';

      if (isset($_GET['eno'])) {
        $enno = $_GET['eno'] / 192837465;
      } else if (isset($_GET['email'])) {
        $email = $_GET['email'];
      } 
      
      if(isset($_POST['submit']))
      {

        $enno = input_data($_POST['enno']);
        $email = input_data($_POST['email']);
        $password = input_data($_POST['password']);
        $confirmpassword = input_data($_POST['confirmpassword']);
        
        $enno_validation = 0;
        $email_validation = 0;
        $password_validation = 0;
        $confirmpassword_validation = 0;
        
        if (isset($enno) && !empty($enno)) 
        {
            //Enrollement Number
            if($enno)
            {

              if (ctype_digit($enno))
              {
                $enno_validation = 0;
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

            //Password 
            if($confirmpassword)
            {

              if (strlen($confirmpassword) >= 8)
              {
                if ($password === $confirmpassword) {
                  $confirmpassword_validation = 0;
                } else {
                  $confirmpassword_msg = 'Password and Confirm Password does not match.';
                $confirmpassword_validation = 1;
                }
              }
              else
              {
                $confirmpassword_msg = 'Confirm Password should be greater than 8 Digit.';
                $confirmpassword_validation = 1;
              }
              
            }
            else
            {
              $confirmpassword_msg = 'Confirm Password is required';
              $confirmpassword_validation = 1;
            }

            if ($enno_validation == 0 && $password_validation == 0 && $confirmpassword_validation == 0) {

              if (!employee_eno_exist($conn,$enno))
                {
                  $enno_validation = 0;
                }
                else
                {
                  $msg = 'Something went wrong .!';
                  $link = 'signin.php';
                  redirect_link($msg,$link);
                }
            }
            // Select Query

            if($enno_validation == 0 && $password_validation == 0 && $confirmpassword_validation == 0)
            {
                if(employee_password_update($conn,$_POST))
                {
                  $msg = 'Password Updated .!';
                  $link = 'signin.php';
                  redirect_link($msg,$link);
                }
                else
                {
                  $msg = 'Something went wrong .!';
                  $link = 'signin.php';
                  redirect_link($msg,$link);
                }
            }  
        }
        else if(isset($email) && !empty($email))
        {
            if($email)
            {

              if (filter_var($email, FILTER_VALIDATE_EMAIL))
              {
               $email_validation = 0;
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

            //Password 
            if($confirmpassword)
            {

              if (strlen($confirmpassword) >= 8)
              {
                if ($password === $confirmpassword) {
                  $confirmpassword_validation = 0;
                } else {
                  $confirmpassword_msg = 'Password and Confirm Password does not match.';
                $confirmpassword_validation = 1;
                }
              }
              else
              {
                $confirmpassword_msg = 'Confirm Password should be greater than 8 Digit.';
                $confirmpassword_validation = 1;
              }
              
            }
            else
            {
              $confirmpassword_msg = 'Confirm Password is required';
              $confirmpassword_validation = 1;
            }

            if ($email_validation == 0 && $password_validation == 0 && $confirmpassword_validation == 0) {

              if (!company_email_exist($conn,$email))
                {
                  $email_validation = 0;
                }
                else
                {
                  $msg = 'Something went wrong .!';
                  $link = 'signin.php';
                  redirect_link($msg,$link);
                }
            }
            // Select Query

            if($email_validation == 0 && $password_validation == 0 && $confirmpassword_validation == 0)
            {
                if(company_password_update($conn,$_POST))
                {
                  $msg = 'Password Updated .!';
                  $link = 'signin.php';
                  redirect_link($msg,$link);
                }
                else
                {
                  $msg = 'Something went wrong .!';
                  $link = 'signin.php';
                  redirect_link($msg,$link);
                }
            }
        }
        else 
        {
          $msg = '';
          $link = 'index.php';
          redirect_link($msg,$link);
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
        width: 400px;
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
                <h2 class="card-title text-center">Welcome Back !</h2>
                <form method="POST" class="my-login-validation" action="create_password.php">
                  <div class="form-group mb-2" id="resultdropdown1" style="display: none;">
                    <input id="enno" type="hidden" class="form-control" name="enno" value='<?php echo $enno; ?>'>
                        <div class="invalid-feedback">
                          <?php echo $enno_msg;?>
                    </div>
                  </div>

                  <div class="form-group mb-2" id="resultdropdown2" style="display: none;">
                    <input id="email" type="hidden" class="form-control" name="email" value='<?php echo $email; ?>'>
                    <div class="invalid-feedback">
                        <?php echo $email_msg;?>
                    </div>
                  </div>

                  <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password"  data-eye value='<?php echo $password; ?>'>
                      <div class="invalid-feedback">
                        <?php echo $password_msg;?>
                      </div>
                  </div>

                  <div class="form-group mb-2">
                    <label for="password">Confirm Password</label>
                    <input id="password" type="password" class="form-control" name="confirmpassword"  data-eye value='<?php echo $confirmpassword; ?>'>
                      <div class="invalid-feedback">
                        <?php echo $confirmpassword_msg;?>
                      </div>
                  </div>

                  <div class="form-group m-0">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                      Submit
                    </button>
                  </div>
                  <div class="mt-4 text-center">
                    Don't have an account? <a href="signup.php">Create One</a>
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
          $('#resultdropdown2').css('display','none');
        }
        else if($('#selectdropdown').val() == 'Company')
        {
          $('#resultdropdown1').css('display','none');
          $('#resultdropdown2').css('display','block');
        }
      }
      resultdropdown();
      $("#selectdropdown").change(resultdropdown);
    </script>