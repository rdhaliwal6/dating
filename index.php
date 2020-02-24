<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("vendor/autoload.php");
session_start();
require_once("model/functions.php");


//create an instance of the base class
$f3 = Base::instance();
$controller = new DatingController($f3);

$f3->set('genders', array('Male', 'Female'));
$f3->set('inInterests', array('TV','Movies', 'Cooking', 'Board Games','Puzzles','Reading'
,'Playing Cards','Video Games'));
$f3->set('outInterests', array('Hiking','Biking','Swimming','Collecting','Walking','Climbing'));
$f3->set('states' , array(
    'AL'=>'Alabama',
    'AK'=>'Alaska',
    'AZ'=>'Arizona',
    'AR'=>'Arkansas',
    'CA'=>'California',
    'CO'=>'Colorado',
    'CT'=>'Connecticut',
    'DE'=>'Delaware',
    'DC'=>'District of Columbia',
    'FL'=>'Florida',
    'GA'=>'Georgia',
    'HI'=>'Hawaii',
    'ID'=>'Idaho',
    'IL'=>'Illinois',
    'IN'=>'Indiana',
    'IA'=>'Iowa',
    'KS'=>'Kansas',
    'KY'=>'Kentucky',
    'LA'=>'Louisiana',
    'ME'=>'Maine',
    'MD'=>'Maryland',
    'MA'=>'Massachusetts',
    'MI'=>'Michigan',
    'MN'=>'Minnesota',
    'MS'=>'Mississippi',
    'MO'=>'Missouri',
    'MT'=>'Montana',
    'NE'=>'Nebraska',
    'NV'=>'Nevada',
    'NH'=>'New Hampshire',
    'NJ'=>'New Jersey',
    'NM'=>'New Mexico',
    'NY'=>'New York',
    'NC'=>'North Carolina',
    'ND'=>'North Dakota',
    'OH'=>'Ohio',
    'OK'=>'Oklahoma',
    'OR'=>'Oregon',
    'PA'=>'Pennsylvania',
    'RI'=>'Rhode Island',
    'SC'=>'South Carolina',
    'SD'=>'South Dakota',
    'TN'=>'Tennessee',
    'TX'=>'Texas',
    'UT'=>'Utah',
    'VT'=>'Vermont',
    'VA'=>'Virginia',
    'WA'=>'Washington',
    'WV'=>'West Virginia',
    'WI'=>'Wisconsin',
    'WY'=>'Wyoming',
));

//define a default route
$f3->route('GET /', function () {
    $GLOBALS['controller']->home();
});

$f3->route('POST|GET /personal', function ($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (validation()) {
            $_SESSION['premium'] = $_POST['premiumMember'];
            if ($_POST['premiumMember'] == "isPremium") {
                $_SESSION['member'] = new PremiumMember($_POST['first-name'], $_POST['last-name'], $_POST['age']
                    , $_POST['gender'], $_POST['phone']);
            } else {
                $_SESSION['member'] = new Member($_POST['first-name'], $_POST['last-name'], $_POST['age']
                    , $_POST['gender'], $_POST['phone']);
            }
            $f3->reroute('profile');
        }
        $f3->set("gender", $_POST['gender']);
    }
    $GLOBALS['controller']->personalInfo();
});

$f3->route('POST|GET /profile', function ($f3)
    {
    $view = new Template();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (emailValid()) {
                $_SESSION['member']->setEmail($_POST['email']);
                $_SESSION['member']->setState($_POST['state']);
                $_SESSION['member']->setBio($_POST['bio']);
                $_SESSION['member']->setSeeking($_POST['optradio']);
                if ($_SESSION['premium'] == "isPremium") {
                    $f3->reroute('interest');
                } else {
                    $f3->reroute('summary');
                }
            }
        }
    echo $view->render('views/Profile.html');
});

$f3->route('POST|GET /interest', function ($f3) {
    $view = new Template();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $out = $_POST['outDoor'];
        $in = $_POST['inDoor'];

        var_dump($in);
        var_dump($out);
        $_SESSION['member']->setInDoorInterests($in);
        $_SESSION['member']->setOutDoorInterests($out);

        if (outDoor($out, $f3->get('outInterests')) &&
            inDoor($in, $f3->get('inInterests')))
        {

            $f3->reroute('/summary');
        }
    }
    echo $view->render('views/Interests.html');
});

$f3->route('POST|GET /summary', function () {
    $view = new Template();
    echo $view->render('views/Summary.html');
});

//run fat free
$f3->run();
