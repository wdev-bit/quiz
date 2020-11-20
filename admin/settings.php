<?php 
	require_once __DIR__."/../config/app.php";
	if(!isset($_SESSION['user_id'])){
		header("Location: ".base_url()."admin/login.php");
    }
    if(isset($_POST['livestream_iframe']) && isset($_POST['mosaic_iframe']) && isset($_POST['chat_iframe'])){
        $livestream_iframe = $_POST['livestream_iframe'];
        $mosaic_iframe = $_POST['mosaic_iframe'];
        $chat_iframe = $_POST['chat_iframe'];
        $result = mysqli_query($con,"UPDATE settings SET livestream_iframe='$livestream_iframe' , mosaic_iframe='$mosaic_iframe' , chat_iframe='$chat_iframe' ");
    }
    if(!empty($_FILES['qrcode_image']["name"])){
        $target_dir = "../uploads/";
        $ext  = pathinfo($_FILES["qrcode_image"]["name"], PATHINFO_EXTENSION);
        $filname = round(microtime(true)) . '.' . $ext;
        move_uploaded_file($_FILES["qrcode_image"]["tmp_name"], $target_dir . $filname);
        $path = "uploads/".$filname;
        $result = mysqli_query($con,"UPDATE settings SET qrcode_image='$path'");
    }
    if(!empty($_FILES['logo']["name"])){
        $target_dir = "../uploads/";
        $ext  = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
        $filname = round(microtime(true)) . '.' . $ext;
        move_uploaded_file($_FILES["logo"]["tmp_name"], $target_dir . $filname);
        $path = "uploads/".$filname;
        $result = mysqli_query($con,"UPDATE settings SET logo='$path'");
    }
    $result = mysqli_query($con,"SELECT * FROM settings");
    $settings = mysqli_fetch_assoc($result);
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
        <title>Settings</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>admin/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/line-awesome.min.css">
		
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
			
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Settings</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Settings</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Website Settings</h4>
								</div>
								<div class="card-body">
									<form action="" method="POST" enctype="multipart/form-data">

										<div class="form-group row">
											<label class="col-form-label col-md-2">Livestream IFRAME</label>
											<div class="col-md-10">
												<textarea name="livestream_iframe" class="form-control" placeholder="Livestream IFRAME Here" rows="6" required ><?php echo $settings['livestream_iframe'] ?></textarea>
											</div>
                                        </div>
                                        
                                        <div class="form-group row">
											<label class="col-form-label col-md-2">Mosaic IFRAME</label>
											<div class="col-md-10">
												<textarea name="mosaic_iframe" class="form-control" placeholder="Livestream IFRAME Here" rows="6" required ><?php echo $settings['mosaic_iframe'] ?></textarea>
											</div>
                                        </div>
                                        
                                        <div class="form-group row">
											<label class="col-form-label col-md-2">Chat IFRAME</label>
											<div class="col-md-10">
												<textarea name="chat_iframe" class="form-control" placeholder="Livestream IFRAME Here" rows="6" required ><?php echo $settings['chat_iframe'] ?></textarea>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label col-md-2">QR Code Image</label>
											<div class="col-md-10">
                                                <input type="file" class="form-control" name="qrcode_image" accept="image/*">
                                                <img src="<?php echo base_url().$settings['qrcode_image'] ?>" style="padding: 5px; border: 2px dashed #ccc; margin-top: 10px;" width="100px" alt="">
											</div>
                                        </div>

                                        <div class="form-group row">
											<label class="col-form-label col-md-2">Website Logo</label>
											<div class="col-md-10">
                                                <input type="file" class="form-control" name="logo" accept="image/*">
                                                <img src="<?php echo base_url().$settings['logo'] ?>" style="padding: 5px; border: 2px dashed #ccc; margin-top: 10px;" height="40px" alt="">
											</div>
                                        </div>
                                        
                                        <div class="text-right">
											<button type="submit" class="btn btn-primary">Save</button>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="<?php echo base_url() ?>admin/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url() ?>admin/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url() ?>admin/assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="<?php echo base_url() ?>admin/assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="<?php echo base_url() ?>admin/assets/js/app.js"></script>
		
    </body>
</html>