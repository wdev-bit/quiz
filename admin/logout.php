<?php

    require_once __DIR__."/../config/app.php";
    session_destroy();
    header("Location: ".base_url()."admin/login.php");

?>