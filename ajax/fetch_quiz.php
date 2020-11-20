<?php

    require_once __DIR__."/../config/app.php";
    $row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM quizzes WHERE start=1"));
    if(!empty($row)){
        $data = array();
        $data['quiz_id'] = $row['id'];
        $data['quiz_title'] = $row['title'];
        $qid = $data['quiz_id'];
        $result = mysqli_query($con,"SELECT * FROM rounds WHERE quiz_id='$qid'");
        if(mysqli_num_rows($result) > 0){
            date_default_timezone_set("Asia/Karachi");
            $cuurent_time = strtotime(Date("Y-m-d H:i:s"));
            while($round = mysqli_fetch_assoc($result)){
                if(strtotime($round['display_on']) < $cuurent_time && strtotime($round['display_till']) > $cuurent_time ){
                    $uid = $_SESSION['uid'];
                    $qid = $data['quiz_id'];
                    $rid = $round['id'];
                    $rst = mysqli_query($con,"SELECT * FROM attempts WHERE quiz_id='$qid' AND round_id='$rid' AND user_id='$uid'");
                    if(mysqli_num_rows($rst) > 0){
                        $data['attempted'] = 1;
                    }
                    else{
                        $data['attempted'] = 0;
                        $data['round'] = $round;
                        $rid = $data['round']['id'];
                        $res = mysqli_query($con,"SELECT questions.id , questions.quiz_id , questions.round_id , questions.title , questions.answers , questions.correct_answer as gd FROM questions WHERE quiz_id='$qid' AND round_id='$rid'");
                        if(mysqli_num_rows($res) > 0){
                            $question = mysqli_fetch_assoc($res);
                            $data['question'] = $question;
                        }
                    }
                    break;
                }
            }
        }
        echo json_encode(['status'=>'success','data'=>$data]);
    }
    else
    {
        echo json_encode(['status'=>'success','data'=>'']);
    }
?>