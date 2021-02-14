
    <?php
      $titlename = "Contact Details";
      include 'header.php';
      if(isset($_GET['contact_id'])){
        $contact_id = $_GET['contact_id'];
        $current_contact_details_check = fetch_contact_details($conn,$contact_id);
        $current_contact_details_check_count = mysqli_num_rows($current_contact_details_check);
        if($current_contact_details_check_count > 0){
          $current_contact_details = mysqli_fetch_array($current_contact_details_check); 
        }else{
          $msg = 'Something Went wrong !';
          $link = 'contact.php';
          redirect_link($msg,$link);
        }
      }else{
        $link = 'contact.php';
        redirect_link('',$link);
      }

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
        .post-details4 ul li span{
          font-size: 15px;
        }
        .btn-danger {
          background-color: #dc3545;
          border-color: #dc3545;
        }
      </style>
    <?php
      include 'navigation.php';
    ?>
    <section class="ftco-section bg-light" style="padding: 0; padding-top: 7rem;">
      <div class="job-post-company pt-20 pb-20">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-xl-8 col-lg-8">
              <div class="single-job-items mb-50">
                <div class="row">
                  <div class="job-items">
                    <div class="job-tittle">
                      <div class="job-post-item-header d-flex align-items-center mb-3">
                        <h2 class="mr-3 mb-0 text-black h3"><?php echo $current_contact_details['subject'];?></h2>
                      </div>
                      <ul>
                        <li><i class="fas fa-map-marker-alt"></i><?php echo $current_contact_details['message']; ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4">
              <div class="post-details4  mb-5" style="border: 1px solid #ededed;padding: 15px 30px; ">

                <div class="small-section-tittle">
                  <h4>Personal Information</h4>
                </div>
                <ul>
                  <li>Name: <span><?php echo $current_contact_details['name'];?></span></li>
                  <li>Email: <span><?php echo $current_contact_details['email'];?></span></li>
                </ul>
                <?php
                  if ($current_contact_details['read_unread_status']==1) {
                    ?>
                      <a href="contact_change_status.php?contact_id=<?php echo $contact_id;?>&status=0" class="btn btn-danger py-2 mr-1">Mark as read</a>
                    <?php
                  } else {
                    ?>
                      <a href="contact_change_status.php?contact_id=<?php echo $contact_id;?>&status=0" class="btn btn-warning py-2 mr-1" style="color: #212529;background-color: #ffc107;">Mark as Un-read</a>
                    <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
      include 'footer.php';
    ?>