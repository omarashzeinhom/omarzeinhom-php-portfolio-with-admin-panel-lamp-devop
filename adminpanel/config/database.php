<?php
require('constants.php');

//Connect to My Sql DataBase
$connect__db = new \mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);


//

if ($connect__db === false) {
    echo ("Error: Could not Connect." . mysqli_connect_error());
} else {
    //echo ("Connected Successfully To MySqLite DB");
};
