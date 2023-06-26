<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

    require_once "../vendor/autoload.php";

    $router = new \Bramus\Router\Router();

    $router->post("/postLocations", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\locations::getInstance()->postLocations(...$_DATA);
    });

    $router->get("/getLocations", function (){
       echo json_decode(\App\locations::getInstance()->getLocations());
    });

    // $router->put("/campus", function (){
    //     \App\team_schedule::getInstance(json_decode(file_get_contents("php://input"), true))->updateTeamSchedule("B2", "14:00:00.000000", "22:00:00.000000", 1, 4);
    // });

    $router->delete("/deleteLocations/{id}", function ($id){
        \App\locations::getInstance()->deleteLocations($id);
    });

    $router->run();

?>