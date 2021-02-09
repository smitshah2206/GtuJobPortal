    <?php
      include 'header.php';
      $blogTitle_msg = '';
      $blogImage_msg = '';
      $blogDescription_msg = '';

      $blogTitle = '';
      $blogImage = '';
      $blogDescription = '';

      if(isset($_POST['submit']))
      {
        $blogTitle = input_data($_POST['blogTitle']);
        $blogImage = $_FILES['blogImage'];
        $blogDescription = input_data($_POST['blogDescription']);

        $blogTitle_validation = 0;
        $blogImage_validation = 0;
        $blogDescription_validation = 0;

        if($blogTitle)
        {
          if (strlen($blogTitle) < 70) 
          {
            $blogTitle_validation = 0;
          }
          else
          {
            $blogTitle_msg = 'Less than 70 letter required';
            $blogTitle_validation = 1;
          }
        }
        else
        {
          $blogTitle_msg = 'Blog Title is required';
          $blogTitle_validation = 1;
        }

        if($blogImage)
        {
          if($blogImage['type'] == 'image/jpeg' || $blogImage['type'] == 'image/jpg' || $blogImage['type'] == 'image/png')
          {
            if($blogImage['size'] < 2097152)
            {
              $blogImage_validation = 0;
            }
            else
            {
              $blogImage_msg = 'Please upload less than 2 MB file.';
              $blogImage_validation = 1;
            }
          }
          else
          {
            $blogImage_msg = 'Please use valid Image formated file.';
            $blogImage_validation = 1;
          }
        }
        else
        {
          $blogImage_msg = 'Blog Image is required';
          $blogImage_validation = 1;
        }

        if($blogDescription)
        {
          if (strlen($blogDescription) < 250) 
          {
            $blogDescription_validation = 0;
          }
          else
          {
            $blogDescription_msg = 'Less than 250 letter required';
            $blogDescription_validation = 1;
          }
        }
        else
        {
          $blogDescription_msg = 'Blog Description is required';
          $blogDescription_validation = 1;
        } 

        if($blogTitle_validation == 0 && $blogImage_validation == 0 && $blogDescription_validation == 0){
          if(blog_insert($conn,$_POST,$_FILES))
          {
            $msg = 'New Blog Added .!';
            $link = BASE_URL.'Admin/blog.php';
            redirect_link($msg,$link);
          }
          else
          {
            $msg = 'Some thing went wrong .!';
            $link = BASE_URL.'Admin/blog.php';
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

    <div class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 heading-section text-left ftco-animate fadeInUp ftco-animated pl-3">
            <h2 class="mb-4"><span>Create New </span>Blog</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-12 mb-5">
            <form action="createnewblog.php" method="post" class="p-5 bg-white" enctype="multipart/form-data">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="blogtitle">Blog Title</label>
                  <input type="text" name="blogTitle" class="form-control" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" value="<?php echo $blogTitle;?>">
                   <div class="invalid-feedback">
                          <?php echo $blogTitle_msg;?>
                    </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="blogimage">Blog Image</label>
                  <input type="file" name="blogImage" class="form-control" value="<?php echo $blogImage;?>">
                   <div class="invalid-feedback">
                          <?php echo $blogImage_msg;?>
                    </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="blogdescription">Blog Description</label>
                  <textarea name="blogDescription" class="form-control" cols="30" rows="5" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"><?php echo $blogDescription;?></textarea>
                   <div class="invalid-feedback">
                          <?php echo $blogDescription_msg;?>
                    </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Post" class="btn btn-primary  py-2 px-5">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
      include 'footer.php';
    ?>