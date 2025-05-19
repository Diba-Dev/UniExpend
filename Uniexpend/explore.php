<?php
include 'config.php';

// Initialize filter variables
$degree = $_GET['degree'] ?? '';
$language = $_GET['language'] ?? '';
$field = $_GET['field'] ?? '';
$scholarship = $_GET['scholarship'] ?? '';

// Base query
$sql = "SELECT p.*, s.scholarship_name, s.amount as scholarship_amount 
        FROM programs p
        LEFT JOIN scholarships s ON p.scholarship_id = s.id 
        WHERE 1=1";

// Add filters
if (!empty($degree)) {
    $sql .= " AND p.degree_level = '" . mysqli_real_escape_string($conn, $degree) . "'";
}
if (!empty($language)) {
    $sql .= " AND p.language = '" . mysqli_real_escape_string($conn, $language) . "'";
}
if (!empty($field)) {
  $sql .= " AND p.program_name LIKE '%" . mysqli_real_escape_string($conn, $field) . "%'";
}

if (!empty($scholarship)) {
    if ($scholarship == "yes") {
        $sql .= " AND p.scholarship_id IS NOT NULL";
    } elseif ($scholarship == "no") {
        $sql .= " AND p.scholarship_id IS NULL";
    }
}

// Execute the query
$result = mysqli_query($conn, $sql);
?>



<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <!-- meta data -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link rel="stylesheet" href="assets/fonts/poppins.css">
        
        <!-- title of site -->
        <title>UNIexpend</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png">
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

		<!--flaticon.css-->
		<link rel="stylesheet" href="assets/fonts/flaticon.css">

		<!--slick.css-->
        <link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/slick-theme.css">
		
        <!--bootstrap.min.css--> 
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css">	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		   
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
		<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
		<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
		<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
		<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
		<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>  
  </head>
	
	<body>
		<!--header-top start -->
		<header id="header-top" class="header-top">
			<ul>
				<li>
					<div class="header-top-left">
						<ul>
							<li class="select-opt">
								<a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
							</li>
							<li class="select-opt">
								<a href="https://www.linkedin.com" target="_blank" rel="noopener"><i class="fa fa-linkedin"></i></a>
							</li>
							<li class="select-opt">
								<a href="https://www.github.com" target="_blank" rel="noopener"><i class="fa fa-github"></i></a>
							</li>
						</ul>
					</div>
				</li>
