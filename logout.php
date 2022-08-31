<?php

require('./config/constants.php');

//DESTROY ALL SESSIONS AND REDIRECT User to login.php

session_destroy();
header('location:' . HOME_URL);
die();
