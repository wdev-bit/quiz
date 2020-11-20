<?php

    require_once __DIR__."/../config/app.php";
    if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])){
        if(!isset($_SESSION['user_id'])){
		    $_SESSION['uid'] = $_POST['id'];
		    $_SESSION['name'] = $_POST['name'];
		    $_SESSION['email'] = $_POST['email'];
		    echo "success";
	    }else{
	        echo "success";
	    }   
    }

?>