<?php
    class locations extends connect{
        use getInstance;
        private $message;
        private $queryPostLocations = 'INSERT INTO locations (name_location) VALUES (:name_location)';
        private $queryGetLocations = 'SELECT * FROM locations';
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
                print_r($this->message);
            }
        }

        public function getLocations(){
            try {
                $res = $this->connec->prepare($this->queryGetLocations);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function UpdateLocations($name_location, $id_location){
            try {
                $res = $this->connec->prepare($this->queryUpdateLocations);
                $res->bindValue("name_location", $name_location);
                $res->bindValue("id_location", $id_location);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Existosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function DeleteLocations($id_location){
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