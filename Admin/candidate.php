<?php
      include 'header.php';
      $employee_name = '';
      $employee_location = '';
      $round_status = '';
      if (isset($_GET['employee_name'])){
        $employee_name = trim($_GET['employee_name']);
      } 
      if (isset($_GET['employee_location'])) {
        $employee_location = trim($_GET['employee_location']);
      }
      if (isset($_GET['round_status'])) {
        $round_status = trim($_GET['round_status']);
      }

      $total_candidate = total_candidate($conn,'',$round_status,'id',$employee_name,$employee_location);
      $find_candidate_list = find_candidate($conn);
      $candidate_location_list = find_location($conn);
    ?>
    <style type="text/css">
      .ftco-navbar-light .navbar-nav > .nav-item:nth-child(2) > .nav-link
      {
        color: #95a5a6;
      }
      .ftco-navbar-light.scrolled .nav-item:nth-child(2) > a
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
              <form action="candidate.php" class="search-job">
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <div class="form-field">
                        <div class="icon">
                          <span class="icon-user"></span>
                        </div>
                        <input type="text" class="form-control" name="employee_name" placeholder="eg. Adam Scott" value="<?php echo $employee_name;?>" list="employee_name" autocomplete="off">
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
                        <div class="icon">
                          <span class="icon-map-marker"></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Location" name="employee_location" value="<?php echo $employee_location;?>" list="employee_location" autocomplete="off">
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
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="form-field">
                        <input type="submit" value="Search" class="form-control btn btn-primary">
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section class="ftco-section bg-light" style="padding: 1rem 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-9 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-4">Candidate <span>Profile</span></h2>
          </div>
          <div class="col-md heading-section ftco-animate fadeInUp ftco-animated pr-3 d-flex justify-content-center align-items-center">
              <select class="form-control" style="height:auto !important;outline:none;color: #34495e !important;background-color:transparent !important;" id="selectdropdown" name="round_status">
                <option value="">All</option>
                <option value="2" id="2">Active</option>
                <option value="3">Deactive</option>
                <option value="1">Profile Update Pending</option>
              </select>
            </form>
          </div>
        </div>
        <div class="row" id="resultBody">
          <?php
            while ($row = mysqli_fetch_array($total_candidate)) 
            {
              ?>
                <div class="col-md-12 ftco-animate">
                  <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                    <div class="mb-4 mb-md-0 mr-5">
                      <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h3"><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3"><span class="icon-layers"></span> <a><?php echo $row['colleagename'];?></a></div>
                        <div><span class="icon-my_location"></span> <span><?php echo $row['district'].','.$row['state'];?></span></div>
                      </div>
                    </div>

                    <div class="ml-auto d-flex">
                      <?php
                        if ($row['status'] == 3) {
                          ?>
                          <a href="candidate_change_status.php?employee_id=<?php echo $row['id'];?>&status=2" class="btn btn-warning py-2 mr-1">Active</a>
                          <?php
                        } elseif ($row['status'] == 2) {
                          ?>
                          <a href="candidate_change_status.php?employee_id=<?php echo $row['id'];?>&status=3" class="btn btn-danger py-2 mr-1">Deactive</a>
                          <?php
                        }
                      ?>
                      <a href="candidate_details.php?employee_id=<?php echo $row['id']; ?>&status=1" class="btn btn-primary py-2 mr-1">More Details</a>
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
                <a href="" class="btn btn-success py-2 mr-1">More Student Coming Soon</a>
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
      $('#selectdropdown').on('change',function() {
        var status_number = $('#selectdropdown').val();
        var employee_name = $('#employee_name').val();
        var employee_location = $('#employee_location').val();
        $.ajax({
          url:"fetch_candidate_status_details.php",
          type: "POST",
          data: 'status_number='+status_number+'&employee_name='+employee_name+'&employee_location='+employee_location,
          dataType:"json",
          cache:false,
          processData:false,
          success:function(data)
          {
            $('#resultBody').html(data.dataBody);
          }
        })
      });
    </script>