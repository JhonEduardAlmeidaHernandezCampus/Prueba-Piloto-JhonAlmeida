import locations from "./components/locations.js";
import subjects from "./components/subjects.js";
import areas from "./components/areas.js";
import routes from "./components/routes.js";
import thematicUnit from "./components/thematicUnit.js";

locations.changeSections();
locations.saveForm();

subjects.changeSectionsSubjects();
subjects.saveFormSubjects();

areas.changeSectionsAreas();
areas.saveFormAreas();

routes.changeSectionsRoutes();
routes.saveFormRoute();

thematicUnit.changeSectionsTematicUnit();
thematicUnit.saveFormTematicUnit();