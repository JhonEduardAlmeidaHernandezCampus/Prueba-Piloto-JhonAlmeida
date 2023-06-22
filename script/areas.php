<?php
    class areas extends connect{
        use getInstance;
        private $message;
        private $queryPostAreas = 'INSERT INTO areas (name_area) VALUES (:name_area)';
        private $queryGetAreas = 'SELECT id AS Id_Area, name_area AS Nombre_Area FROM areas';

        public function __construct(){parent::__construct();}

        public function postAreas($name_area){
            try {
                $res = $this->connec->prepare($this->queryPostAreas);
                $res->bindValue("name_area", $name_area);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Existosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();
                
            } finally {
                print_r($this->message);
            }
        }

        public function getAreas(){
            try {
                $res = $this->connec->prepare($this->queryGetAreas);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function 

    }
?>