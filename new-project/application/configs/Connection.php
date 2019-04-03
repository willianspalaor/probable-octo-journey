<?php
/**
 * Created by PhpStorm.
 * User: wills
 * Date: 02/04/2019
 * Time: 19:16
 */

class Connection extends PDO
{
    public static $instance;

    public static function getInstance(){

        if(!isset(self::$instance)){

            try{
                self::$instance = new PDO('mysql:host=localhost;dbname=project_php', 'root', '');
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        return self::$instance;
    }
}