<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$database_config=array(
    'host'=>'localhost',
    'user'=>'mukesh',
    'paswrd'=>'mukesh',
    'dbname'=>'khg'
);

$link =mysql_connect($database_config['host'], $database_config['user'] , $database_config['paswrd']);

mysql_select_db($database_config['dbname']);


?>
