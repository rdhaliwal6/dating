<?php

/**
 * Class DatingController
 */
class DatingController
{
    /**
     * @var
     */
    private $_f3; //Router
    /**
     * @var ValidatorDating
     */
    private $_val; //Validation

    /**
     * DatingController constructor.
     * @param $f3
     */
    public function __construct($f3)
    {
        $this->_f3 = $f3;
        $this->_val = new ValidatorDating();
    }

    /**
     *
     */
    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /**
     *
     */
    function personalInfo()
    {
        $view = new Template();
        echo $view->render('views/PersonalInfo.html');
    }

    /**
     *
     */
    function profile()
    {
        $view = new Template();
        echo $view->render('views/Profile.html');
    }

    /**
     *
     */
    function interests()
    {
        $view = new Template();
        echo $view->render('views/Interests.html');
    }

    /**
     *
     */
    function summary()
    {
        $view = new Template();
        echo $view->render('views/Summary.html');
    }
}
