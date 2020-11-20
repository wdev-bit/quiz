<?php

    require_once __DIR__."/../config/app.php";
    $id = $_POST['id'];
    mysqli_fetch_assoc(mysqli_query($con,"UPDATE quizzes SET start=1 WHERE id='$id'"));
?>