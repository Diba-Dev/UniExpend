<?php
// DB connection
$host = 'localhost';
$db = 'uniexpend';
$user = 'root';
$pass = '';
$mysqli = new mysqli($host, $user, $pass, $db);

// Check DB connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Validate ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("No course ID provided.");
}

$courseId = $_GET['id'];

// SQL Query
$sql = "SELECT 
            p.*, 
            u.name AS university_name, 
            c.country_name, 
            c.estimated_cost
        FROM programs p
        JOIN universities u ON p.university_id = u.id
        JOIN countries c ON p.country_id = c.id
        WHERE p.id = ?";

$stmt = $mysqli->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $mysqli->error);
}

$stmt->bind_param("i", $courseId);
$stmt->execute();
$result = $stmt->get_result();
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
			<!-- Inserted inside existing template -->
<section class="course-details section-padding">
    <div class="container">
        <?php if ($result->num_rows > 0): 
            $course = $result->fetch_assoc(); ?>
            <div class="card shadow-lg p-4">
                <h2 class="card-title text-primary mb-3"><?php echo htmlspecialchars($course['name']); ?></h2>
                <div class="card-body">
                    <p><strong>Description:</strong><br> <?php echo nl2br(htmlspecialchars($course['description'])); ?></p>
                    <p><strong>University:</strong> <?php echo htmlspecialchars($course['university_name']); ?></p>
                    <p><strong>Country:</strong> <?php echo htmlspecialchars($course['country_name']); ?></p>
                    <p><strong>Estimated Monthly Cost:</strong> $<?php echo htmlspecialchars($course['estimated_cost']); ?></p>
                </div>
                <a href="javascript:history.back()" class="btn btn-outline-primary mt-3"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">Course not found.</div>
            <a href="index.php" class="btn btn-primary">Back to Home</a>
        <?php endif; ?>
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

<?php
$stmt->close();
$mysqli->close();
?>
