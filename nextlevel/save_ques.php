<?php

//print_r($_POST);

session_start();

include '../include/config.php';




$ans_time = date('Y-m-d H:i:s');


$time_stamp = strtotime($ans_time) - strtotime($_SESSION['access_start_time']);

if ($time_stamp > 600) {
//    header('location: thanks.php');
}

$res = mysql_query("select count(uid) from user_correct_ans where uid ='" . $_SESSION['uid'] . "'");
$isuser = mysql_fetch_row($res);

if (!empty($isuser)) {
    header('location: thanks.php?nasty=true');
    die;
} else {
    foreach ($_POST['ques'] as $quesid) {

        $select_ans = "SELECT * FROM answers where qid = '" . $quesid . "' AND istrue = true";
        $res_ans = mysql_query($select_ans);
        $row = mysql_fetch_object($res_ans);
        if (isset($_POST['annswer_' . $quesid])) {
            $answer = implode(',', $_POST['annswer_' . $quesid]);
        } else {
            $answer = 0;
        }
        if ($row->id == $answer) {
            $insrt_query = "INSERT INTO  user_correct_ans (
            uid ,
            qid ,
            iscorrect ,
            anstime ,
            round
            )
            VALUES (
            '" . $_SESSION['uid'] . "',  '" . $quesid . "',  '2', 
            '" . $ans_time . "' ,  '1'
            )";
            mysql_query($insrt_query);
        } else {
            $insrt_query = "INSERT INTO  user_correct_ans (
            uid ,
            qid ,
            iscorrect ,
            anstime ,
            round
            )
            VALUES (
            '" . $_SESSION['uid'] . "',  '" . $quesid . "',  '0', 
            '" . $ans_time . "' ,  '2'
            )";
            mysql_query($insrt_query);
        }
    }
}
header('location: thanks.php')
?>
