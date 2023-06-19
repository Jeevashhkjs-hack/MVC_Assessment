<?php

class connectionCls
{
    public $connection;
    public function __construct()
    {
        try{
            $this->connection = new PDO('mysql:host=localhost;dbname=products_details','root','welcome');
        }
        catch (exception $e){
            die("connection error".$e->getMessage());
        }
    }
}

class userModel extends connectionCls{
    public function create($name,$Image,$model,$brand,$price,$ManuDate,$stock){
        $this->connection->query("INSERT INTO products (product_name,product_image,model_no,product_price,brand_name,manufacture_date,available_stock) VALUES ('$name','$Image','$model','$price','$brand','$ManuDate','$stock')");
    }
    public function getProducts(){
        $getProducts = $this->connection->query("SELECT * FROM products");
         return $getProducts->fetchAll(PDO::FETCH_OBJ);
    }
    public function edit($name,$Image,$model,$brand,$price,$ManuDate,$stock,$id){
        $this->connection->query("UPDATE products SET product_name='$name',product_image='$Image',model_no='$model',product_price='$price',brand_name='$brand',manufacture_date='$ManuDate',available_stock='$stock' WHERE id = '$id'");
    }
    public function delete($id){
        $this->connection->query("DELETE FROM products WHERE id ='$id' ");
    }
    public function read($getId){
    $getDe = $this->connection->query("SELECT * FROM products WHERE id = '$getId'");
        return $getDe->fetchAll(PDO::FETCH_OBJ);
    }
}
