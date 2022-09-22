<!DOCTYPE html>
<html lang="en">
<?php
//Connect to My Sql DataBase
require('./config/database.php');
//Seo VARS
include('partials/seo/seo.php');
?>

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='global/styles/css/main.css'>
    <meta name="viewport" content="width=device-width ,initial-scale=1.0" />
    <!--- DYNAMIC SEO TAGS ---->

    <meta name="description" content="<?php echo $page__description; ?>" />
    <?php
    if ($page__robots) {
        echo '<meta name="robots" content="' . $page__robots;
        '" />';
    };

    ?>
    <title>
        <?php
        if (isset($page__title)) {
            echo "$page__title";
        } else {
            echo "@OmarZeinhom2023";
        }; ?>
    </title>
    <!---CSP-->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; 
    img-src  'self' https://res.cloudinary.com; 
    media-src https://res.cloudinary.com; 
    script-src 'self' 'unsafe-inline'; 
    style-src 'self' 'unsafe-inline'; 
    font-src  'self' data:;">

</head>

<!-- CSP

-->

<body>