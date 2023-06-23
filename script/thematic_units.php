<?php
namespace App;
    class thematic_units extends connect{
        use getInstance;
        private $message;
        private $queryPostThematicUnits = 'INSERT INTO thematic_units (id_route, name_thematics_units, start_date, end_date, description, duration_days) VALUES (:id_route, :name_thematics_units, :start_date, :end_date, :description, :duration_days)';
        private $queryGetThematicUnits = 'SELECT * FROM thematic_units';
        private $queryUpdateThematicUnits = 'UPDATE thematic_units SET id_route = :id_route, name_thematics_units = :name_thematics_units, start_date = :start_date, end_date = :end_date, description = :description, duration_days = :duration_days WHERE id = :id_thematic_units';
        private $queryDeleteThematicUnits = 'DELETE FROM thematic_units WHERE id = :id_thematic_units';

        public function __construct(){parent::__construct();}

        public function postThematicUnits($id_route, $name_thematics_units, $start_date, $end_date, $description, $duration_days){
            try {
                $res = $this->connec->prepare($this->queryPostThematicUnits);
                $res->bindValue("id_route", $id_route);
                $res->bindValue("name_thematics_units", $name_thematics_units);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_days", $duration_days);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
            print_r($this->message);
            }
        }

        public function getThematicUnits(){
            try {
                $res = $this->connec->prepare($this->queryGetThematicUnits);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function updateThematicUnits($id_route, $name_thematics_units, $start_date, $end_date, $description, $duration_days, $id_thematic_units){
            try {
                $res = $this->connec->prepare($this->queryUpdateThematicUnits);
                $res->bindValue("id_route", $id_route);
                $res->bindValue("name_thematics_units", $name_thematics_units);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_days", $duration_days);
                $res->bindValue("id_thematic_units", $id_thematic_units);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();
                
            } finally{
                print_r($this->message);
            }
        }

        public function deleteThematicUnits($id_thematic_units){
            try {
                $res = $this->connec->prepare($this->queryDeleteThematicUnits);
                $res->bindValue("id_thematic_units", $id_thematic_units);
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