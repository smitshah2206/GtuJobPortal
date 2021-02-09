    <?php
      include 'header.php';
      if(isset($_GET['post_id'])){
        $id = $_GET['post_id'];
        $current_job_details_check = fetch_job_details($conn,$id);
        $current_job_details_check_count = mysqli_num_rows($current_job_details_check);
        if($current_job_details_check_count > 0){
          $current_job_details = mysqli_fetch_array($current_job_details_check);
        }else{
          $msg = 'Something Went wrong !';
          $link = 'index.php';
          redirect_link($msg,$link);
        }
      }else{
        $link = 'index.php';
        redirect_link('',$link);
      }
      $candidate_list = company_candidate_list($conn,$id);

    ?>
    <link rel="stylesheet" type="text/css" href="../css/extra_style.css">
    <style type="text/css">
      .btn:not(:disabled):not(.disabled) {
        cursor: pointer;
      }

      .btn.btn-primary {
        background: #157efb !important;
        border: 1px solid #157efb !important;
        color: #fff !important;
      }
      .btn {
        cursor: pointer;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
      }
      .pb-2, .py-2 {
        padding-bottom: 0.5rem !important;
      }
      .pt-2, .py-2 {
        padding-top: 0.5rem !important;
      }
      .mr-1, .mx-1 {
        margin-right: 0.25rem !important;
      }
      .btn-primary {
        color: #212529;
        background-color: #78d5ef;
        border-color: #78d5ef;
      }
      .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        -o-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
      }
      a{
        color: #157efb;
      }
      a:hover, a:focus {
        text-decoration: none;
        color: #157efb;
        outline: none !important; }
        .d-md-flex
        {
          margin-top: 0;
        }
    </style>
    <?php
      include 'navigation.php';
    ?>
    <section class="ftco-section bg-light" style="padding: 0; padding-top: 7rem;">
      <div class="job-post-company pt-20 pb-20">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-xl-7 col-lg-8">

              <div class="single-job-items mb-50">
                <div class="job-items">
                  <div class="company-img company-img-details">
                    <a href="<?php echo $current_job_details['company_website']; ?>" target = "_blank"><img src="<?php echo Company_Logo_Url.$current_job_details['company_logo']; ?>" alt="<?php echo $current_job_details['company_name']; ?>" style = 'background-size: cover;width:85px;height:85px;'></a>
                  </div>
                  <div class="job-tittle">
                    <!-- <a href="#">
                      <h4><?php echo $current_job_details['job_title']; ?></h4>
                    </a> -->
                    <div class="job-post-item-header d-flex align-items-center mb-3">
                        <h2 class="mr-3 mb-0 text-black h3"><?php echo $current_job_details['job_title'];?></h2>
                        <div class="badge-wrap">
                         <span class="<?php echo color_label($current_job_details['job_type']); ?> text-white badge py-2 px-3"><?php echo $current_job_details['job_type'];?></span>
                        </div>
                      </div>
                    <ul>
                      <a href="<?php echo $current_job_details['company_website']; ?>">
                        <li><?php echo $current_job_details['company_name']; ?></li>
                      </a>
                      <li><i class="fas fa-map-marker-alt"></i><?php echo $current_job_details['job_location']; ?></li>
                      <li><?php echo $current_job_details['job_ctc']; ?> INR</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="job-post-details">
                <div class="post-details1 mb-50">

                  <div class="small-section-tittle">
                    <h4>Job Description</h4>
                  </div>
                  <p><?php echo $current_job_details['job_description']; ?></p>
                </div>
                <div class="post-details2  mb-50">
                  <div class="small-section-tittle">
                    <h4>Required Knowledge, Skills, and Abilities</h4>
                  </div>
                  <ul>
                    <?php
                      $job_eligiblity_arr = explode(PHP_EOL,$current_job_details['job_eligiblity']);
                      foreach ($job_eligiblity_arr as $row) {
                        ?>
                          <li><?php echo $row; ?></li>
                        <?php
                      }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4">
              <div class="post-details3  mb-50">

                <div class="small-section-tittle">
                  <h4>Job Overview</h4>
                </div>
                <ul>
                  <li>Location : <span><?php echo $current_job_details['job_location']; ?></span></li>
                  <li>Vacancy : <span><?php echo $current_job_details['job_vacancies']; ?></span></li>
                  <li>Job nature : <span><?php echo $current_job_details['job_type']; ?></span></li>
                  <li>Salary : <span><?php echo $current_job_details['job_ctc']; ?> INR</span></li>
                  <li>Last Application date : <span><?php echo $current_job_details['job_deadlinedate']; ?></span></li>
                  <li><a href="createnewpost.php?post_id=<?php echo $row['id']; ?>" class="btn btn-warning py-2 mr-1" style="color: #212529;background-color: #ffc107;">Edit Details</a></li>
                </ul>
              </div>
              <div class="post-details4  mb-50">

                <div class="small-section-tittle">
                  <h4>Company Information</h4>
                </div>
                <span><?php echo $current_job_details['company_name']; ?></span>
                <p><?php echo $current_job_details['company_about'];?></p>
                <ul>
                  <li>Name: <span><?php echo $current_job_details['company_name']; ?></span></li>
                  <li>Web : <span style="word-break: break-all;display: initial;"><a href="<?php echo $current_job_details['company_website']; ?>"><?php echo $current_job_details['company_website']; ?></a></span></li>
                  <li>Email: <span><?php echo $current_job_details['email'];?></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light pb-5" style="padding: 0;">
      <div class="container m-0 ml-5" style="max-width: 94%">
        <div class="row">
          <div class="col-md-10 heading-section text-left ftco-animate fadeInUp ftco-animated pl-0">
            <h2 class="mb-4"><span>Candidate</span> List</h2>
          </div>
          <div class="col-md-2 heading-section ftco-animate fadeInUp ftco-animated pl-3 pr-0 d-flex justify-content-center align-items-center">
            <select class="form-control" style="height:auto !important;outline:none;color: #34495e !important;background-color:transparent !important;" id="selectdropdown" name="round_status">
              <option value="">All</option>
              <option value="1">Applied</option>
              <option value="2">Apptitude</option>
              <option value="3">Interview</option>
              <option value="4">Selected</option>
              <option value="5">Rejected</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3 pl-0">
            <input class="form-control" id="myInput" type="text" placeholder="Search..." style="height:auto !important;outline:none;color: #34495e !important;background-color:transparent !important;">
          </div>
          <div class="col-md-5">
            
          </div>
          <div class="col-md-2">
            <select class="form-control" style="height:auto !important;outline:none;color: #34495e !important;background-color:transparent !important;display: none;" id="roundDropdown" name="round_status">
              <option value="1">Applied</option>
              <option value="2">Apptitude</option>
              <option value="3">Interview</option>
              <option value="4">Selected</option>
              <option value="5">Rejected</option>
            </select>
          </div>
          <div class="col-md-2 pr-0">
            <input type="submit" class="btn btn-primary form-control" style="height:auto !important;outline:none;" name="roundChange" id="roundButton" value="Round Change" disabled>
          </div>
        </div>
        <div class="row">
          <?php
            if(mysqli_num_rows($candidate_list) > 0){
              ?>
                <table class="table table-hover" id="resultTable">
                  <thead class="thead-dark" id="resultTableHead">
                    <tr>
                      <th scope="col">Sr No.</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Enrollment No.</th>
                      <th scope="col">Email Address</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Colleage Name</th>
                      <th scope="col">Round Status Message</th>
                      <th scope="col">More Details</th>
                    </tr>
                  </thead>
                  <tbody class="text-dark" id="resultTableBody">
                    <?php
                      $a = 1;
                      while ($row = mysqli_fetch_array($candidate_list)) {
                          $color_value = color_label($row['message']);
                        ?>
                          <tr>
                              <td><?php echo $a++;?></td>
                              <td><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];  ?></td>
                              <td><?php echo $row['enrollmentno']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['gender']; ?></td>
                              <td><?php echo $row['colleagename'].' , '.$row['district']; ?></td>
                              <td class="<?php echo $color_value; ?>"><?php echo $row['message']; ?></td>
                              <td><a href="candidate_details.php?employee_id=<?php echo $row['id']; ?>" target="_blank" class="text-muted">Click Here</a></td>
                          </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                </table>
              <?php
            }
          ?>
        </div>
      </div>
    </section>
    <?php
      include 'footer.php';
    ?>
    <script type="text/javascript">
      $('#selectdropdown').on('change',function() {
        var round_number = $('#selectdropdown').val();
        var round_dropdown = roundDropdown(round_number);
        if(round_number == "" || round_number == 4 || round_number == 5){
          $('#roundButton').attr('disabled','disabled');
          $('#roundDropdown').css('display','none');
        }else{
          $('#roundDropdown').html(round_dropdown);
          $('#roundButton').removeAttr('disabled');
          $('#roundDropdown').css('display','block');
        }
        $.ajax({
          url:"fetch_candidate_details.php",
          type: "POST",
          data: 'round_number='+round_number,
          dataType:"json",
          cache:false,
          processData:false,
          success:function(data)
          {
            $('#resultTableHead').html(data.dataHead);
            $('#resultTableBody').html(data.dataBody);
          }
        })
      });

      function roundDropdown(roundNumber) {
        var roundDropdownOption = ''
        if (roundNumber == 1) {
          roundDropdownOption = '<option value="2">Apptitude</option><option value="3">Interview</option><option value="4">Selected</option><option value="5">Rejected</option>';
        } else if (roundNumber == 2) {
          roundDropdownOption = '<option value="3">Interview</option><option value="4">Selected</option><option value="5">Rejected</option>';
        } else if (roundNumber == 3) {
          roundDropdownOption = '<option value="4">Selected</option><option value="5">Rejected</option>';
        }
        return roundDropdownOption;
      }
      
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#resultTableBody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
      var arrEmployeeId = [];
      function set_employee_id(id){
        id = parseInt(id);
        let index = arrEmployeeId.indexOf(id);
        if(index > -1){
          arrEmployeeId.splice(index, 1);
        }else{
          arrEmployeeId.push(id);
        }
        $('#selectAll').removeAttr('checked');
      }
      $("#roundButton").on("click",function(){
        var roundDropdown = $('#roundDropdown').val();
        if (arrEmployeeId.length > 0) {
          $.ajax({
            url:"round_change.php",
            type: "POST",
            data: 'employee_id='+arrEmployeeId+'&roundDropdown='+roundDropdown,
            dataType:"json",
            cache:false,
            processData:false,
            success:function(data)
            {
              if (data.success) {
                alert('Round Updated .!');
                window.location.href = 'job_details.php?post_id='+<?php echo $_GET['post_id']; ?>;
              } 
            }
          })
        }
      });
      function selectAll(e) {
        $('[id=employee_id]').not(e).prop('checked',e.checked);

        $('[id=employee_id]:checked').each(function(){
          id = this.value;
          let index = arrEmployeeId.indexOf(id);
          if(index > -1){
            arrEmployeeId.splice(index, 1);
          }else{
            arrEmployeeId.push(id);
          }
        });
      }
    </script>