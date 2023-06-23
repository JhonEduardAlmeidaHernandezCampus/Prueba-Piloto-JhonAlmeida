<?php
    class maint_area extends connect{
        use getInstance;
        private $message;
        private $queryPostMaintArea = 'INSERT INTO maint_area (id_area, id_staff, id_position, id_journey) VALUES (:id_area, :id_staff, :id_position, :id_journey)';
        private $queryGetMaintArea = 'SELECT * FROM maint_area';
        private $queryUpdateMaintArea = 'UPDATE maint_area SET id_area = :id_area, id_staff = :id_staff, id_position = :id_position, id_journey = :id_journey WHERE id = :id_maint_area';
        private $queryDeleteMaintArea = 'DELETE FROM maint_area WHERE id = :id_maint_area';

        public function __construct(){parent::__construct();}

        public function postMaintArea($id_area, $id_staff, $id_position, $id_journey){
            try {
                $res = $this->connec->prepare($this->queryPostMaintArea);
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

        public function getMaintArea(){
            try {
                $res = $this->connec->prepare($this->queryGetMaintArea);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function updateMaintArea($id_area, $id_staff, $id_position, $id_journey, $id_maint_area){
            try {
                $res = $this->connec->prepare($this->queryUpdateMaintArea);
                $res->bindValue("id_area", $id_area);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_maint_area", $id_maint_area);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                print_r($this->message);
            }
        }

        public function deleteMaintArea($id_maint_area){
            try {
                $res = $this->connec->prepare($this->queryDeleteMaintArea);
                $res->bindValue("id_maint_area", $id_maint_area);
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