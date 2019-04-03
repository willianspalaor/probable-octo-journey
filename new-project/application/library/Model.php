<?php
/**
 * Created by PhpStorm.
 * User: wills
 * Date: 02/04/2019
 * Time: 19:19
 */

include_once(BASE_PATH . '/configs/Connection.php');

class Model
{
    private $conn;
    private $entity;
    private $method;
    private $sql;
    private $params;
    private $id;

    public function __construct(){
        $this->conn = Connection::getInstance();
    }

    public function save($sql, $entity, $method, $params = null){

        $this->sql = $sql;
        $this->entity = $entity;
        $this->method = $method;
        $this->params = $params;

        if(empty($entity->$method())){
            self::create();
        }else{
            self::update();
        }
    }

    public function create(){

        $this->conn->beginTransaction();

        try{

            $stmt = $this->conn->prepare($this->sql);

            foreach($this->entity->toArray() as $key => $value){
                $stmt->bindValue(':' . $key, empty($value) ? null : $value);
            }

            $stmt->execute();
            $this->id = $this->conn->lastInsertId();
            $this->conn->commit();

        }catch(Exception $e){
            echo $e->getMessage();
            $this->conn->rollBack();
        }
    }


    public function update(){

        $this->conn->beginTransaction();

        try{

            $stmt = $this->conn->prepare($this->sql);

            foreach($this->entity->toArray() as $key => $value){
                $stmt->bindValue(':' . $key, empty($value) ? null : $value);
            }

            foreach($this->params as $key => $value){
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            $this->conn->commit();

        }catch(Exception $e){
            echo $e->getMessage();
            $this->conn->rollBack();
        }
    }

    public function delete($sql, $params){

        $this->sql = $sql;
        $this->params = $params;
        $this->conn->beginTransaction();

        try{

            $stmt = $this->conn->prepare($this->sql);

            foreach($this->params as $key => $value){
                $stmt->bindValue(':' . $key, empty($value) ? null : $value);
            }

            $stmt->execute();
            $this->conn->commit();

        }catch(Exception $e){
            print($e->getMessage());
            $this->conn->rollBack();
        }
    }


    public function findOne($sql, $params){

        $this->sql= $sql;
        $this->params = $params;

        try{

            $stmt = $this->conn->prepare($this->sql);

            foreach($this->params as $key => $value){
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            return $stmt->fetch();

        }catch(Exception $e){
            print($e->getMessage());
        }

        return false;
    }

    public function findAll($sql, $params = []){

        $this->sql = $sql;
        $this->params = $params;

        try{

            $stmt = $this->conn->prepare($this->sql);

            foreach($this->params as $key => $value){
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            return $stmt->fetchAll();

        }catch(Exception $e){
            print($e->getMessage());
        }

        return [];
    }
}