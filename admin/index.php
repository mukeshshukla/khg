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
<body>
    <?php
    session_start();
    session_destroy();
    
    ?>
<div id="wrapper">
    <header class="header">
        <div class="container">
            <h2>Banner</h2>
        </div>
    </header>
 
<div class="container">
        <h1>Welcome to KHG</h1>


    <div class="control-group">
        <h1>Results for rounds</h1>
    <div class="controls">
                    </div>
                </div>
            <div class="control-group">
                <div class="controls" style="text-align: center;">
                    <input type="button" name="firstround" value="Show Results For First Round " onclick="window.location.href='shortlist.php?round=1'" />
                <input type="button" name="secondround" value="Show Results For Second Round " onclick="window.location.href='shortlist.php?round=1'" />
            </div>
        </div>
</div>
</body>
</html>