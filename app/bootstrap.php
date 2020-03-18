<?php

// Load Config
require_once 'config/config.php';

//Load libraries
// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/db.php';
require_once 'helpers/functions.php';
require_once 'helpers/session_helper.php';

//echo 'bootstartp.php loaded<br>';

//Autoload Core Libraries
spl_autoload_register(function($classname){
    require_once "libraries/{$classname}.php";
});
