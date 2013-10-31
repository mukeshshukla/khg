<?php

session_start();
include '../include/config.php';

$_SESSION['errors'] = array();
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    array_push($_SESSION['errors'], 'Invalid Email id');
}

if (strstr($_POST['email'], '@') !== '@weboniselab.com') {
    array_push($_SESSION['errors'], 'Pelase use your webonise email id.');
}

if (!isset($_POST['name'])) {
    array_push($_SESSION['errors'], 'Please share your name');
}

if (!empty($_SESSION['errors'])) {
    header('location: index.php?error=true');
} else {
    $select_user = "SELECT id from user where email = '" . $_POST['email'] . "' ";
    $res_user = mysql_query($select_user);
    if (mysql_num_rows($res_user) > 0) {
        array_push($_SESSION['errors'], 'The email id you have entered have already in use.');
        header('location: index.php?error=true');
    } else {
        $access_start_time = date('Y-m-d H:i:s');

        $insert_query = "INSERT INTO user  (id ,
                            name ,
                            email ,
                            accesstime
                            )
                            VALUES (
                            NULL ,  '" . $_POST['name'] . "',  '" . $_POST['email'] . "', '". $access_start_time  ."')";

        if ($uid = mysql_query($insert_query)) {

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['token'] = md5($_POST['email'] . session_id());
            $_SESSION['uid'] = mysql_insert_id();
            $_SESSION['access_start_time'] = $access_start_time ;
            

            header('location: showq_level2.php');
        } else {

            array_push($_SESSION['errors'], 'sorry, this application is very bad.');
            header('location: index.php?error=true');
        }
    }
}

?>
