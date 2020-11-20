<?php 
	require_once __DIR__."/../../config/app.php";
	if(!isset($_SESSION['user_id'])){
		header("Location: ".base_url()."admin/login.php");
    }
    $result = mysqli_query($con,"SELECT * FROM quizzes");
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
        <title>Quiz List</title>
		
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
								<h3 class="page-title">Quiz List</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Quiz List</li>
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
													<th>Title</th>
													<th>Total Rounds</th>
													<th>Total Questions</th>
													<th>Options</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
                                                <?php while($row = mysqli_fetch_assoc($result)) : ?>
												<tr>
                                                    <td><?php echo $row['title'];?></td>
                                                    <td>
														<?php 
                                                            $qid = $row['id'];
                                                            $r = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(*) as total FROM rounds  WHERE quiz_id='$qid'")); 
                                                            echo $r['total'];
                                                        ?>
													</td>
                                                    <td>
                                                        <?php 
                                                            $qid = $row['id'];
                                                            $r = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(*) as total FROM questions  WHERE quiz_id='$qid'")); 
                                                            echo $r['total'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if($row['start'] == 0): ?>
                                                            <button class="btn btn-primary" onclick="start_quiz(<?php echo $row['id'] ?>)">Start Quiz</button>
                                                        <?php else: ?>
                                                            <button class="btn btn-secondary" onclick="stop_quiz(<?php echo $row['id'] ?>)">Stop Quiz</button>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url()."admin/quiz/edit.php?id=".$row['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="#" onclick="delete_quiz(<?php echo $row['id']; ?>)" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
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