<?php
/**
 * Created by PhpStorm.
 * User: wills
 * Date: 02/04/2019
 * Time: 18:06
 */


define('BASE_PATH', __DIR__ . '/application');
define('BASE_PUBLIC', __DIR__ . '/public');
define('BASE_LIBRARY', __DIR__ .'/application/library');

include_once(BASE_LIBRARY . '/App.php');
include_once(BASE_LIBRARY . '/Controller.php');
include_once(BASE_LIBRARY . '/Model.php');
include_once(BASE_LIBRARY . '/Router.php');
include_once(BASE_LIBRARY . '/Request.php');

(new App())->start();

