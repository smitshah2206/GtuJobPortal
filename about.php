    <?php
      $titlename = 'About Us';
      include 'header.php';
      $total_post_job_counter = total_post_job_counter($conn,'');
      $total_candidate_counter = total_candidate_counter($conn,'');
      $total_company_counter = total_company_counter($conn,'');
      $testimonialList = testimonial_list($conn);
    ?>
    <style type="text/css">
      .ftco-navbar-light .navbar-nav > .nav-item:nth-child(4) > .nav-link
      {
        color: #95a5a6;
      }
      .ftco-navbar-light.scrolled .nav-item:nth-child(4) > a
      {
        color: #157efb !important;
      }
    </style>
    <?php

      include 'navigation.php';
    ?>
    <!-- END nav -->
    
    <section class="ftco-section services-section bg-light d-md-flex" style="padding:1rem 0;">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-resume"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Millions of Jobs</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-collaboration"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Easy To Manage Jobs</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-promotions"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Top Careers</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-employee"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Expert Candidates</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section testimony-section" style="padding:1rem 0;">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Testimonial</span>
            <h2 class="mb-4"><span>Happy</span> Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <?php
                if (isset($testimonialList) && !empty($testimonialList)) {
                  while ($row = mysqli_fetch_array($testimonialList)) {
                    ?>
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
                            </div>
                          </div>
                    <?php
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-color: #222831" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?php echo $total_post_job_counter;?>"><?php echo $total_post_job_counter;?></strong>
		                <span>Jobs</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?php echo $total_candidate_counter;?>"><?php echo $total_candidate_counter;?></strong>
		                <span>Members</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?php echo $total_candidate_counter;?>"><?php echo $total_candidate_counter;?></strong>
		                <span>Resume</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?php echo $total_company_counter;?>"><?php echo $total_company_counter;?></strong>
		                <span>Company</span>
		              </div>
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