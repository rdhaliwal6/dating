<?php
session_start();
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("vendor/autoload.php");
require_once("model/functions.php");
//create an instance of the base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('POST /personal', function () {
    $view = new Template();
    echo $view->render('views/PersonalInfo.html');
});

$f3->route('POST /profile', function () {
    $view = new Template();
    $_SESSION['fName'] = $_POST['first-name'];
    $_SESSION['lName'] = $_POST['last-name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['optradio'];
    $_SESSION['phone'] = $_POST['phone-number'];
    echo $view->render('views/Profile.html');
});

$f3->route('POST /interest', function () {
    $view = new Template();
    $_SESSION['bio'] = $_POST['bio'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seeking'] = $_POST['optradio'];
    echo $view->render('views/Interests.html');
});

$f3->route('POST /summary', function () {
    $view = new Template();
    $_SESSION['interests'] = interest($_POST['interest']);
    echo $view->render('views/Summary.html');
});

//run fat free
$f3->run();
