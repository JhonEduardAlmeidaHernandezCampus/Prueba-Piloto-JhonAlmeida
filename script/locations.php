<?php
namespace App;

    class locations extends connect{
        use getInstance;
        private $message;
        private $queryPostLocations = 'INSERT INTO locations (name_location) VALUES (:name_location)';
        private $queryGetAllLocations = 'SELECT id AS code, name_location AS name FROM locations';
        private $queryGetLocations = 'SELECT id AS "code", name_location AS "name" FROM locations WHERE id = :id_location';
        private $queryUpdateLocations =  'UPDATE locations SET name_location = :name_location WHERE id = :id_location';
        private $queryDeleteLocations = 'DELETE FROM locations WHERE id = :id_location';

        public function __construct(){parent::__construct();}

        public function postLocations($name_location){
            try {
                $res = $this->connec->prepare($this->queryPostLocations);
                $res->bindValue("name_location", $name_location);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllLocations(){
            try {
                $res = $this->connec->prepare($this->queryGetAllLocations);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getLocations($id_location){
            try {
                $res = $this->connec->prepare($this->queryGetLocations);
                $res->bindValue("id_location", $id_location);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateLocations($name_location, $id_location){
            $name_location = $name_location["name_location"];
            try {
                $res = $this->connec->prepare($this->queryUpdateLocations);
                $res->bindValue("name_location", $name_location);
                $res->bindValue("id_location", $id_location);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Existosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteLocations($id_location){
            try {
                $res = $this->connec->prepare($this->queryDeleteLocations);
                $res->bindValue("id_location", $id_location);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Eliminado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }
    }
?>