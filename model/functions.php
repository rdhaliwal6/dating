<?php
//<!--// Rajpreet Dhaliwal-->
//<!--// 1/16/20-->
//<!--// /328/dating/model/functions.php-->
//<!--// functions page for dating.-->
function interest(array $x)
{
    $int = "";
    foreach ($x as $value) {
        $int = $int . " " . $value;
    }
    return $int;
}

function validation()
{
    global $f3;
    $isValid = true;

    $isValid = validName();
    $isValid = validAge();
    $isValid = validPhone();
    $_SESSION['gender'] = $_POST['gender'];
    return $isValid;
}

function validName(){
    global $f3;

    $isValid = true;
    $fname = $_POST["first-name"];
    if ($fname == "" || is_numeric($fname)) {
        $f3->set("errors['firstName']", "Please enter a first name");

        $isValid = false;
    }

    $lname = $_POST["last-name"];
    if ($lname == "" || is_numeric($lname)) {
        $f3->set("errors['lastName']", "Please enter a last name");
        $isValid = false;
    }

    $_SESSION['fName'] = $_POST['first-name'];
    $_SESSION['lName'] = $_POST['last-name'];

    return $isValid;
}

function validAge(){
    global $f3;

    $isValid = true;

    $age = $_POST["age"];
    if ($age == "" || !is_numeric($age) || ($age < 18 || $age > 100 )) {
        $f3->set("errors['age']", "Please enter a valid age");
        $isValid = false;
    }
    $_SESSION['age'] = $_POST['age'];
    return $isValid;
}

function validPhone()
{
$phoneRegex = "/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/";

    global $f3;

    $isValid = true;
    if (($_POST["phone"]) == "" AND !preg_match($phoneRegex, trim($_POST['phone']))) {
        $f3->set("errors['phone']", "Please enter a valid phone number");
        $isValid = false;
    }

    $_SESSION['phone'] = $_POST['phone'];
    return $isValid;
}

function emailValid(){
    global $f3;
    $emailRegex = "/[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i";

    $isValid = true;
    $email = $_POST['email'];

    if($email == "" || !preg_match($emailRegex, trim($email))){
        $f3->set("errors['email']", "Please enter a valid email");
            $isValid= false;
        }

    $_SESSION['bio'] = $_POST['bio'];
    $_SESSION['email'] = $email;
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seeking'] = $_POST['optradio'];

    return $isValid;
}
