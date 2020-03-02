<?php
//<!--// Rajpreet Dhaliwal-->
//<!--// 1/16/20-->
//<!--// /328/dating/model/validation.php-->
//<!--// functions page for dating.-->
/**
 * @param array $x
 * @return string
 */
function interest(array $x)
{
    $int = "";
    foreach ($x as $value) {
        $int = $int . " " . $value;
    }
    return $int;
}

/**
 * @return bool
 */
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

/**
 * @return bool
 */
function validName()
{
    global $f3;

    $isValid = true;
    $fname = $_POST["first-name"];
    if (empty($fname) || is_numeric($fname)) {
        $f3->set("errors['firstName']", "Please enter a first name");

        $isValid = false;
    }

    $lname = $_POST["last-name"];
    if (empty($lname) || is_numeric($lname)) {
        $f3->set("errors['lastName']", "Please enter a last name");
        $isValid = false;
    }

    $_SESSION['fName'] = $_POST['first-name'];
    $_SESSION['lName'] = $_POST['last-name'];

    return $isValid;
}

/**
 * @return bool
 */
function validAge()
{
    global $f3;

    $isValid = true;

    $age = $_POST["age"];
    if (empty($age) || !is_numeric($age) || ($age < 18 || $age > 100)) {
        $f3->set("errors['age']", "Please enter a valid age");
        $isValid = false;
    }
    $_SESSION['age'] = $_POST['age'];
    return $isValid;
}

/**
 * @return bool
 */
function validPhone()
{
    $phoneRegex = "/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/";

    global $f3;

    $isValid = true;
    if ($_POST["phone"] == "" AND !preg_match($phoneRegex, trim($_POST['phone']))) {
        $f3->set("errors['phone']", "Please enter a valid phone number");
        $isValid = false;
    }

    $_SESSION['phone'] = $_POST['phone'];
    return $isValid;
}

/**
 * @return bool
 */
function emailValid()
{
    global $f3;
    $emailRegex = "/[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i";

    $isValid = true;
    $email = $_POST['email'];

    if (empty($email) || !preg_match($emailRegex, trim($email))) {
        $f3->set("errors['email']", "Please enter a valid email");
        $isValid = false;
    }

    $_SESSION['bio'] = $_POST['bio'];
    $_SESSION['email'] = $email;
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seeking'] = $_POST['optradio'];

    return $isValid;
}

/**
 * @param $user
 * @param $list
 * @return bool
 */
function outDoor($user, $list)
{
    global $f3;
    if (sizeof($user) == 0) {
        return true;
    } else {
        foreach ($user as $value) {
            if (!in_array($value, $list)) {
                $f3->set("errors['outDoor']", "Invalid Entry");
                return false;
            }
        }
    }
    return true;

}

/**
 * @param $user
 * @param $list
 * @return bool
 */
function inDoor($user, $list)
{
    global $f3;
    if (sizeof($user) == 0) {
        return true;
    } else {
        foreach ($user as $value) {
            if (!in_array($value, $list)) {
                $f3->set("errors['inDoor']", "Invalid Entry");
                return false;
            }
        }
    }
    return true;
}
