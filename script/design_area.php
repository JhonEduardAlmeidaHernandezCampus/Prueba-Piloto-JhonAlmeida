<?php
namespace App;
    class design_area extends connect{
        use getInstance;
        private $message;
        private $queryPostDesignArea = 'INSERT INTO design_area (id_area, id_staff, id_position, id_journey) VALUES (:id_area, :id_staff, :id_position, :id_journey)';
        private $queryGetDesignArea = 'SELECT * FROM design_area';
        private $queryUpdateDesignArea = 'UPDATE design_area SET id_area = :id_area, id_staff = :id_staff, id_position = :id_position, id_journey = :id_journey WHERE id = :id_design_area';
        private $queryDeleteDesignArea = 'DELETE FROM design_area WHERE id = :id_design_area';

        public function __construct(){parent::__construct();}

        public function postDesignArea($id_area, $id_staff, $id_position, $id_journey){
            try {
                $res = $this->connec->prepare($this->queryPostDesignArea);
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

        public function getDesignArea(){
            try {
                $res = $this->connec->prepare($this->queryGetDesignArea);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function updateDesignArea($id_area, $id_staff, $id_position, $id_journey, $id_design_area){
            try {
                $res = $this->connec->prepare($this->queryUpdateDesignArea);
                $res->bindValue("id_area", $id_area);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_design_area", $id_design_area);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                print_r($this->message);
            }
        }

        public function deleteDesignArea($id_design_area){
            try {
                $res = $this->connec->prepare($this->queryDeleteDesignArea);
                $res->bindValue("id_design_area", $id_design_area);
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