<?php
/**
 * Created by PhpStorm.
 * User: wills
 * Date: 02/04/2019
 * Time: 18:34
 */

include_once(BASE_PATH . '/models/ProductModel.php');


class IndexController extends Controller
{
    public function __construct(){
        $this->setLayout('index');
    }

    public function indexAction(){

        $model = new ProductModel();
        $this->products = $model->findAll();
        $this->setView('index');
        $this->loadPage();
    }
}