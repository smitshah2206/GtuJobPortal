</head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="top: 0px;">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><img src="../logo.png" width="200px" height="60px"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="postjob.php" class="nav-link">Post a Job</a></li>
	          <li class="nav-item"><a href="findcandidate.php" class="nav-link">Find Candidate</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        </ul>
	        <ul class="navbar-nav navbar-nav-right">
	          <li class="nav-item nav-profile dropdown">
	            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
	              <span class="nav-profile-name"><?php echo $_SESSION['name']; ?></span>
	            </a>
	            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown" style="top: 50px;left: 0px;margin-top: 0px;webkit-box-shadow: 0px 3px 21px 0px rgba(0, 0, 0, 0.2);-moz-box-shadow: 0px 3px 21px 0px rgba(0, 0, 0, 0.2);box-shadow: 0px 3px 21px 0px rgba(0, 0, 0, 0.2);">
	              <a href="editprofile.php" class="dropdown-item"><span class="icon-pencil mr-2"></span>Edit Profile</a>
	              <a href="logout.php" class="dropdown-item"><span class="icon-lock mr-2"></span>Logout</a>
	            </div>
	          </li>
	    	</ul>
	      </div>
	    </div>
	  </nav>