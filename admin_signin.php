    <?php
      $titlename = "Admin Signin";
      include 'header.php';
      include 'admin_function.php';
      $email_msg = '';
      $password_msg = '';
      $email = '';
      $password = '';
      $msg = '';
      
      if(isset($_POST['submit']))
      {

        $email = input_data($_POST['email']);
        $password = input_data($_POST['password']);
        
        $email_validation = 0;
        $password_validation = 0;
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

        if($email_validation == 0 && $password_validation == 0 )
        {
            if(admin_select($conn,$_POST))
            {
              admin_session($conn,$_POST);
              $msg = 'Welcome .!';
              $link = 'Admin/index.php';
              redirect_link($msg,$link);
            }
            else
            {
              $msg = 'Email Address & Password does not match .!';
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
                <form method="POST" class="my-login-validation" action="admin_signin.php">

                  <div class="form-group mb-2" id="resultdropdown2">
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value='<?php echo $email; ?>'>
                    <div class="invalid-feedback">
                        <?php echo $email_msg;?>
                    </div>
                  </div>

                  <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password"  data-eye value='<?php echo $password; ?>'>
                      <div class="invalid-feedback">
                        <?php echo $password_msg;?>
                      </div>
                  </div>

                  <div class="form-group m-0">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                      Login
                    </button>
                  </div>
                  <div class="mt-4 text-center">
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