<?php 
	require_once __DIR__."/../../config/app.php";
	if(!isset($_SESSION['user_id'])){
		header("Location: ".base_url()."admin/login.php");
    }
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $result = mysqli_query($con,"DELETE FROM quizzes WHERE id='$id'");
        if($result){
            header("Location: ".base_url()."admin/quiz/list.php");
        }
    } 
?>