
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
?>
<body>
<div id="wrapper">
    <header class="header">
        <div class="container">
            <h2>Banner</h2>
        </div>
    </header>
    <div class="container">
        <h1>Welcome to KHG</h1>
       
        <form class="form-horizontal loginForm" method="post" action="save_user_data.php" >
             <?php if(isset($_REQUEST['error'])):?>
            <div class="error">
                <ul>
                    <?php 
                        foreach($_SESSION['errors'] as $error){
                            echo "<li>$error</li>";
                        }
                    ?>
                </ul>

            </div>
         <?php endif;?>
            <div class="control-group">
                <label class="control-label" for="inputName">Full Name</label>
                <div class="controls">
                    <input type="text" id="inputName" placeholder="Full Name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                    <input type="text" id="inputEmail" placeholder="Email">
                    <input type="hidden" name="token" value="<?php echo session_id();?>">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-inverse">Get me the access</button>
                </div>
            </div>
        </form>
    </div>

</div>
</body>
</html>

