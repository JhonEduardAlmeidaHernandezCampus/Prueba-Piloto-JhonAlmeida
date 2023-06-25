<?php
namespace App;
    class english_skills extends connect{
        use getInstance;
        private $message;
        private $queryPostEnglishSkills = 'INSERT INTO english_skills (id_team_schedule, id_journey, id_teacher, id_location, id_subject) VALUES (:id_team_schedule, :id_journey, :id_teacher, :id_location, :id_subject)';
        private $queryGetEnglishSkills = 'SELECT * FROM english_skills';
        private $queryUpdateEnglishSkills = 'UPDATE english_skills SET id_team_schedule = :id_team_schedule, id_journey = :id_journey, id_teacher = :id_teacher, id_location = :id_location, id_subject = :id_subject WHERE id = :id_english_skills';
        private $queryDeleteEnglishSkills = 'DELETE FROM english_skills WHERE id = :id_english_skills';

        public function __construct(){parent::__construct();}

        public function postEnglishSkills($id_team_schedule, $id_journey, $id_teacher, $id_location, $id_subject){
            try {
                $res = $this->connec->prepare($this->queryPostEnglishSkills);
                $res->bindValue("id_team_schedule", $id_team_schedule);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_teacher", $id_teacher);
                $res->bindValue("id_location", $id_location);
                $res->bindValue("id_subject", $id_subject);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getEnglishSkills(){
            try {
                $res = $this->connec->prepare($this->queryGetEnglishSkills);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateEnglishSkills($id_team_schedule, $id_journey, $id_teacher, $id_location, $id_subject, $id_english_skills){
            try {
                $res = $this->connec->prepare($this->queryUpdateEnglishSkills);
                $res->bindValue("id_team_schedule", $id_team_schedule);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_teacher", $id_teacher);
                $res->bindValue("id_location", $id_location);
                $res->bindValue("id_subject", $id_subject);
                $res->bindValue("id_english_skills", $id_english_skills);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteEnglishSkills($id_english_skills){
            try {
                $res = $this->connec->prepare($this->queryDeleteEnglishSkills);
                $res->bindValue("id_english_skills", $id_english_skills);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Eliminado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }
    }
?>