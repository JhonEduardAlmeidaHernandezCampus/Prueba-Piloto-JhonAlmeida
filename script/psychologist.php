<?php
namespace App;
    class psychologist extends connect{
        use getInstance;
        private $message;
        private $queryPostPsychologist = 'INSERT INTO psychologist (id_staff, id_route, id_academic_area_psycologist, id_position, id_team_educator) VALUES (:id_staff, :id_route, :id_academic_area_psycologist, :id_position, :id_team_educator)';
        private $queryGetPsychologist = 'SELECT * FROM psychologist';
        private $queryUpdatePsychologist = 'UPDATE psychologist SET id_staff = :id_staff, id_route = :id_route, id_academic_area_psycologist = :id_academic_area_psycologist, id_position = :id_position, id_team_educator = :id_team_educator WHERE id = :id_psychologist';
        private $queryDeletePsychologist = 'DELETE FROM psychologist WHERE id = :id_psychologist';

        public function __construct(){parent::__construct();}

        public function postPsychologist($id_staff, $id_route, $id_academic_area_psycologist, $id_position, $id_team_educator){
            try {
                $res = $this->connec->prepare($this->queryPostPsychologist);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_route", $id_route);
                $res->bindValue("id_academic_area_psycologist", $id_academic_area_psycologist);
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

        public function getPsychologist(){
            try {
                $res = $this->connec->prepare($this->queryGetPsychologist);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updatePsychologist($id_staff, $id_route, $id_academic_area_psycologist, $id_position, $id_team_educator, $id_psychologist){
            try {
                $res = $this->connec->prepare($this->queryUpdatePsychologist);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_route", $id_route);
                $res->bindValue("id_academic_area_psycologist", $id_academic_area_psycologist);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_team_educator", $id_team_educator);
                $res->bindValue("id_psychologist", $id_psychologist);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deletePsychologist($id_psychologist){
            try {
                $res = $this->connec->prepare($this->queryDeletePsychologist);
                $res->bindValue("id_psychologist", $id_psychologist);
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