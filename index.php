<?php

require 'controller/controller.php';
require 'core/router.php';
session_start();
$controller = new userController();
$router  = new router();

$router->get('/','list');
$router->post("/create",'create');
$router->patch("/edit",'edit');
$router->delete("/delete",'delete');
$router->get('/userView','userView');

$router->routingFunc();