<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../include/config.php';


mysql_query("UPDATE  questions SET  deleted =  '1' WHERE  id =".$_REQUEST['qid']);


$query_select_ans = $select_ans = "select id from answers where qid = " . $_REQUEST['qid']." and istrue = true";

$res_ans = mysql_query($select_ans);

$row_ans = mysql_fetch_object($res_ans);
echo $row_ans->id ;


?>
