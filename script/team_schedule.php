<?php
namespace App;
    class team_schedule extends connect{
        use getInstance;
        private $message;
        private $queryPostTeamSchedule = 'INSERT INTO team_schedule (team_name, check_in_skills, check_out_skills, check_in_soft, check_out_soft, check_in_english, check_out_english, check_in_review, check_out_review, id_journey) VALUES (:team_name, :check_in_skills, :check_out_skills, :check_in_soft, :check_out_soft, :check_in_english, :check_out_english, :check_in_review, :check_out_review,  :id_journey)';
        private $queryGetTeamSchedule = 'SELECT * FROM team_schedule';
        private $queryUpdateTeamSchedule = 'UPDATE team_schedule SET team_name = :team_name, check_in_skills = :check_in_skills, check_out_skills = :check_out_skills, check_in_soft = :check_in_soft, check_out_soft = :check_out_soft, check_in_english = :check_in_english, check_out_english = :check_out_english, check_in_review = :check_in_review, check_out_review = :check_out_review, id_journey = :id_journey WHERE id = :id_team_schedule';
        private $queryDeleteTeamSchedule = 'DELETE FROM team_schedule WHERE id = :id_team_schedule';

        public function __construct(){parent::__construct();}

        public function postTeamSchedule($team_name, $check_in_skills, $check_out_skills, $check_in_soft, $check_out_soft, $check_in_english, $check_out_english, $check_in_review, $check_out_review, $id_journey){
            try {
                $res = $this->connec->prepare($this->queryPostTeamSchedule);
                $res->bindValue("team_name", $team_name);
                $res->bindValue("check_in_skills", $check_in_skills);
                $res->bindValue("check_out_skills", $check_out_skills);
                $res->bindValue("check_in_soft", $check_in_soft);
                $res->bindValue("check_out_soft", $check_out_soft);
                $res->bindValue("check_in_english", $check_in_english);
                $res->bindValue("check_out_english", $check_out_english);
                $res->bindValue("check_in_review", $check_in_review);
                $res->bindValue("check_out_review", $check_out_review);
                $res->bindValue("id_journey", $id_journey);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getTeamSchedule(){
            try {
                $res = $this->connec->prepare($this->queryGetTeamSchedule);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateTeamSchedule($team_name, $check_in_skills, $check_out_skills, $check_in_soft, $check_out_soft, $check_in_english, $check_out_english, $check_in_review, $check_out_review, $id_journey, $id_team_schedule){
            try {
                $res = $this->connec->prepare($this->queryUpdateTeamSchedule);
                $res->bindValue("team_name", $team_name);
                $res->bindValue("check_in_skills", $check_in_skills);
                $res->bindValue("check_out_skills", $check_out_skills);
                $res->bindValue("check_in_soft", $check_in_soft);
                $res->bindValue("check_out_soft", $check_out_soft);
                $res->bindValue("check_in_english", $check_in_english);
                $res->bindValue("check_out_english", $check_out_english);
                $res->bindValue("check_in_review", $check_in_review);
                $res->bindValue("check_out_review", $check_out_review);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_team_schedule", $id_team_schedule);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteTeamSchedule($id_team_schedule){
            try {
                $res = $this->connec->prepare($this->queryDeleteTeamSchedule);
                $res->bindValue("id_team_schedule", $id_team_schedule);
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