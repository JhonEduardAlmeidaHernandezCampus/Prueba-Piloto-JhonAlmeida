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


    // Chapters
    $router->post("/postChapters", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\chapters::getInstance()->postChapters(...$_DATA);
    });

    $router->get("/getAllChapters", function (){
       echo json_decode(\App\chapters::getInstance()->getAllChapters());
    });

    $router->get("/getChapters/{id}", function ($id){
        echo json_decode(\App\chapters::getInstance()->getChapters($id));
     });

    $router->put("/putChapters/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\chapters::getInstance()->updateChapters($_DATA, $id);
    });

    $router->delete("/deleteChapters/{id}", function ($id){
        \App\chapters::getInstance()->deleteChapters($id);
    });


    // Countries
    $router->post("/postCountry", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\country::getInstance()->postCountry(...$_DATA);
    });

    $router->get("/getAllCountry", function (){
        echo json_decode(\App\country::getInstance()->getAllCountry());
     });

    $router->get("/getCountry/{id}", function ($id){
        echo json_decode(\App\country::getInstance()->getCountry($id));
     });

    $router->put("/putCountry/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\country::getInstance()->updateCountry($_DATA, $id);
    });

    $router->delete("/deleteCountry/{id}", function ($id){
        \App\country::getInstance()->deleteCountry($id);
    });


    // Themes
    $router->post("/postThemes", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\themes::getInstance()->postThemes(...$_DATA);
    });

    $router->get("/getAllThemes", function (){
        echo json_decode(\App\themes::getInstance()->getAllThemes());
     });

    $router->get("/getThemes/{id}", function ($id){
        echo json_decode(\App\themes::getInstance()->getThemes($id));
     });

    $router->put("/putThemes/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\themes::getInstance()->updateThemes($_DATA, $id);
    });

    $router->delete("/deleteThemes/{id}", function ($id){
        \App\themes::getInstance()->deleteThemes($id);
    });



    // Modules
    $router->post("/postModules", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\modules::getInstance()->postModules(...$_DATA);
    });

    $router->get("/getAllModules", function (){
        echo json_decode(\App\modules::getInstance()->getAllModules());
     });

    $router->get("/getModules/{id}", function ($id){
        echo json_decode(\App\modules::getInstance()->getModules($id));
     });

    $router->put("/putModules/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\modules::getInstance()->updateModules($_DATA, $id);
    });

    $router->delete("/deleteModules/{id}", function ($id){
        \App\modules::getInstance()->deleteModules($id);
    });



    // Topics
    $router->post("/postTopics", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\topics::getInstance()->postTopics(...$_DATA);
    });

    $router->get("/getAllTopics", function (){
        echo json_decode(\App\topics::getInstance()->getAllTopics());
     });

    $router->get("/getTopics/{id}", function ($id){
        echo json_decode(\App\topics::getInstance()->getTopics($id));
     });

    $router->put("/putTopics/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\topics::getInstance()->updateTopics($_DATA, $id);
    });

    $router->delete("/deleteTopics/{id}", function ($id){
        \App\topics::getInstance()->deleteTopics($id);
    });



    // Team Educators
    $router->post("/postTeamEducators", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\team_educators::getInstance()->postTeamEducators(...$_DATA);
    });

    $router->get("/getAllTeamEducators", function (){
        echo json_decode(\App\team_educators::getInstance()->getAllTeamEducators());
     });

    $router->get("/getTeamEducators/{id}", function ($id){
        echo json_decode(\App\team_educators::getInstance()->getTeamEducators($id));
     });

    $router->put("/putTeamEducators/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\team_educators::getInstance()->updateTeamEducators($_DATA, $id);
    });

    $router->delete("/deleteTeamEducators/{id}", function ($id){
        \App\team_educators::getInstance()->deleteTeamEducators($id);
    });



    // Levels
    $router->post("/postLevels", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\levels::getInstance()->postLevels(...$_DATA);
    });

    $router->get("/getAllLevels", function (){
        echo json_decode(\App\levels::getInstance()->getAllLevels());
     });

    $router->get("/getLevels/{id}", function ($id){
        echo json_decode(\App\levels::getInstance()->getLevels($id));
     });

    $router->put("/putLevels/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\levels::getInstance()->updateLevels($_DATA, $id);
    });

    $router->delete("/deleteLevels/{id}", function ($id){
        \App\levels::getInstance()->deleteLevels($id);
    });



    // Work References
    $router->post("/postWorkReference", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\work_reference::getInstance()->postWorkReference(...$_DATA);
    });

    $router->get("/getAllWorkReference", function (){
        echo json_decode(\App\work_reference::getInstance()->getAllWorkReference());
    });

    $router->get("/getWorkReference/{id}", function ($id){
        echo json_decode(\App\work_reference::getInstance()->getWorkReference($id));
    });

    $router->put("/putWorkReference/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\work_reference::getInstance()->updateWorkReference($_DATA, $id);
    });

    $router->delete("/deleteWorkReference/{id}", function ($id){
        \App\work_reference::getInstance()->deleteWorkReference($id);
    });



     // Personal References
     $router->post("/postPersonalReference", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\personal_reference::getInstance()->postPersonalReference(...$_DATA);
    });

    $router->get("/getAllPersonalReference", function (){
        echo json_decode(\App\personal_reference::getInstance()->getAllPersonalReference());
    });

    $router->get("/getPersonalReference/{id}", function ($id){
        echo json_decode(\App\personal_reference::getInstance()->getPersonalReference($id));
    });

    $router->put("/putPersonalReference/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\personal_reference::getInstance()->updatePersonalReference($_DATA, $id);
    });

    $router->delete("/deletePersonalReference/{id}", function ($id){
        \App\personal_reference::getInstance()->deletePersonalReference($id);
    });



    // Position
    $router->post("/postPosition", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\position::getInstance()->postPosition(...$_DATA);
    });

    $router->get("/getAllPosition", function (){
        echo json_decode(\App\position::getInstance()->getAllPosition());
    });

    $router->get("/getPosition/{id}", function ($id){
        echo json_decode(\App\position::getInstance()->getPosition($id));
    });

    $router->put("/putPosition/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\position::getInstance()->updatePosition($_DATA, $id);
    });

    $router->delete("/deletePosition/{id}", function ($id){
        \App\position::getInstance()->deletePosition($id);
    });

    

    // Journey
    $router->post("/postJourney", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\journey::getInstance()->postJourney(...$_DATA);
    });

    $router->get("/getAllJourney", function (){
        echo json_decode(\App\journey::getInstance()->getAllJourney());
    });

    $router->get("/getJourney/{id}", function ($id){
        echo json_decode(\App\journey::getInstance()->getJourney($id));
    });

    $router->put("/putJourney/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\journey::getInstance()->updateJourney($_DATA, $id);
    });

    $router->delete("/deleteJourney/{id}", function ($id){
        \App\journey::getInstance()->deleteJourney($id);
    });



    // Regions
    $router->post("/postRegion", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\regions::getInstance()->postRegion(...$_DATA);
    });

    $router->get("/getAllRegion", function (){
        echo json_decode(\App\regions::getInstance()->getAllRegion());
    });

    $router->get("/getRegion/{id}", function ($id){
        echo json_decode(\App\regions::getInstance()->getRegion($id));
    });

    $router->put("/putRegion/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\regions::getInstance()->updateRegion($_DATA, $id);
    });

    $router->delete("/deleteRegion/{id}", function ($id){
        \App\regions::getInstance()->deleteRegion($id);
    });



    // Cities
    $router->post("/postCities", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\cities::getInstance()->postCities(...$_DATA);
    });

    $router->get("/getAllCities", function (){
        echo json_decode(\App\cities::getInstance()->getAllCities());
    });

    $router->get("/getCities/{id}", function ($id){
        echo json_decode(\App\cities::getInstance()->getCities($id));
    });

    $router->put("/putCities/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\cities::getInstance()->updateCities($_DATA, $id);
    });

    $router->delete("/deleteCities/{id}", function ($id){
        \App\cities::getInstance()->deleteCities($id);
    });



    // Staff
    $router->post("/postStaff", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\staff::getInstance()->postStaff(...$_DATA);
    });

    $router->get("/getAllStaff", function (){
        echo json_decode(\App\staff::getInstance()->getAllStaff());
    });

    $router->get("/getStaff/{id}", function ($id){
        echo json_decode(\App\staff::getInstance()->getStaff($id));
    });

    $router->put("/putStaff/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\staff::getInstance()->updateStaff($_DATA, $id);
    });

    $router->delete("/deleteStaff/{id}", function ($id){
        \App\staff::getInstance()->deleteStaff($id);
    });



    // Emergency Contact
    $router->post("/postEmergencyContact", function (){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\emergency_contact::getInstance()->postEmergencyContact(...$_DATA);
    });

    $router->get("/getAllEmergencyContact", function (){
        echo json_decode(\App\emergency_contact::getInstance()->getAllEmergencyContact());
    });

    $router->get("/getEmergencyContact/{id}", function ($id){
        echo json_decode(\App\emergency_contact::getInstance()->getEmergencyContact($id));
    });

    $router->put("/putEmergencyContact/{id}", function ($id){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        \App\emergency_contact::getInstance()->updateEmergencyContact($_DATA, $id);
    });

    $router->delete("/deleteEmergencyContact/{id}", function ($id){
        \App\emergency_contact::getInstance()->deleteEmergencyContact($id);
    });

    $router->run();

?>