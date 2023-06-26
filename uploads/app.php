<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

    require_once "../vendor/autoload.php";

    $router = new \Bramus\Router\Router();

    // Locations
    $router->post("/postLocations", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\locations::getInstance()->postLocations(...$_DATA);
    });

    $router->get("/getAllLocations", function (){
       echo json_decode(\App\locations::getInstance()->getAllLocations());
    });

    $router->get("/getLocations/{id}", function ($id){
        echo json_decode(\App\locations::getInstance()->getLocations($id));
     });

    $router->put("/putLocations/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\locations::getInstance()->updateLocations($_DATA, $id);
    });

    $router->delete("/deleteLocations/{id}", function ($id){
        \App\locations::getInstance()->deleteLocations($id);
    });


    // Subjects
    $router->post("/postSubjects", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\subjects::getInstance()->postSubjects(...$_DATA);
    });

    $router->get("/getAllSubjects", function (){
       echo json_decode(\App\subjects::getInstance()->getAllSubjects());
    });

    $router->get("/getSubjects/{id}", function ($id){
        echo json_decode(\App\subjects::getInstance()->getSubjects($id));
     });

    $router->put("/putSubjects/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\subjects::getInstance()->updateSubjects($_DATA, $id);
    });

    $router->delete("/deleteSubjects/{id}", function ($id){
        \App\subjects::getInstance()->deleteSubjects($id);
    });


    // Areas
    $router->post("/postAreas", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\areas::getInstance()->postAreas(...$_DATA);
    });

    $router->get("/getAllAreas", function (){
       echo json_decode(\App\areas::getInstance()->getAllAreas());
    });

    $router->get("/getAreas/{id}", function ($id){
        echo json_decode(\App\areas::getInstance()->getAreas($id));
     });

    $router->put("/putAreas/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\areas::getInstance()->updateAreas($_DATA, $id);
    });

    $router->delete("/deleteAreas/{id}", function ($id){
        \App\areas::getInstance()->deleteAreas($id);
    });


    // Routes
    $router->post("/postRoutes", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\routes::getInstance()->postRoutes(...$_DATA);
    });

    $router->get("/getAllRoutes", function (){
       echo json_decode(\App\routes::getInstance()->getAllRoutes());
    });

    $router->get("/getRoutes/{id}", function ($id){
        echo json_decode(\App\routes::getInstance()->getRoutes($id));
     });

    $router->put("/putRoutes/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\routes::getInstance()->updateRoutes($_DATA, $id);
    });

    $router->delete("/deleteRoutes/{id}", function ($id){
        \App\routes::getInstance()->deleteRoutes($id);
    });


    // Thematics Units
    $router->post("/postThematicUnits", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\thematic_units::getInstance()->postThematicUnits(...$_DATA);
    });

    $router->get("/getAllThematicUnits", function (){
       echo json_decode(\App\thematic_units::getInstance()->getAllThematicUnits());
    });

    $router->get("/getThematicUnits/{id}", function ($id){
        echo json_decode(\App\thematic_units::getInstance()->getThematicUnits($id));
     });

    $router->put("/putThematicUnits/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\thematic_units::getInstance()->updateThematicUnits($_DATA, $id);
    });

    $router->delete("/deleteThematicUnits/{id}", function ($id){
        \App\thematic_units::getInstance()->deleteThematicUnits($id);
    });

    $router->run();

?>