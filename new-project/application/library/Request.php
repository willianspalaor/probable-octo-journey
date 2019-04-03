<?php
/**
 * Created by PhpStorm.
 * User: wills
 * Date: 02/04/2019
 * Time: 18:15
 */

class Request
{
    private $controller;
    private $action;
    private $args;

    public function __construct(){

        try{

            $url = $_SERVER['REQUEST_URI'];

            if(!isset($url)){
                throw new Exception('URL not found');
            }

            $segments = explode('/', $url);
            array_shift($segments);

            // Padrão de url: dominio/controller/action/args
            $this->controller = ($controller = array_shift($segments)) ? $controller : 'index';
            $this->action = ($action = array_shift($segments)) ? $action : 'index';
            $this->args = is_array($segments) ? $segments : array();

        }catch(Exception $e){
            echo $e->getMessage(); die();
        }
    }

    public function getController(){
        return $this->controller;
    }

    public function getAction(){
        return $this->action;
    }

    public function getArgs(){
        return $this->args;
    }
}