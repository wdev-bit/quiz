<?php 
	require_once __DIR__."/../config/app.php";
	if(!isset($_SESSION['user_id'])){
		header("Location: ".base_url()."admin/login.php");
	} 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Dashboard</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>admin/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/line-awesome.min.css">
		
		<!-- Chart CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/plugins/morris/morris.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
	
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
	
			<?php require_once __DIR__."/layout/navbar.php"; ?>
			<?php require_once __DIR__."/layout/sidebar.php"; ?>
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome <?php echo $_SESSION['username']; ?>!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
									<div class="dash-widget-info">
										<?php $quiz = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(*) as total FROM quizzes")); ?>
										<h3><?php echo $quiz['total']; ?></h3>
										<span>Quizzes</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
									<div class="dash-widget-info">
										<?php $questions = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(*) as total FROM questions")); ?>
										<h3><?php echo $questions['total']; ?></h3>
										<span>Questions</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
									<div class="dash-widget-info">
										<h3><?php echo ($questions['total']*4); ?></h3>
										<span>Answers</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
									<div class="dash-widget-info">
										<h3>218</h3>
										<span>visitors</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<a href="<?php echo base_url() ?>create.php" class="col-md-6 text-center">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title" style="margin-top: 22px;"><i class="la la-edit"></i> Create Quiz</h3>
										</div>
									</div>
								</a>
								<a href="<?php echo base_url() ?>list.php" class="col-md-6 text-center">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title" style="margin-top: 22px;"><i class="la la-list"></i> Quiz List</h3>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
					
				</div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="<?php echo base_url() ?>admin/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url() ?>admin/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url() ?>admin/assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="<?php echo base_url() ?>admin/assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Chart JS -->
		<script src="<?php echo base_url() ?>admin/assets/plugins/morris/morris.min.js"></script>
		<script src="<?php echo base_url() ?>admin/assets/plugins/raphael/raphael.min.js"></script>
		<script src="<?php echo base_url() ?>admin//js/chart.js"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo base_url() ?>admin/assets/js/app.js"></script>
		
    </body>
</html>