
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
    <div id="wrapper">
        <header class="header">
            <div class="container">
                <h2>Banner</h2>
            </div>
        </header>
        <div class="container">
            <h1>Welcome to KHG</h1>
            <form class="form-horizontal levelForm">
                <?php
                if (isset($_REQUEST['nasty'])) {
                    ?>
                    <h2>Please have patience. Let the system test how genius you are.  </h2>
                <?php } else {
                    ?>
                    <h2>Thanks For your response we will be sharing the results shortly.</h2>
                    <?php
                }
                ?>
            </form>
        </div>
    </div>