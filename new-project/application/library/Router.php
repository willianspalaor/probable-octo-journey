<?php
/**
 * Created by PhpStorm.
 * User: wills
 * Date: 02/04/2019
 * Time: 18:23
 */

class Router
{
    public static function run(Request $request){
        $controller = ucfirst($request->getController()) . 'Controller';
        $src = BASE_PATH . '/controllers/' . $controller . '.php';

        try{

            $controller = ucfirst($request->getController()) . 'Controller';
            $action = $request->getAction() . 'Action';
            $src = BASE_PATH . '/controllers/' . $controller . '.php';

            if(!file_exists($src)){
                throw new Exception('Controller not found');
            }

            include_once($src);
            $controller = new $controller();

            if(!is_callable(array($controller, $action))){
                throw new Exception('Action not found');
            }

            call_user_func(array($controller, $action), $request->getArgs());

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

}