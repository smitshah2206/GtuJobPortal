
    <?php
      $titlename = "Blog Post";
      include 'header.php';
      $blog_list = blog_list($conn);
      $email_msg = '';
      $email = '';
      if(isset($_POST['submit']))
      {
        $email = input_data($_POST['email']);
        $email_validation = 0;

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
        if($email_validation == 0)
        {
          if(news_letter_insert($conn,$_POST))
          {
            $msg = 'Subcribe Sucessfully .!';
            $link = 'blog.php';
            redirect_link($msg,$link);
          }
          else
          {
            $msg = 'Some thing went wrong .!';
            $link = 'blog.php';
            redirect_link($msg,$link);
          }
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
    </style>
    <?php
      include 'navigation.php';
    ?>


    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-10 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-4">Blog <span>Post</span></h2>
          </div>
        </div>
        <div class="row d-flex">
          <?php
            while ($row = mysqli_fetch_array($blog_list)) {
              ?>
              <div class="col-md-3 d-flex ftco-animate">
               
                <div class="blog-entry align-self-stretch justify-content-center align-items-center d-flex flex-column">
                   <img src="<?php echo Blog_Image_Url.$row['image']; ?>" style = 'background-size: cover;height:250px;width: 250px;' class="justify-content-center align-items-center d-flex">
                  <div class="text mt-3">
                    <div class="meta mb-2">
                      <div><a href="#"><?php echo date("F d, Y",strtotime($row['created_time']));?></a></div>
                    </div>
                    <h3 class="heading"><a href="#"><?php echo $row['heading'];?></a></h3>
                   <p><?php echo $row['description'];?></p>
                  </div>
                </div>
              </div>
              <?php
            }
          ?>
        </div>
      </div>
    </section>
		
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="blog.php" class="subscribe-form" method="post">
                    <div class="form-group d-flex">
                      <input type="email" class="form-control" name="email" placeholder="Enter email address" value='<?php echo $email; ?>' required>
                      
                      <input type="submit" name="submit" value="Subscribe" class="submit px-3">
                    </div>
                    <div class="invalid-feedback">
                          <?php echo $email_msg;?>
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
      include 'footer.php';
    ?>