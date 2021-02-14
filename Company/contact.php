    <?php
      $titlename = "Contact Us";
      include 'header.php';
      $name_msg = '';
      $email_msg = '';
      $subject_msg = '';
      $message_msg = '';
      $name = '';
      $email = '';
      $subject = '';
      $message = '';
      if(isset($_POST['submit'])){
        $name = input_data($_POST['name']);
        $email = input_data($_POST['email']);
        $subject = input_data($_POST['subject']);
        $message = input_data($_POST['message']);

        $name_validation = 0;
        $email_validation = 0;
        $subject_validation = 0;
        $message_validation = 0;

            if($name)
            {

              if (ctype_alpha(str_replace(' ', '', $name)))
              {
                $name_validation = 0;
              }
              else
              {
                $name_msg = 'Only Character is required';
                $name_validation = 1;
              }
              
            }
            else
            {
              $name_msg = 'Name is required';
              $name_validation = 1;
            }


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

            if($subject)
            {
              if (strlen($subject) < 120) 
              {
                $subject_validation = 0;
              }
              else
              {
                $subject_msg = 'Less than 120 letter required';
                $subject_validation = 1;
              }
            }
            else
            {
              $subject_msg = 'This is required';
              $subject_validation = 1;
            }

            if($message)
            {
              if (strlen($message) < 250) 
              {
                $message_validation = 0;
              }
              else
              {
                $message_msg = 'Less than 250 letter required';
                $message_validation = 1;
              }
            }
            else
            {
              $message_msg = 'This is required';
              $message_validation = 1;
            }

            if($name_validation == 0 && $email_validation == 0 && $subject_validation == 0 && $message_validation == 0){
              if(contact_insert($conn,$_POST))
              {
                $msg = 'Our agent connect with you shortly .!';
                $link = BASE_URL.'Company/contact.php';
                redirect_link($msg,$link);
              }
              else
              {
                $msg = 'Some thing went wrong .!';
                $link = BASE_URL.'Company/contact.php';
                redirect_link($msg,$link);
              }
            }
      }
    ?>
    <style type="text/css">
      .ftco-navbar-light .navbar-nav > .nav-item:nth-child(6) > .nav-link
      {
        color: #95a5a6;
      }
      .ftco-navbar-light.scrolled .nav-item:nth-child(6) > a
      {
        color: #157efb !important;
      }
    </style>
    <?php
      include 'navigation.php';
    ?>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="#">yoursite.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="contact.php" method="Post" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $name;?>">
                <div class="invalid-feedback">
                  <?php echo $name_msg; ?>
                </div>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email;?>">
                <div class="invalid-feedback">
                  <?php echo $email_msg; ?>
                </div>
              </div>
              <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject" value="<?php echo $subject;?>">
                <div class="invalid-feedback">
                  <?php echo $subject_msg; ?>
                </div>
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"><?php echo $message;?></textarea>
                <div class="invalid-feedback">
                  <?php echo $message_msg; ?>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>
		

    <?php
      include 'footer.php';
    ?>