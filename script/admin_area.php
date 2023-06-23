<?php
namespace App;
    class admin_area extends connect{
        use getInstance;
        private $message;
        private $queryPostAdminArea = 'INSERT INTO admin_area (id_area, id_staff, id_position, id_journey) VALUES (:id_area, :id_staff, :id_position, :id_journey)';
        private $queryGetAdminArea = 'SELECT * FROM admin_area';
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
            print_r($this->message);
            }
        }

        public function getAdminArea(){
            try {
                $res = $this->connec->prepare($this->queryGetAdminArea);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function updateAdminArea($id_area, $id_staff, $id_position, $id_journey, $id_admin_area){
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
                print_r($this->message);
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
                print_r($this->message);
            }
        }
    }
?>