<?php
namespace App;
    class admin_area extends connect{
        use getInstance;
        private $message;
        private $queryPostAdminArea = 'INSERT INTO admin_area (id_area, id_staff, id_position, id_journey) VALUES (:id_area, :id_staff, :id_position, :id_journey)';
        private $queryGetAllAdminArea = 'SELECT admin_area.id as CodeAdmin, staff.*, areas.*, position.*, journey.* FROM admin_area INNER JOIN areas ON admin_area.id_area = areas.id INNER JOIN staff ON admin_area.id_staff = staff.id INNER JOIN position ON admin_area.id_position = position.id INNER JOIN journey ON admin_area.id_journey = journey.id';
        private $queryGetAdminArea = 'SELECT admin_area.id AS code_admin, areas.id AS code_area, areas.name_area AS name_area, staff.id AS code_staff, staff.doc AS Cc_staff, position.id AS id_position, position.name_position AS name_position, journey.id AS id_journey, journey.name_journey AS name_journey FROM admin_area INNER JOIN areas ON admin_area.id_area = areas.id INNER JOIN staff ON admin_area.id_staff = staff.id INNER JOIN position ON admin_area.id_position = position.id INNER JOIN journey ON admin_area.id_journey = journey.id WHERE admin_area.id = :id_admin_area';
        private $queryUpdateAdminArea = 'UPDATE admin_area SET id_area = :id_area, id_staff = :id_staff, id_position = :id_position, id_journey = :id_journey WHERE id = :id_admin_area';
        private $queryDeleteAdminArea = 'DELETE FROM admin_area WHERE id = :id_admin_area';

        public function __construct(){parent::__construct();}

        public function postAdminArea($id_area, $id_staff, $id_position, $id_journey){
            try {
                $res = $this->connec->prepare($this->queryPostAdminArea);
                $res->bindValue("id_area", $id_area);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_journey", $id_journey);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllAdminArea(){
            try {
                $res = $this->connec->prepare($this->queryGetAllAdminArea);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAdminArea($id_admin_area){
            try {
                $res = $this->connec->prepare($this->queryGetAdminArea);
                $res->bindValue("id_admin_area", $id_admin_area);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateAdminArea($data, $id_admin_area){
            $id_area = $data["id_area"];
            $id_staff = $data["id_staff"];
            $id_position = $data["id_position"];
            $id_journey = $data["id_journey"];
            try {
                $res = $this->connec->prepare($this->queryUpdateAdminArea);
                $res->bindValue("id_area", $id_area);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_admin_area", $id_admin_area);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteAdminArea($id_admin_area){
            try {
                $res = $this->connec->prepare($this->queryDeleteAdminArea);
                $res->bindValue("id_admin_area", $id_admin_area);
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