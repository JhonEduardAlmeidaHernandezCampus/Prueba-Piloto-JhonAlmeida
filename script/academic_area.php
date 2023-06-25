<?php
namespace App;
    class academic_area extends connect{
        use getInstance;
        private $message;
        private $queryPostAcademicArea = 'INSERT INTO academic_area (id_area, id_staff, id_position, id_journeys) VALUES (:id_area, :id_staff, :id_position, :id_journeys)';
        private $queryGetAcademicArea = 'SELECT * FROM academic_area';
        private $queryUpdateAcademicArea = 'UPDATE academic_area SET id_area = :id_area, id_staff = :id_staff, id_position = :id_position, id_journeys = :id_journeys WHERE id = :id_academic_area';
        private $queryDeleteAcademicArea = 'DELETE FROM academic_area WHERE id = :id_academic_area';

        public function __construct(){parent::__construct();}

        public function postAcademicArea($id_area, $id_staff, $id_position, $id_journeys){
            try {
                $res = $this->connec->prepare($this->queryPostAcademicArea);
                $res->bindValue("id_area", $id_area);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_journeys", $id_journeys);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAcademicArea(){
            try {
                $res = $this->connec->prepare($this->queryGetAcademicArea);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateAcademicArea($id_area, $id_staff, $id_position, $id_journeys, $id_academic_area){
            try {
                $res = $this->connec->prepare($this->queryUpdateAcademicArea);
                $res->bindValue("id_area", $id_area);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_journeys", $id_journeys);
                $res->bindValue("id_academic_area", $id_academic_area);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteAcademicArea($id_academic_area){
            try {
                $res = $this->connec->prepare($this->queryDeleteAcademicArea);
                $res->bindValue("id_academic_area", $id_academic_area);
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