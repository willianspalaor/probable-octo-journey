<?php
/**
 * Created by PhpStorm.
 * User: wills
 * Date: 02/04/2019
 * Time: 23:03
 */

class Product
{

    private $id;
    private $name;
    private $price;

    public function __construct($attrs){

        $this->id = isset($attrs['id_product']) ? $attrs['id_product'] : null;
        $this->name = isset($attrs['name_product']) ? $attrs['name_product'] : null;
        $this->price = isset($attrs['price_product']) ? $attrs['price_product'] : null;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

    public function toArray(){
        return [
            'id_product' => $this->id,
            'price_product' => $this->price,
            'name_product' => $this->name
        ];
    }
}