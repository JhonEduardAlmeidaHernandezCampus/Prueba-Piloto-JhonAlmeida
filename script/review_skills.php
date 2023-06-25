<?php
namespace App;
    class review_skills extends connect{
        use getInstance;
        private $message;
        private $queryPostReviewSkills = 'INSERT INTO review_skills (id_team_schedule, id_journey, id_tutor, id_location) VALUES (:id_team_schedule, :id_journey, :id_tutor, :id_location)';
        private $queryGetReviewSkills = 'SELECT * FROM review_skills';
        private $queryUpdateReviewSkills = 'UPDATE review_skills SET id_team_schedule = :id_team_schedule, id_journey = :id_journey, id_tutor = :id_tutor, id_location = :id_location WHERE id = :id_review_skills';
        private $queryDeleteReviewSkills = 'DELETE FROM review_skills WHERE id = :id_review_skills';

        public function __construct(){parent::__construct();}

        public function postReviewSkills($id_team_schedule, $id_journey, $id_tutor, $id_location){
            try {
                $res = $this->connec->prepare($this->queryPostReviewSkills);
                $res->bindValue("id_team_schedule", $id_team_schedule);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_tutor", $id_tutor);
                $res->bindValue("id_location", $id_location);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getReviewSkills(){
            try {
                $res = $this->connec->prepare($this->queryGetReviewSkills);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateReviewSkills($id_team_schedule, $id_journey, $id_tutor, $id_location, $id_review_skills){
            try {
                $res = $this->connec->prepare($this->queryUpdateReviewSkills);
                $res->bindValue("id_team_schedule", $id_team_schedule);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_tutor", $id_tutor);
                $res->bindValue("id_location", $id_location);
                $res->bindValue("id_review_skills", $id_review_skills);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteReviewSkills($id_review_skills){
            try {
                $res = $this->connec->prepare($this->queryDeleteReviewSkills);
                $res->bindValue("id_review_skills", $id_review_skills);
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