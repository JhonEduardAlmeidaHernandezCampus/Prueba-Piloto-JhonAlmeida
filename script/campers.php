<?php
namespace App;
    class campers extends connect{
        use getInstance;
        private $message;
        private $queryPostCampers = 'INSERT INTO campers (id_team_schedule, id_route, id_trainer, id_psycologist, id_teacher, id_level, id_journey, id_staff) VALUES (:id_team_schedule, :id_route, :id_trainer, :id_psycologist, :id_teacher, :id_level, :id_journey, :id_staff)';
        private $queryGetCampers = 'SELECT * FROM campers';
        private $queryUpdateCampers = 'UPDATE campers SET id_team_schedule = :id_team_schedule, id_route = :id_route, id_trainer = :id_trainer, id_psycologist = :id_psycologist, id_teacher = :id_teacher, id_level = :id_level, id_journey = :id_journey, id_staff = :id_staff WHERE id = :id_campers';
        private $queryDeleteCampers = 'DELETE FROM campers WHERE id = :id_campers';

        public function __construct(){parent::__construct();}

        public function postCampers($id_team_schedule, $id_route, $id_trainer, $id_psycologist, $id_teacher, $id_level, $id_journey, $id_staff){
            try {
                $res = $this->connec->prepare($this->queryPostCampers);
                $res->bindValue("id_team_schedule", $id_team_schedule);
                $res->bindValue("id_route", $id_route);
                $res->bindValue("id_trainer", $id_trainer);
                $res->bindValue("id_psycologist", $id_psycologist);
                $res->bindValue("id_teacher", $id_teacher);
                $res->bindValue("id_level", $id_level);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_staff", $id_staff);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getCampers(){
            try {
                $res = $this->connec->prepare($this->queryGetCampers);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateCampers($id_team_schedule, $id_route, $id_trainer, $id_psycologist, $id_teacher, $id_level, $id_journey, $id_staff, $id_campers){
            try {
                $res = $this->connec->prepare($this->queryUpdateCampers);
                $res->bindValue("id_team_schedule", $id_team_schedule);
                $res->bindValue("id_route", $id_route);
                $res->bindValue("id_trainer", $id_trainer);
                $res->bindValue("id_psycologist", $id_psycologist);
                $res->bindValue("id_teacher", $id_teacher);
                $res->bindValue("id_level", $id_level);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_campers", $id_campers);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteCampers($id_campers){
            try {
                $res = $this->connec->prepare($this->queryDeleteCampers);
                $res->bindValue("id_campers", $id_campers);
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