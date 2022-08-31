<!DOCTYPE html>
<html lang="en">

<?php
require('./config/database.php');
?>






<head>
    <meta charset="UTF-8">
    <!-- Admin Styles are stored in the global folder of styles compiledscss into css -->
    <link rel='stylesheet' href='/portfolio/global/styles/css/adminstyles.css'>
    <meta name="viewport" content="width=device-width ,initial-scale=1.0" />

    <title><?php
            if (isset($page__title)) {
                echo "$page__title";
            } else {
                echo "@OmarZeinhom2023";
            } ?>
    </title>
</head>

<body>