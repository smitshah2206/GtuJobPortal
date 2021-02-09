    <?php
      include 'header.php';

      $enno_msg = '';
      $email_msg = '';
      $category = '';
      $enno = '';
      $email = '';
      $msg = '';
      
      if(isset($_POST['submit']))
      {

        $category = input_data($_POST['category']);
        $enno = input_data($_POST['enno']);
        $email = input_data($_POST['email']);
        
        $enno_validation = 0;
        $email_validation = 0;
        if($category == 'Candidate')
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

            if ($enno_validation == 0) {
              
              if (!employee_eno_exist($conn,$enno))
                {
                  $encrypt_eno = $enno * 192837465;
                  $msg = '';
                  $link = 'create_password.php?eno='.$encrypt_eno;
                  redirect_link($msg,$link);
                }
                else
                {
                  $msg = 'This Enrollement Number is not available.';
                }
            }
          }
          else if($category == 'Company')
          {
            

            // Email 

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

            if ($email_validation == 0) {
               if (!company_email_exist($conn,$email))
                {
                  /*$encrypt_email = openssl_encrypt($email, "AES-128-ECB", '192837465');*/
                  $msg = '';
                  $link = 'create_password.php?email='.$email;
                  redirect_link($msg,$link);
                }
                else
                {
                  $email_msg = 'This Email Address is not available.';
                }
            }
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
                <form method="POST" class="my-login-validation" action="forgot_password.php">
                  
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

                  <div class="form-group mb-2" id="resultdropdown1">
                    <label for="email">Enrollment No</label>
                    <input id="enno" type="number" class="form-control" name="enno" value='<?php echo $enno; ?>'>
                        <div class="invalid-feedback">
                          <?php echo $enno_msg;?>
                    </div>
                  </div>

                  <div class="form-group mb-2" id="resultdropdown2" style="display: none;">
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value='<?php echo $email; ?>'>
                    <div class="invalid-feedback">
                        <?php echo $email_msg;?>
                    </div>
                  </div>

                  <div class="form-group m-0">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                      Generate Password
                    </button>
                  </div>
                  <div class="mt-4 text-center">
                    Don't have an account? <a href="signup.php">Create One</a>
                    <div class="invalid-feedback">
                        <?php echo $msg;?>
                      </div>
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