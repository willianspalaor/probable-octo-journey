<?php
/**
 * Created by PhpStorm.
 * User: wills
 * Date: 02/04/2019
 * Time: 23:10
 */

include_once(BASE_PATH . '/models/Product.php');

class ProductModel extends Model
{
    public function findAll($field = null, $where = null){

        $field = empty($field) ? '*' : $field;

        $sql = 'SELECT ' . $field . 'FROM product' . $where;
        $result = parent::findAll($sql);

        $products = array();

        if(!empty($result)){

            foreach($result as $product){
                $products[] = new Product($product);
            }
        }

        return $products;
    }
}