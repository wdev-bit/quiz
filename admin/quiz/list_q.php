<?php 
	require_once __DIR__."/../../config/app.php";
	if(!isset($_SESSION['user_id'])){
		header("Location: ".base_url()."admin/login.php");
    }
    $result = mysqli_query($con,"SELECT questions.* , rounds.display_on FROM questions inner join rounds on questions.round_id=rounds.id");
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
        <title>Qiuz List</title>
		
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
								<h3 class="page-title">Qiuz List</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin/index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Qiuz List</li>
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
													<th>Question</th>
													<th>Answers</th>
													<th>Correct Answer</th>
													<th>Display On</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
                                                <?php while($row = mysqli_fetch_assoc($result)) : ?>
												<tr>
													<td><?php echo $row['title'];?></td>
													<td>
                                                        <div class="dropdown">
                                                            <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Answers</a>
                                                            <div class="dropdown-menu">
                                                                <?php foreach(json_decode($row['answers']) as $key => $ans): ?>
                                                                    <a class="dropdown-item" data-id="<?php echo $key;?>" style="font-size: 15px;"><?php echo $ans;?></a>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </td>
													<td><span><?php $ans = json_decode($row['answers']); echo $ans[$row['correct_answer']-1]; ?></span></td>
													<td><?php echo $row['display_on'];?></td>
                                                    <td>
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo base_url()."admin/quiz/edit_q.php?id=".$row['id'];?>" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="#" onclick="delete_question(<?php echo $row['id']; ?>)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
									<h3>Delete Question</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
                                    <form action="<?php echo base_url()?>admin/quiz/delete_q.php" method="POST">
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
            function delete_question(id){
                $('#id').val(id);
                $('#delete').modal('show');
            }
        </script>
    </body>
</html>