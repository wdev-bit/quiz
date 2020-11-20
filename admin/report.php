<?php 
    require_once __DIR__."/../config/app.php";
    if(!isset($_SESSION['user_id'])){
      header("Location: ".base_url()."admin/login.php");
    }

    $result = mysqli_query($con,"SELECT * FROM attempts inner join questions on attempts.qustion_id=questions.id");
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
        <title>Report</title>
		
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
		
            <?php require_once __DIR__."/layout/navbar.php"; ?>
			<?php require_once __DIR__."/layout/sidebar.php"; ?>   
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Report</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Report</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card mb-0">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-stripped mb-0" id="table">
											<thead>
												<tr>
												    <th>#</th>
												    <th>Question</th>
													<th>Answer</th>
													<th>Right Answer</th> 
													<th>User ID</th>
													<th>Username</th>
													<th>Email</th>
												</tr>
											</thead>
											<tbody>
                                                <?php $i=0; while($row = mysqli_fetch_assoc($result)) : ?>
												<tr>
												    <td><?php echo ++$i;?></td>
												    <td><?php echo $row['title'];?></td>
												    <?php $ans = json_decode($row['answers']) ?>
                                                    <td class="<?php if($row['answer'] == $row['correct_answer']){echo 'text-success';}else{echo 'text-danger';} ?>">
                                                        <?php echo $ans[$row['answer']-1]; ?>
                                                    </td>
                                                    <td><?php echo $ans[$row['correct_answer']-1];?></td>
                                                    <td><?php echo $row['user_id'];?></td>
                                                    <td><?php echo $row['username'];?></td>
                                                    <td><?php echo $row['email'];?></td>
                                                </tr>
                                                <?php endwhile; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
				<!-- Delete Employee Modal -->
				<div class="modal custom-modal fade" id="delete" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Quiz</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
                                    <form action="<?php echo base_url()?>admin/quiz/delete.php" method="POST">
                                        <input type="hidden" name="id" id="id">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" data-dismiss="modal" class="btn btn-primary continue-btn w-100">Cancel</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" name="submit" class="btn btn-primary continue-btn w-100">Delete</button>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Delete Employee Modal -->
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
            function delete_quiz(id){
                $('#id').val(id);
                $('#delete').modal('show');
			}
			function start_quiz(id){
                $.ajax({
                    url: "<?php echo base_url()?>ajax/start_quiz.php",
                    data: {
                        id: id
                    },
                    type: "POST",
                    success: function(response){
                        window.location.href = "<?php echo base_url() ?>/admin/quiz/list.php";
                    }
                }); 
            }
            function stop_quiz(id){
                $.ajax({
                    url: "<?php echo base_url()?>ajax/stop_quiz.php",
                    data: {
                        id: id
                    },
                    type: "POST",
                    success: function(response){
                        window.location.href = "<?php echo base_url() ?>/admin/quiz/list.php";
                    }
                }); 
            }
        </script>
    </body>
</html>