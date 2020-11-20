<?php 
	require_once __DIR__."/../../config/app.php";
	if(!isset($_SESSION['user_id'])){
		header("Location: ".base_url()."admin/login.php");
    }
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $result = mysqli_query($con,"INSERT INTO quizzes(`title`,`start`) VALUES('$title','1')");
        if($result){
            header("Location: ".base_url()."admin/quiz/list.php");
        }
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
        <title>Create Quiz</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>admin/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/font-awesome.min.css">
        
        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>admin/assets/css/bootstrap-datetimepicker.min.css">
        
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
        
            <?php require_once __DIR__."/../layout/navbar.php"; ?>
			<?php require_once __DIR__."/../layout/sidebar.php"; ?>
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Create Quiz</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Create Quiz</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body">
									<form action="" method="POST" enctype="multipart/form-data">
										<div class="form-group row">
											<label class="col-form-label col-md-2">Title</label>
											<div class="col-md-10">
                                                <input type="text" class="form-control" name="title" required>
											</div>
                                        </div>                                      
                                        <div class="text-right">
											<button type="submit" name="submit" class="btn btn-primary">Create</button>
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
        <script src="<?php echo base_url() ?>admin/assets/js/moment.min.js"></script>
        <script src="<?php echo base_url() ?>admin/assets/js/bootstrap-datetimepicker.min.js"></script>
		<!-- Slimscroll JS -->
		<script src="<?php echo base_url() ?>admin/assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="<?php echo base_url() ?>admin/assets/js/app.js"></script>
        <script>
            $('input[type=radio]').on('change',function(){
                if($(this).is(":checked")){
                    $("input[type=radio]").parent().css({"background-color":"#eee"});
                    $(this).parent().css({"background-color":"#00a86b"});
                }
            });
            var rid = 4;
            function add_answer(){
                rid++;
                var answer = `
                    <div class="row">
                        <div class="col-md-12 py-2" style="background-color: #eee;">
                            <input type="radio" id="a${rid}" name="correct_answer" value="${rid}" required>
                            <label for="a${rid}">Marked as correct answer</label>
							<div class="input-group">
								<input class="form-control" name="answer[]" type="text">
								<div class="input-group-append">
									<button class="btn btn-danger remove_answer" type="button"><i class="la la-trash"></i></button>
								</div>
							</div>
						</div>
                    </div>
                `;
                $('#answers').append(answer);
            }
            $(document).on('click','.remove_answer',function(){
                $(this).parent().parent().parent().parent().remove();
            });
        </script>
    </body>
</html>