<?php
class DatingController
{
    private $_f3; //Router
    private $_val; //Validation

    public function __construct($f3)
    {
        $this->_f3 = $f3;
        $this->_val = new Validation();
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personalInfo()
    {
        $view = new Template();
        echo $view->render('views/PersonalInfo.html');
    }

    function profile()
    {
        $view = new Template();
        echo $view->render('views/Profile.html');
    }

    function interests() {
        $view = new Template();
        echo $view->render('views/Interests.html');
    }

    function summary() {
        $view = new Template();
        echo $view->render('views/Summary.html');
    }
}
