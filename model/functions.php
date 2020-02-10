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
    $isValid = true;
    $phoneRegex = "/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/";

    $fname = $_POST["first-name"];
    if ($fname == "" || is_numeric($fname)) {
        echo '<style type="text/css">
        #fName-err {
            visibility: visible;
        }
        </style>';
        $isValid = false;
    }

    $lname = $_POST["last-name"];
    if ($lname == "" || is_numeric($lname)) {
        echo '<style type="text/css">
        #lName-err {
            visibility: visible;
        }
        </style>';
        $isValid = false;
    }

    $age = $_POST["age"];
    if ($age == "" || !is_numeric($age)) {
        echo '<style type="text/css">
        #age-err {
            visibility: visible;
        }
        </style>';
        $isValid = false;
    }

    if (($_POST["phone"]) == "" AND !preg_match($phoneRegex, trim($_POST['phone']))) {
        echo '<style type="text/css">
        #phone-err {
            visibility: visible;
        }
        </style>';
        $isValid = false;
    }

    $_SESSION['fName'] = $_POST['first-name'];
    $_SESSION['lName'] = $_POST['last-name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['optradio'];
    $_SESSION['phone'] = $_POST['phone'];

    return $isValid;
}