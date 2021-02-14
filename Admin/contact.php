    <?php
      $titlename = "Contact Us";
      include 'header.php';
      $contact_list = contact_list($conn);
    ?>
    <style type="text/css">
      .ftco-navbar-light .navbar-nav > .nav-item:nth-child(8) > .nav-link
      {
        color: #95a5a6;
      }
      .ftco-navbar-light.scrolled .nav-item:nth-child(8) > a
      {
        color: #157efb !important;
      }
    </style>
    <?php
      include 'navigation.php';
    ?>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row">
          <?php
            while ($row = mysqli_fetch_array($contact_list)) {
              ?>
                <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                  <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center mt-1">
                    <div class="mb-4 mb-md-0 mr-5">
                      <div class="job-post-item-header d-flex align-items-center">
                        <h2 class="mr-3 text-black h3"><?php echo $row['name']; ?></h2>
                      </div>
                      <div class="job-post-item-body d-block d-md-flex">
                        <div class="mr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-open-fill" viewBox="0 0 16 16">
                            <path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.313l6.709 3.933L8 8.928l1.291.717L16 5.715V5.4a2 2 0 0 0-1.059-1.765l-6-3.2zM16 6.873l-5.693 3.337L16 13.372v-6.5zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516zM0 13.373l5.693-3.163L0 6.873v6.5z"/>
                          </svg>
                          <a><?php echo $row['email']; ?></a>
                        </div>
                        <div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                          </svg>
                          <span><?php echo $row['subject'];?></span>
                        </div>
                      </div>
                    </div>

                    <div class="ml-auto d-flex">
                      <?php
                        if ($row['read_unread_status'] == 1) {
                          ?>
                            <a href="contact_details.php?contact_id=<?php echo $row['id']; ?>" class="btn btn-warning py-2 mr-1">More Details</a>
                          <?php
                        } else {
                          ?>
                            <a href="contact_details.php?contact_id=<?php echo $row['id']; ?>" class="btn btn-danger py-2 mr-1">More Details</a>
                          <?php
                        }
                      ?>
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