<?php
namespace App;
    class marketing_area extends connect{
        use getInstance;
        private $message;
        private $queryPostMarketingArea = 'INSERT INTO marketing_area (id_area, id_staff, id_position, id_journey) VALUES (:id_area, :id_staff, :id_position, :id_journey)';
        private $queryGetMarketingArea = 'SELECT * FROM marketing_area';
        private $queryUpdateMarketingArea = 'UPDATE marketing_area SET id_area = :id_area, id_staff = :id_staff, id_position = :id_position, id_journey = :id_journey WHERE id = :id_marketing_area';
        private $queryDeleteMarketingArea = 'DELETE FROM marketing_area WHERE id = :id_marketing_area';

        public function __construct(){parent::__construct();}

        public function postMarketingArea($id_area, $id_staff, $id_position, $id_journey){
            try {
                $res = $this->connec->prepare($this->queryPostMarketingArea);
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

        public function getMarketingArea(){
            try {
                $res = $this->connec->prepare($this->queryGetMarketingArea);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function updateMarketingArea($id_area, $id_staff, $id_position, $id_journey, $id_marketing_area){
            try {
                $res = $this->connec->prepare($this->queryUpdateMarketingArea);
                $res->bindValue("id_area", $id_area);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_journey", $id_journey);
                $res->bindValue("id_marketing_area", $id_marketing_area);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                print_r($this->message);
            }
        }

        public function deleteMarketingArea($id_marketing_area){
            try {
                $res = $this->connec->prepare($this->queryDeleteMarketingArea);
                $res->bindValue("id_marketing_area", $id_marketing_area);
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