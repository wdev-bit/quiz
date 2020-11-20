<?php 
	require_once __DIR__."/../../config/app.php";
	if(!isset($_SESSION['user_id'])){
		header("Location: ".base_url()."admin/login.php");
    }
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $display_on = $_POST['display_on'];
        $display_till = $_POST['display_till'];
        $title = $_POST['title'];
        $result = mysqli_query($con,"UPDATE quizzes SET title='$title' , display_on='$display_on' , display_till='$display_till' WHERE id='$id'");
        if($result){
            header("Location: ".base_url()."admin/quiz/list.php");
        }
    } 
    $id = $_GET['id'];
    $result = mysqli_query($con,"SELECT * FROM rounds inner join quizzes on rounds.quiz_id=quizzes.id WHERE `rounds`.`id`='$id'");
	$round = mysqli_fetch_assoc($result);
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
        <title>Edit Round</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>admin/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/line-awesome.min.css">
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/dataTables.bootstrap4.min.css">
		
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
		
            <?php require_once __DIR__."/../layout/navbar.php"; ?>
			<?php require_once __DIR__."/../layout/sidebar.php"; ?>   
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit Round</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Edit Round</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card mb-0">
								<div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
										<div class="form-group row">
											<label class="col-form-label col-md-2">Title</label>
											<div class="col-md-10">
                                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                                <select name="quiz_id" class="form-control" required>
                                                    <option value="">-- Select Quiz --</option>
                                                    <?php  $result = mysqli_query($con,"SELECT * FROM quizzes"); ?>
                                                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                                                        <option value="<?php echo $row['id'] ?>" <?php if($row['id'] == $round['quiz_id']){echo 'selected="selected"';} ?>><?php echo $row['title'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
											</div>
										</div>
										<div class="form-group row">
                                            <label class="col-form-label col-md-2">Display On</label>
                                            <div class="col-md-10">
                                                <input type="datetime-local" class="form-control" name="display_on" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Display Till</label>
                                            <div class="col-md-10">
                                                <input type="datetime-local" class="form-control" name="display_till" required>
                                            </div>
                                        </div> 
                                        <div class="text-right">
											<button type="submit" name="submit" class="btn btn-primary">Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
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
		
		<!-- Datatable JS -->
		<script src="<?php echo base_url() ?>admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>admin/assets/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="<?php echo base_url() ?>admin/assets/js/app.js"></script>
        <script>
            $('#table').DataTable();
        </script>
    </body>
</html>