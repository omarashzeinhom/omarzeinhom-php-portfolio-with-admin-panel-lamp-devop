<?php
require 'constants.php';



// DEBUG 
//if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//    echo 'We don\'t have mysqli!!!';
//} else {
//    echo 'Phew we have it!';
//}




//Connect to My Sql DataBase
//dont remove the backslash
$connect__db = new \mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);


// 

if ($connect__db === false) {
    echo ("Error: Could not Connect." . mysqli_connect_error($connect__db));
} else {
    //echo ("Connection is succesfull To MySqLite DB");
};
