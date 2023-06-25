<?php
header("Access-Control-Allow-Origin: *");
    require_once "../vendor/autoload.php";

    $router = new \Bramus\Router\Router();

    $router->post("/campus", function (){
        \App\team_schedule::getInstance(json_decode(file_get_contents("php://input"), true))->getTeamSchedule();
    });

    // $router->get("/campus", function (){
    //     \App\team_schedule::getInstance()->getTeamSchedule();
    // });

    // $router->put("/campus", function (){
    //     \App\team_schedule::getInstance(json_decode(file_get_contents("php://input"), true))->updateTeamSchedule("B2", "14:00:00.000000", "22:00:00.000000", 1, 4);
    // });

    // $router->delete("/campus", function (){
    //     \App\team_schedule::getInstance()->deleteTeamSchedule(4);
    // });

    $router->run();

?>