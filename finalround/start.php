<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Index</title>
    <meta name="description" content="">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- bootstrap css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- Custom css -->
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <!--<link rel="stylesheet" type="text/css" href="css/demo.css" />-->

    <!-- js files -->
    <script src="js/jquery.js"></script>
    <script src="js/common.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
<link rel="stylesheet" type="text/css" href="jquery.tzineClock/jquery.tzineClock.css" />

<script type="text/javascript" src="jquery.tzineClock/jquery.tzineClock.js"></script>

<script type="text/javascript" src="script.js"></script>
    <!--<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>-->


    <!--[if gte IE 9]>
    <style type="text/css">
    </style>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <header class="header">
        <div class="container">
            <h2>Kaun Hai Genius </h2>
        </div>
    </header>
 
<div class="container">
        

        <form name="ques" method="post" action="next.php" class="form-horizontal levelForm">
<?php


session_start();

include '../include/config.php';


$select_ques = "select * from questions where level = 3 and deficulty = 1 and deleted =0 order by rand() limit 1";
$question_no = 1;

$_SESSION['ques_no'] = $question_no;
$res = mysql_query($select_ques);
$row = mysql_fetch_object($res);
?>
    <div class="control-group">
                    <legend><?php 
                echo $question_no.') '.$row->Question;
                ?></legend>
    
    <div class="controls">
        <div class="ans-container">
                    <?php
                        $select_ans = "select * from answers where qid = " . $row->id;
                        $res_ans = mysql_query($select_ans);
                        while ($row_ans = mysql_fetch_object($res_ans)) {
                            ?>
                       <label class="checkbox">
                           <input type="checkbox" id="annswer_<?php echo $row_ans->id ?>" value="<?php echo $row_ans->id ?>" name="annswer_<?php echo $row_ans->qid ?>[]" > <?php echo $row_ans->ans; ?>
                       </label>
                            <?php
                        }
                        ?>
        </div>
        <div id="fancyClock"></div>

                    </div>
                </div>
            <div class="control-group">
                <div class="controls">
                    <input type="button" class="btn" name="show" id="showans" value="Show Answer" onclick="getans('<?php echo $row->id ?>')" />    
                    <input type="submit" class="btn" name="submit" value="Next" /><br/><br/><br/>
                <input type="button" class="btn" name="quit" value="Quit" onclick="window.location.href='index.php'" />    
            </div>
        </form>
        </div>
</div>
</body>
</html>