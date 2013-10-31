
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
        <table border='1' cellspacing ='4' cellpadding='4'>
            <th>Sr no.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Total time </th>
            <th>Total Correct Ans </th>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../include/config.php';

$selectuser= 'SELECT  count(uca.iscorrect)as totalans, TIMEDIFF(uca.anstime, u.accesstime) as timetaken , u.id,u.name,u.email FROM `user_correct_ans` as uca inner join user as u  on u.id= uca.uid  where uca.round = "'.$_REQUEST['round'].'" and uca.iscorrect = 1  group by 2 order by 1 DESC , 2 ASC limit 10';
//echo $selectuser;
$res = mysql_query($selectuser);

$i=1;
while($row = mysql_fetch_object($res)){
    ?>
        <tr class="control-group">
            <td><?php echo $i?></td>  
            <td><?php echo $row->name; ?></td>  
            <td><?php echo $row->email; ?></td>  
            <td><?php echo $row->timetaken; ?></td>  
            <td><?php echo $row->totalans; ?></td>  
            </tr>
        
        <?php
        $i++;
}
        ?>
            </table>
    </div>
</div>
</body>
</html>