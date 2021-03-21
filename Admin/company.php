<?php
      $titlename = "Company Details";
      include 'header.php';
      $company_name = '';
      $company_location = '';
      if (isset($_GET['company_name'])){
        $company_name = trim($_GET['company_name']);
      } 
      if (isset($_GET['company_location'])) {
        $company_location = trim($_GET['company_location']);
      }
      $allpost_job = total_company($conn,'',2,$company_name,$company_location,3);
      $company_name_list = find_company($conn);
      $company_location_list = find_company_location($conn);
      $total_pending_company_counter = total_company_counter($conn,5);
    ?>
    <style type="text/css">
      .ftco-navbar-light .navbar-nav > .nav-item:nth-child(3) > .nav-link
      {
        color: #95a5a6;
      }
      .ftco-navbar-light.scrolled .nav-item:nth-child(3) > a
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

    <div class="ftco-search" style="margin-top: 7rem;">
      <div class="row">
        <div class="col-md-1">
          
        </div>
        <div class="col-md-10 tab-wrap">
          <div class="tab-content p-4" id="v-pills-tabContent">

                    <div class="tab-pane show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                      <form action="company.php" method="GET" class="search-job">
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="icon"><span class="icon-briefcase"></span></div>
                                <input type="text" class="form-control" name="company_name" placeholder="eg. Company Name" value="<?php echo $company_name;?>" list="company_name" autocomplete="off">
                                <datalist id="company_name">
                                  <?php
                                    while ($row = mysqli_fetch_array($company_name_list)){
                                      ?>
                                        <option value="<?php echo $row['company_name'];?>">
                                      <?php
                                     } 
                                  ?>
                                </datalist>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="icon"><span class="icon-map-marker"></span></div>
                                <input type="text" class="form-control" placeholder="Location" name="company_location" value="<?php echo $company_location;?>" list="company_location" autocomplete="off">
                                <datalist id="company_location">
                                  <?php
                                    while ($row = mysqli_fetch_array($company_location_list)){
                                      ?>
                                        <option value="<?php echo $row['company_district'];?>">
                                      <?php
                                     } 
                                  ?>
                                </datalist>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <div class="form-field">
                                <input type="submit" name="submit" value="Search" class="form-control btn btn-primary">
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
    <section class="ftco-section bg-light" style="padding: 1rem 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-10 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-4">Company <span>Profile</span></h2>
          </div>
          <div class="col-md-2 heading-section ftco-animate fadeInUp ftco-animated pl-3">
              <div class="ml-auto d-flex" style="width: 100%;height: 100%;justify-content: center;align-items: center;">
                <a href="pending_request.php" class="btn btn-success py-2 mr-1<?php if ($total_pending_company_counter == 0) { ?> disabled<?php } ?>"
                >Pending Request
                  <?php
                    if($total_pending_company_counter > 0)
                    {
                      ?>
                        &nbsp;&nbsp;&nbsp;<span class="badge badge-light"><?php echo $total_pending_company_counter;?></span> 
                      <?php
                    } 
                  ?>
                </a>
              </div>
          </div>
        </div>
        <div class="row">
          <?php
            while ($row = mysqli_fetch_array($allpost_job)) 
            {
              ?>
                <div class="col-md-12 ftco-animate">

                  <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                    <div class="d-flex mr-5">
                      <a href="<?php echo $row['company_website']; ?>" target = "_blank"><img src="<?php echo Company_Logo_Url.$row['company_logo']; ?>" alt="<?php echo $row['company_name']; ?>" style = 'background-size: cover;width:70px;height:70px;'></a>
                    </div>
                    <div class="mb-4 mb-md-0 mr-5">
                      <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h3"><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a href="<?php echo $row['company_website'];?>" target="_blank"><?php echo $row['company_name'];?></a></div>
                        <div><span class="icon-my_location"></span> <span><?php echo $row['company_district'];?></span></div>
                      </div>
                    </div>

                    <div class="ml-auto d-flex">
                      <?php
                        if ($row['status'] == 2) {
                          ?>
                          <a href="company_change_status.php?company_id=<?php echo $row['id'];?>&status=3" class="btn btn-danger py-2 mr-1">Deactive</a>
                          <?php
                        }
                        else if ($row['status'] == 3) {
                          ?>
                          <a href="company_change_status.php?company_id=<?php echo $row['id'];?>&status=2" class="btn btn-warning py-2 mr-1">Active</a>
                          <?php
                        }
                      ?>
                      <a href="company_details.php?company_id=<?php echo $row['id']; ?>&status=1" class="btn btn-primary py-2 mr-1">More Details</a>
                    </div>
                  </div>
                </div>
              <?php
            } 
          ?>
        </div>
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="p-4 d-block align-items-center">
              <div class="justify-content-center align-items-center d-flex">
                <a href="" class="btn btn-success py-2 mr-1">More Company Coming Soon</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
      include 'footer.php';
    ?>