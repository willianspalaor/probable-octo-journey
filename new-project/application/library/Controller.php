<?php
/**
 * Created by PhpStorm.
 * User: wills
 * Date: 02/04/2019
 * Time: 18:34
 */

class Controller
{
    public $view;
    public $layout;

    public function setView($name){
        $this->view = BASE_PATH . '/views/application/' . $name . '.phtml';
    }

    public function setLayout($name){
        $this->layout = BASE_PATH . '/views/layouts/' . $name . '.phtml';
    }

    public function loadPage(){
        include_once($this->layout);
    }
}