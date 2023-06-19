<?php
require 'model/UserModel.php';

class userController{
    public $userModel;
    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function create($getData,$file){
        $folderPath = 'model/Images/';
        move_uploaded_file($file['tmp_name'],$folderPath.$file['name']);

        if($getData){
            $name = $getData['productName'];
            $Image = '../model/Images/'.$file['name'];
            $model = $getData['productModel'];
            $brand = $getData['brandName'];
            $price = $getData['productPrice'];
            $ManuDate = $getData['manufactureDate'];
            $stock = $getData['stocks'];
    $regex = "\b((?=[A-Za-z/ -]{0,19}\d)[A-Za-z0-9/ -]{4,20})\b";
            if(isset($name) && isset($Image) && preg_match($regex,$model) && isset($brand) && isset($price) && isset($ManuDate) && isset($stock) ){
                $this->userModel->create($name,$Image,$model,$brand,$price,$ManuDate,$stock);
                header('location: /');
                unset($_SESSION['error']);
            }
            else{
               $_SESSION['error'] = 'please enter correct value';
               require 'view/userInput.php';
            }

        }else{
            require'view/userInput.php';
        }
    }

    public function getAllProducts(){
    $getProducts = $this->userModel->getProducts();
        require 'view/list.php';
    }

    public function edit($getData,$file){
        $folderPath = 'model/Images/';
        move_uploaded_file($file['tmp_name'],$folderPath.$file['name']);

        $id = $getData['editId'];
        $name = $getData['productName'];
        $Image = '../model/Images/'.$file['name'];
        $model = $getData['productModel'];
        $brand = $getData['brandName'];
        $price = $getData['productPrice'];
        $ManuDate = $getData['manufactureDate'];
        $stock = $getData['stocks'];
        $this->userModel->edit($name,$Image,$model,$brand,$price,$ManuDate,$stock,$id);
        header('location: /');
    }

    public function delete($getId){
        $this->userModel->delete($getId);
        header('location: /');
    }

    public function read($getId){
     $getDetails =  $this->userModel->read($getId);
        require 'view/view.php';
    }

}
