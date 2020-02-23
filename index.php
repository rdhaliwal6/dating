<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("vendor/autoload.php");
session_start();
require_once("model/functions.php");


//create an instance of the base class
$f3 = Base::instance();
$f3->set('genders', array('Male', 'Female'));
//$outInterests = array('TV','Movies', 'Cooking', 'Board Games','Puzzles','Reading'
//,'Playing Cards','Video Games','Hiking','Biking','Swimming','Collecting','Walking','Climbing');
//$inInterests = array('Hiking','Biking','Swimming','Collecting','Walking','Climbing');
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
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('POST|GET /personal', function ($f3) {
    $view = new Template();

    if(validation()){
        if($_POST['premiumMember'] == "isPremium")
        {
            $_SESSION['member'] = new PremiumMember($_POST['first-name'], $_POST['last-name'], $_POST['age']
                ,$_POST['gender'],$_POST['phone']);
        }
        else
        {
            $_SESSION['member'] = new Member($_POST['first-name'], $_POST['last-name'], $_POST['age']
                ,$_POST['gender'],$_POST['phone']);
        }
        $f3->reroute('profile');
    }
    $f3->set("gender", $_POST['gender']);
    echo $view->render('views/PersonalInfo.html');

});

$f3->route('POST|GET /profile', function ($f3)
    {
    $view = new Template();
    if(emailValid()){
        $_SESSION['member']->setEmail($_POST['email']);
        $_SESSION['member']->setState($_POST['state']);
        $_SESSION['member']->setBio($_POST['bio']);
        $_SESSION['member']->setSeeking($_POST['optradio']);
        $_SESSION['premium'] = $_POST['premiumMember'];
        if($_POST['premiumMember'] == "isPremium") {
            $f3->reroute('interest');
        }
        else{
            $f3->reroute('summary');
        }
    }

    echo $view->render('views/Profile.html');
});

$f3->route('POST|GET /interest', function ($f3) {
    $view = new Template();
    $outInterests = array('TV','Movies', 'Cooking', 'Board Games','Puzzles','Reading'
    ,'Playing Cards','Video Games','Hiking','Biking','Swimming','Collecting','Walking','Climbing');
    if(isset($_POST['interest'])) {
//        if (!interests($_POST['interest'], $outInterests)) {
            $f3->reroute('summary');
//        }
    }
    echo $view->render('views/Interests.html');
});

$f3->route('POST|GET /summary', function () {
    $view = new Template();

    $_SESSION['interests'] = "None";

    echo $view->render('views/Summary.html');
});

//run fat free
$f3->run();
