<?php
//print_r($_POST);


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

foreach($_POST['ques'] as $quesid){
    
    if(isset($_POST['annswer_'.$quesid]))
    {
        $answer = implode(',', $_POST['annswer_'.$quesid]);
    }else{
        $answer = 0;
    }
    
    
}
?>
