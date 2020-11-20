<?php
    require_once __DIR__."/../config/app.php";
    $id = $_POST['id'];
    $res = mysqli_query($con,"SELECT * FROM rounds WHERE quiz_id='$id'");
    $row = array();
    while($r = mysqli_fetch_assoc($res)){
        $row[] = $r;
    }
    echo json_encode($row);
?>