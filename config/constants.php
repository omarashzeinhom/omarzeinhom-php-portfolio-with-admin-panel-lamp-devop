<?php
/*
* - define function names a constant at runtime.
*- ref php.net/manual/en/function.define.php
*/

session_start();

//REMMBER TO CHANGE DB_USERNAME AND PASS ROOT IS SO VUNERABLE

define('HOME_URL', 'http://localhost/portfolio/' );
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'portfolio__username');
define('DB_PASSWORD', 'This_Is_Just_My_P0rtf0li0_P@ssw0rd_98.');
define('DB_NAME', 'portfolio__php__db');
