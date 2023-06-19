<?php

class router {
    public $router = [];
    public $controller;
    public function __construct()
    {
        $this->controller = new userController();
    }

    public function get($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET',
            'middleware' => null
        ];
        return $this;
    }

    public function post($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'POST',
            'middleware' => null
        ];
        return $this;
    }

    public function delete($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'DELETE',
            'middleware' => null
        ];
        return $this;
    }

    public function patch($uri,$action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'PATCH',
            'middleware' => null
        ];
        return $this;
    }

        public function routingFunc(){

            foreach ($this->router as $key) {
                if($key['uri'] === $_SERVER['REQUEST_URI']){
                    if($key['action']){
                        switch ($key['action']){
                            case 'create':
                                $this->controller->create($_POST,$_FILES['productImage']);
                                break;

                            case 'delete':
                                print_r($_POST);
                                $this->controller->delete($_POST['targetId']);
                                break;

                            case 'edit' :
                                $this->controller->edit($_POST,$_FILES['productImage']);
                                break;

                            case 'userView' :
                                $this->controller->read($_POST['targetId']);
                                break;

                            default :
                                $this->controller->getAllProducts();
                        }
                    }else{
                        $this->controller->getAllProducts();
                    }

                }
            }
            exit();
        }
    }
