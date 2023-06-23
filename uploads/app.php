<?php
    require_once "../vendor/autoload.php";

    $router = new \Bramus\Router\Router();

    $router->get("/campus", function (){
        \App\staff::getInstance()->getStaff();
    });

    $router->run();

    // teachers::getInstance(json_decode(file_get_contents("php://input"), true))->postTeachers(2, 1, 1, 1, 1);
    // \App\regions::getInstance()->getRegion();
    // teachers::getInstance(json_decode(file_get_contents("php://input"), true))->updateTeachers(2, 1, 1, 1, 2, 2);
    // teachers::getInstance()->deleteTeachers(1);

?>