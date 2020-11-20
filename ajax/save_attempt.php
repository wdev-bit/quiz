<?php

    require_once __DIR__."/../config/app.php";
    if(!empty($_POST)){
        $ans = $_POST['ans'];
        $qid = $_POST['qid'];
        $qsid = $_POST['qsid'];
        $rid = $_POST['rid'];
        $uid = $_SESSION['uid'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM questions WHERE id='$qsid'"));
        $isc = 0;
        if($ans == $row['correct_answer']){
            $isc = 1;
        }
        mysqli_query($con,"INSERT INTO attempts(`user_id`,`username`,`email`,`quiz_id`,`round_id`,`qustion_id`,`answer`,`is_correct`,`answered_on`) VALUES('$uid','$name','$email','$qid','$rid','$qsid','$ans','$isc',NOW())");
        echo "success";
    }
?>