<!-- log in header  -->
				<li class="head-responsive-right pull-right">
					<div class="header-top-right">
						<ul>
							<li class="header-top-contact">
								<a href="http://localhost/uniexpend/login.html">sign in</a>
							</li>
							<li class="header-top-contact">
								<a href="http://localhost/uniexpend/login.html">register</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
					
		</header><!--/.header-top-->
		<!--header-top end -->

		<!-- top-area Start -->
		<section class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
				<nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

					<div class="container">

						<!-- Start Header Navigation -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
								<i class="fa fa-bars"></i>
							</button>
							<a class="navbar-brand" href="http://localhost/uniexpend/index.html"></a>
								<img src="assets/images/Uniexpend.png" alt="UNIexpend" style="height: 80px; padding-top: 5px;">
							</a>
						</div><!--/.navbar-header-->
						<!-- End Header Navigation -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
							<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
								<li class="scroll active"><a href="http://localhost/uniexpend/index.html">home</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Explore <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="http://localhost/Uniexpend/explore.php">Programs</a></li>
										<li><a href="http://localhost/Uniexpend/explore.php">Universities</a></li>
										<li><a href="http://localhost/Uniexpend/explore.php">Courses</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Guidance <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="http://localhost/Uniexpend/explore.php">Costs & Aid</a></li>
										<li><a href="http://localhost/Uniexpend/explore.php">Visa & Admissions</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Community <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="http://localhost/Uniexpend/explore.php">Student Experiences</a></li>
										<li><a href="http://localhost/Uniexpend/explore.php">Forums</a></li>
									</ul>
								</li>
							</ul><!--/.nav -->
						</div><!-- /.navbar-collapse -->
					</div><!--/.container-->
				</nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->
		<!-- top-area End -->




    <section class="explore-section">
  <style>
    .explore-container {
      display: flex;
      flex-wrap: wrap;
      margin: 0 auto;
      max-width: 1200px;
      padding: 2rem 1rem;
      gap: 2rem;
    }

    .explore-sidebar {
      flex: 1 1 280px;
      background: #fff;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .explore-sidebar h2 {
      font-size: 1.25rem;
      margin-bottom: 1rem;
      color: #0072ce;
    }

    .explore-sidebar label {
      font-weight: 500;
      margin-top: 1rem;
      display: block;
      color: #333;
    }

    .explore-sidebar select,
    .explore-sidebar input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      margin-top: 5px;
      background-color: #f9f9f9;
    }

    .explore-sidebar input[type="submit"] {
      margin-top: 1.5rem;
      width: 100%;
      background: #0072ce;
      color: #fff;
      border: none;
      padding: 10px;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .explore-sidebar input[type="submit"]:hover {
      background: #005bb5;
    }

    .explore-results {
      flex: 3 1 600px;
    }

    .explore-card {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 1.5rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: transform 0.2s ease;
    }

    .explore-card:hover {
      transform: scale(1.01);
    }

    .explore-card h3 {
      margin-top: 0;
      color: #0072ce;
      font-size: 1.2rem;
    }

    .explore-card p {
      margin: 0.25rem 0;
      color: #444;
    }

    .highlight {
      background-color: #e6f4ff;
      padding: 10px;
      border-left: 4px solid #0072ce;
      margin-top: 10px;
      font-weight: 500;
      color: #0072ce;
      border-radius: 8px;
    }

    @media (max-width: 768px) {
      .explore-container {
        flex-direction: column;
      }
    }
    a:hover .explore-card {
  box-shadow: 0 6px 16px rgba(0, 114, 206, 0.2);
  transform: scale(1.015);
    }

  </style>

  <div class="explore-container">
    <div class="explore-sidebar">
      <h2>🎯 Filter Programs</h2>
      <form method="get" action="explore.php">
        <label for="degree">🎓 Degree Level</label>
        <select name="degree" id="degree">
          <option value="">Any</option>
          <option value="Bachelor" <?= $degree == 'Bachelor' ? 'selected' : '' ?>>Bachelor</option>
          <option value="Master" <?= $degree == 'Master' ? 'selected' : '' ?>>Master</option>
          <option value="PhD" <?= $degree == 'PhD' ? 'selected' : '' ?>>PhD</option>
        </select>

        <label for="language">🗣 Language</label>
        <select name="language" id="language">
          <option value="">Any</option>
          <option value="English" <?= $language == 'English' ? 'selected' : '' ?>>English</option>
          <option value="German" <?= $language == 'German' ? 'selected' : '' ?>>German</option>
        </select>

        <label for="field">📘 Field of Study</label>
        <input type="text" name="field" id="field" value="<?= htmlspecialchars($field) ?>">

        <label for="scholarship">💰 Scholarship</label>
        <select name="scholarship" id="scholarship">
          <option value="">Any</option>
          <option value="yes" <?= $scholarship == 'yes' ? 'selected' : '' ?>>Available</option>
          <option value="no" <?= $scholarship == 'no' ? 'selected' : '' ?>>Not Available</option>
        </select>

        <input type="submit" value="Apply Filters">
      </form>
    </div>

    <div class="explore-results">
      <h2 style="margin-bottom: 1rem;">📚 Programs Found</h2>

      <?php if ($result && mysqli_num_rows($result) > 0): ?>
  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <a href="course-details.php?id=<?= urlencode($row['id']) ?>" style="text-decoration: none; color: inherit;">
      <div class="explore-card">
        <h3 style="font-size: 1.5rem; font-weight: bold; color: #0056b3;"><?= htmlspecialchars($row['program_name']) ?> (<?= htmlspecialchars($row['degree_level']) ?>)</h3>
        <p><strong>University:</strong> <?= htmlspecialchars($row['university_name']) ?> — <?= htmlspecialchars($row['country']) ?></p>
        <p><strong>Duration:</strong> <?= htmlspecialchars($row['duration']) ?> | <strong>Language:</strong> <?= htmlspecialchars($row['language']) ?></p>
        <p><strong>Tuition Fee:</strong> $<?= number_format($row['tuition_fee'], 2) ?></p>

        <?php if ($row['scholarship_name']): ?>
          <div class="highlight">
            🎉 Scholarship: <?= htmlspecialchars($row['scholarship_name']) ?> —
            <?= is_numeric($row['scholarship_amount']) 
                ? '$' . number_format($row['scholarship_amount'], 2) 
                : htmlspecialchars($row['scholarship_amount']) ?>
          </div>
        <?php else: ?>
          <p style="font-style: italic; color: #777;">No scholarship available for this program.</p>
        <?php endif; ?>
      </div>
    </a>
  <?php endwhile; ?>
<?php else: ?>
  <p style="color: #666;">No programs found matching your filters.</p>
<?php endif; ?>
    </div>
  </div>
</section>

    
    
    
    
    
    
    <!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="hm-footer-copyright">
					<div class="row">
						<div class="col-sm-5">
							<p>
								&copy;copyright. designed and developed by <a href="https://www.devsartistry.com/">team uniexpend</a>
							</p><!--/p-->
						</div>
						<div class="col-sm-7">
							<div class="footer-social">
								<span><i class="fa fa-phone"> +880 123 456 78 </i></span>
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
					</div>
					
				</div><!--/.hm-footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

        <!--feather.min.js-->
        <script  src="assets/js/feather.min.js"></script>

        <!-- counter js -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>

        <!--slick.min.js-->
        <script src="assets/js/slick.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		     
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
    </body>
	
</html>