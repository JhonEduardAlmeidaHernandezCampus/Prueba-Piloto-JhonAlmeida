<?php
namespace App;
    class trainers extends connect{
        use getInstance;
        private $message;
        private $queryPostTrainers = 'INSERT INTO trainers (id_staff, id_level, id_route, id_academic_area, id_position, id_team_educator) VALUES (:id_staff, :id_level, :id_route, :id_academic_area, :id_position, :id_team_educator)';
        private $queryGetTrainers = 'SELECT * FROM trainers';
        private $queryUpdateTrainers = 'UPDATE trainers SET id_staff = :id_staff, id_level = :id_level, id_route = :id_route, id_academic_area = :id_academic_area, id_position = :id_position, id_team_educator = :id_team_educator WHERE id = :id_trainers';
        private $queryDeleteTrainers = 'DELETE FROM trainers WHERE id = :id_trainers';

        public function __construct(){parent::__construct();}

        public function postTrainers($id_staff, $id_level, $id_route, $id_academic_area, $id_position, $id_team_educator){
            try {
                $res = $this->connec->prepare($this->queryPostTrainers);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_level", $id_level);
                $res->bindValue("id_route", $id_route);
                $res->bindValue("id_academic_area", $id_academic_area);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_team_educator", $id_team_educator);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getTrainers(){
            try {
                $res = $this->connec->prepare($this->queryGetTrainers);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateTrainers($id_staff, $id_level, $id_route, $id_academic_area, $id_position, $id_team_educator, $id_trainers){
            try {
                $res = $this->connec->prepare($this->queryUpdateTrainers);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_level", $id_level);
                $res->bindValue("id_route", $id_route);
                $res->bindValue("id_academic_area", $id_academic_area);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_team_educator", $id_team_educator);
                $res->bindValue("id_trainers", $id_trainers);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteTrainers($id_trainers){
            try {
                $res = $this->connec->prepare($this->queryDeleteTrainers);
                $res->bindValue("id_trainers", $id_trainers);
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