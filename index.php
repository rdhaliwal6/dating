<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once ("vendor/autoload.php");

//create an instance of the base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view -> render('views/home.html');
});

$f3->route('POST /personal', function() {
    $view = new Template();
    echo $view -> render('views/PersonalInfo.html');
});

$f3->route('POST /profile', function() {
    $view = new Template();
    echo $view -> render('views/Profile.html');
});

//run fat free
$f3 -> run();
