    <?php
      $titlename = 'Home Page';
      include 'header.php';
      $allpost_job = employee_total_post_job($conn,10,'job_deadlinedate');
      $job_title = job_post_counter($conn,'job_title');
      $job_type = job_post_counter($conn,'job_type');
      $blog_list = blog_list($conn,4);
      $job_category_list = job_category($conn);
      $job_location_list = job_location($conn);
      $find_candidate_list = find_candidate($conn);
      $find_skill_list = find_skill($conn);
      $candidate_location_list = find_location($conn);
    ?>
    <style type="text/css">
      .ftco-navbar-light .navbar-nav > .nav-item:hover > .nav-link{
        color: grey;
      }
      .ftco-navbar-light .navbar-nav > .nav-item:nth-child(1) > .nav-link
      {
        color: grey;
        //opacity: 0.4 !important;
      }
      .ftco-navbar-light.scrolled .nav-item:nth-child(1) > a
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
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/about_gtu.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have great job offers you deserve!</p>
            <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream <br><span>Job is Waiting</span></h1>

						<div class="ftco-search">
							<div class="row">
		            <div class="col-md-12 nav-link-wrap">
			            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Job</a>

			              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Find a Candidate</a>

			            </div>
			          </div>
			          <div class="col-md-12 tab-wrap">
			            
			            <div class="tab-content p-4" id="v-pills-tabContent">

			              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
			              	<form action="search_details.php" class="search-job" method="get">
                        <input type="hidden" class="form-control" name="type" value="Company">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-briefcase"></span></div>
								                <input type="text" class="form-control" placeholder="eg. Garphic. Web Developer" name="job_category" list="job_category" autocomplete="off">
                                <datalist id="job_category">
                                  <?php
                                    while ($row = mysqli_fetch_array($job_category_list)){
                                      ?>
                                        <option value="<?php echo $row['job_title'];?>">
                                      <?php
                                     } 
                                  ?>
                                </datalist>
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="select-wrap">
						                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
						                      <select name="job_type" id="" class="form-control">
						                      	<option value="Full Time">Full Time</option>
						                        <option value="Part Time">Part Time</option>
						                        <option value="Freelance">Freelance</option>
						                        <option value="Internship">Internship</option>
						                      </select>
						                    </div>
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="icon"><span class="icon-map-marker"></span></div>
								                <input type="text" name="job_location" class="form-control" placeholder="Location" autocomplete="off" list="job_location">
                                <datalist id="job_location">
                                  <?php
                                    while ($row = mysqli_fetch_array($job_location_list)){
                                      ?>
                                        <option value="<?php echo $row['job_location'];?>">
                                      <?php
                                     } 
                                  ?>
                                </datalist>
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
								                <input type="submit" value="Search" class="form-control btn btn-primary">
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>

			              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
			              	<form action="search_details.php" class="search-job">
                        <input type="hidden" class="form-control" name="type" value="Employee">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-user"></span></div>
								                <input type="text" class="form-control" name="employee_name" placeholder="eg. Adam Scott" list="employee_name" autocomplete="off">
                                <datalist id="employee_name">
                                  <?php
                                    while ($row = mysqli_fetch_array($find_candidate_list)){
                                      ?>
                                        <option value="<?php echo $row['firstname'];?>">
                                      <?php
                                     } 
                                  ?>
                                </datalist>
								              </div>
							              </div>
			              			</div>
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="select-wrap">
                                  <div class="icon">
                                    <span class="icon-briefcase"></span>
                                  </div>
                                  <input type="text" class="form-control" name="employee_skill" placeholder="eg. Web Devloper" list="employee_skill" autocomplete="off">
                                <datalist id="employee_skill">
                                          <?php
                                            while ($row = mysqli_fetch_array($find_skill_list)){
                                              ?>
                                                <option value="<?php echo $row['intrestarea'];?>">
                                              <?php
                                             } 
                                          ?>
                                        </datalist>
                                </div>
                              </div>
                            </div>
                          </div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="icon"><span class="icon-map-marker"></span></div>
								                <input type="text" class="form-control" placeholder="Location" name="employee_location" list="employee_location" autocomplete="off">
                                <datalist id="employee_location">
                                  <?php
                                    while ($row = mysqli_fetch_array($candidate_location_list)){
                                      ?>
                                        <option value="<?php echo $row['district'];?>">
                                      <?php
                                     } 
                                  ?>
                                </datalist>
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
								                <input type="submit" value="Search" class="form-control btn btn-primary">
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>
			            </div>
			          </div>
			        </div>
		        </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-counter">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Categories work wating for you</span>
            <h2 class="mb-4"><span>Current</span> Job Posts</h2>
          </div>
        </div>
        <div class="row">
          
        	<?php
            while ($row = mysqli_fetch_array($job_title)) {
            ?>
              <div class="col-md-3 ftco-animate">
                <ul class="category">
                  <li><a href="search_details.php?type=Company&job_category=<?php echo $row['title'];?>&job_type=Full+Time&job_location="><?php echo $row['title'];?><span class="number ml-3" data-number="<?php echo $row['count'];?>"><?php echo $row['count'];?></span></a></li>
                </ul>
              </div>
            <?php
            }
          ?>
          <?php
            while ($row = mysqli_fetch_array($job_type)) {
            ?>
              <div class="col-md-3 ftco-animate">
                <ul class="category">
                  <li><a href="search_details.php?type=Company&job_category=&job_type=<?php echo $row['title'];?>&job_location="><?php echo $row['title'];?><span class="number ml-3" data-number="<?php echo $row['count'];?>"><?php echo $row['count'];?></span></a></li>
                </ul>
              </div>
            <?php
            }
          ?>
        </div>
    	</div>
    </section>

		<section class="ftco-section bg-light" style="padding: 3em 0;">
			<div class="container">
				<div class="row justify-content-center mb-2 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Recently Added Jobs</span>
            <h2 class="mb-1"><span>Recent</span> Jobs</h2>
          </div>
        </div>
				<div class="row">
          <?php
            $allpost_job_count = 0;
            while ($row = mysqli_fetch_array($allpost_job)) 
            {
              $allpost_job_count += 1;
              $color_value = color_label($row['job_type']);
              ?>
                <div class="col-md-12 ftco-animate">
                  <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center ">
                    <div class="d-flex mr-5">
                      <a href="<?php echo $row['company_website']; ?>" target = "_blank"><img src="<?php echo Company_Logo_Url.$row['company_logo']; ?>" alt="<?php echo $row['company_name']; ?>" style = 'background-size: cover;width:70px;height:70px;'></a>
                    </div>
                    
                    <div class="mb-4 mb-md-0 mr-5">
                      <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h3"><?php echo $row['job_title'];?></h2>
                        <div class="badge-wrap">
                         <span class="<?php echo $color_value; ?> text-white badge py-2 px-3"><?php echo $row['job_type'];?></span>
                        </div>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="<?php echo $row['company_website'];?>" target="_blank"><?php echo $row['company_name'];?></a></div>
                        <div><span class="icon-my_location"></span> <span><?php echo $row['job_location'];?></span></div>
                      </div>
                    </div>

                    <div class="ml-auto d-flex justify-content-center align-items-center flex-column">
                      <a href="job_details.php?post_id=<?php echo $row['id']; ?>" class="btn btn-primary py-2 mr-1">More Details</a>
                      <span><?php echo date("F d, Y",strtotime($row['job_deadlinedate']));?></span>
                    </div>
                  </div>
                </div>
              <?php
            } 
              ?>
            <div class="col-md-12 ftco-animate">
              <div class="p-4 d-block align-items-center">
                <div class="justify-content-center align-items-center d-flex">
                  <a href="signin.php" class="btn btn-success py-2 mr-1">Create a New Post</a>
                </div>
              </div>
            </div>
				</div>
			</div>
		</section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Our Blog</span>
            <h2><span>Recent</span> Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <?php
            while ($row = mysqli_fetch_array($blog_list)) {
              ?>
              <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
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
	

    <?php
      include 'footer.php';
    ?>