<?php
/**
 * Created by PhpStorm.
 * User: wills
 * Date: 02/04/2019
 * Time: 18:09
 */


class App
{
    private $request;

    public function __construct(){
        $this->request = new Request();
    }

    public function start(){
        Router::run($this->request);
    }
}