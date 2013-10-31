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
    <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>


    <!--[if gte IE 9]>
    <style type="text/css">
    </style>
    <![endif]-->
</head>

<?php
session_start();
include '../include/config.php';

if ($_SESSION['token'] !== md5($_SESSION['email'] . session_id())) {
    array_push($_SESSION['errors'], 'Sorry You have lost your chance.');
    header('location: index.php?error=true');
}
?>
<body>
<div id="wrapper">
    <header class="header">
        <div class="container">
            <h2>Kaun hai Genius</h2>
        </div>
    </header>
    <div class="container">

        <form name="ques" method="post" action="save_ques.php" class="form-horizontal levelForm">
<?php
$select_ques = "select * from questions where level = 1 order by rand() limit 10";

$res = mysql_query($select_ques);
$i=1;
while ($row = mysql_fetch_object($res)) {
    ?>
                <div class="control-group">
                    <legend><?php 
                echo $i.') '.$row->Question;
                ?></legend>
                    <div class="controls">
                    <?php
                        $select_ans = "select * from answers where qid = " . $row->id;
                        $res_ans = mysql_query($select_ans);
                        while ($row_ans = mysql_fetch_object($res_ans)) {
                            ?>
                       <label class="checkbox">
                            <input type="checkbox" value="<?php echo $row_ans->id ?>" name="annswer_<?php echo $row_ans->qid ?>[]" > <?php echo $row_ans->ans; ?>
                       </label>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            <input type="hidden" name="ques[]" value="<?php echo $row->id; ?>">
                    <?php 
                  $i++;  
                }
                ?>
            <div class="control-group">
                <div class="controls">
                <input type="submit" name="submit" value="Done" />
            </div>
            </div>
            <input type="hidden" name="token" value="<?php echo session_id(); ?>">
           
        </form>
    </div>
</div>