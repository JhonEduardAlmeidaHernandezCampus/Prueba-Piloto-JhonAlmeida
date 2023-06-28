import locations from "./components/locations.js";
import subjects from "./components/subjects.js";
import areas from "./components/areas.js";
import routes from "./components/routes.js";
import thematicUnit from "./components/thematicUnit.js";
import chapter from "./components/chapter.js";
import countries from "./components/countries.js";
import theme from "./components/theme.js";
import modules from "./components/modules.js";
import topics from "./components/topics.js";
import team_educators from "./components/team_educators.js";
import levels from "./components/levels.js";
import work_references from "./components/work_references.js";
import personal_reference from "./components/personal_reference.js";
import positions from "./components/positions.js";
import journey from "./components/journey.js";
import regions from "./components/regions.js";
import cities from "./components/cities.js";
import emergency_contact from "./components/emergency_contact.js";

locations.changeSections();
locations.saveForm();

subjects.changeSectionsSubjects();
subjects.saveFormSubjects();

areas.changeSectionsAreas();
areas.saveFormAreas();

routes.changeSectionsRoutes();
routes.saveFormRoute();

document.querySelector("#thematic_units").addEventListener("click", (e) =>{
    thematicUnit.showFormThematicUnit();
})

document.querySelector("#chapters").addEventListener("click", (e) =>{
    chapter.showFormChapter();
})

countries.changeSectionsCountries();
countries.saveFormCountries();

document.querySelector("#themes").addEventListener("click", (e) =>{
    theme.showFormTheme();
})

document.querySelector("#modules").addEventListener("click", (e) =>{
    modules.showFormModules();
})

document.querySelector("#topics").addEventListener("click", (e) =>{
    topics.showFormTopics();
})

team_educators.changeSectionsTeamEducators();
team_educators.saveFormTeamEducators();

levels.changeSectionsLevels();
levels.saveFormLevels();

work_references.changeSectionsWorkReferences();
work_references.saveFormWorkReferences();

personal_reference.changeSectionsPersonalReference();
personal_reference.saveFormPersonalReference();

positions.changeSectionsPosition();
positions.saveFormPosition();

journey.changeSectionsJourney();
journey.saveFormJourney();

document.querySelector("#regions").addEventListener("click", (e) =>{
    regions.showFormRegion();
})

document.querySelector("#cities").addEventListener("click", (e) =>{
    cities.showFormCities();
})

document.querySelector("#emergency_contact").addEventListener("click", (e) =>{
    emergency_contact.showFormEmergencyContact();
})