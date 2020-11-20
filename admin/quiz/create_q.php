<?php 
	require_once __DIR__."/../../config/app.php";
	if(!isset($_SESSION['user_id'])){
		header("Location: ".base_url()."admin/login.php");
    }
    if(isset($_POST['submit'])){
        $quiz_id = $_POST['quiz_id'];
        $round_id = $_POST['round_id'];
        $title = $_POST['title'];
        $answers = json_encode($_POST['answers']);
        $correct_answer = $_POST['correct_answer'];
        $result = mysqli_query($con,"INSERT INTO questions(`quiz_id`,`round_id`,`title`,`answers`,`correct_answer`,`created_at`,`update_at`) VALUES('$quiz_id','$round_id','$title','$answers','$correct_answer',NOW(),NOW())");
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
        <title>Create Question</title>
		
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
								<h3 class="page-title">Create Question</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Create Question</li>
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
											<label class="col-form-label col-md-2">Quiz</label>
											<div class="col-md-10">
                                                <select name="quiz_id" class="form-control select_quiz" required">
                                                    <option value="">-- Select Quiz --</option>
                                                    <?php  $result = mysqli_query($con,"SELECT * FROM quizzes"); ?>
                                                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
											</div>
                                        </div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2">Round</label>
											<div class="col-md-10">
                                                <select name="round_id" id="rounds" class="form-control" required>
                                                    <option value="">-- Select Round --</option>
                                                </select>
											</div>
                                        </div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Title</label>
											<div class="col-md-10">
                                                <input type="text" class="form-control" name="title" required>
											</div>
                                        </div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2">Answers</label>
											<div class="col-md-10" id="answers">
                                                <div class="row">
                                                    <div class="col-md-12 pt-2" style="background-color: #eee;">
                                                        <input type="radio" id="a1" name="correct_answer" value="1" required>
                                                        <label for="a1">Marked as correct answer</label>
                                                        <input type="text" class="col-md-12 form-control mb-3" name="answers[]" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2" style="background-color: #eee;">
                                                        <input type="radio" id="a2" name="correct_answer" value="2" required>
                                                        <label for="a2">Marked as correct answer</label>
                                                        <input type="text" class="col-md-12 form-control mb-3" name="answers[]" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2" style="background-color: #eee;">
                                                        <input type="radio" id="a3" name="correct_answer" value="3" required>
                                                        <label for="a3">Marked as correct answer</label>
                                                        <input type="text" class="col-md-12 form-control mb-3" name="answers[]" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2" style="background-color: #eee;">
                                                        <input type="radio" id="a4" name="correct_answer" value="4" required>
                                                        <label for="a4">Marked as correct answer</label>
                                                        <input type="text" class="col-md-12 form-control mb-3" name="answers[]" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-10 offset-2 mt-3">
                                                <button type="button" class="btn btn-primary" onclick="add_answer()"><i class="la la-plus"></i> Add More</button>
                                            </div> -->
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
            $('.select_quiz').on('change',function(){
                id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url()?>ajax/fetch_round.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response){
                        var round = "";
                        for(var i=0; i<response.length; i++){
                            round += `
                                <option value="${response[i].id}">Round(${i+1}) --${response[i].display_on} --${response[i].display_till}--</option>
                            `;
                        }
                        $('#rounds').html(round);
                    }
                }); 
            });
        </script>
    </body>
</html>