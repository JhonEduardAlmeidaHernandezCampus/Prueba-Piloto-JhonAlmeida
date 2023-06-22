<?php
    class country extends connect{
        use getInstance;
        private $message;
        private $queryPostCountry = 'INSERT INTO countries (name_country) VALUES (:name)';
        private $queryGetCountry = 'SELECT id AS Id_Pais, name_country AS Nombre_Pais FROM countries';
        private $queryUpdateCountry = 'UPDATE countries SET name_country = :value WHERE id = :id_country';
        private $queryDeleteCountry = 'DELETE FROM countries where id = :id_country';

        public function __construct(){parent::__construct();} //Para probar el get, toca quitarle la variable que hay dentro del constructor "public $name_country"

        public function postCountry($name_country){
            try {
                $res = $this->connec->prepare($this->queryPostCountry);
                $res->bindValue("name", $name_country);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Satisfactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function getCountry(){
            try {
                $res = $this->connec->prepare($this->queryGetCountry);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PD0Exception $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function UpdateCountry($value, $id_country){
            try {
                $res = $this->connec->prepare($this->queryUpdateCountry);
                $res->bindValue("value", $value);
                $res->bindValue("id_country", $id_country);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Safistactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function DeleteCountry($id_country){
            try {
                $res = $this->connec->prepare($this->queryDeleteCountry);
                $res->bindValue("id_country", $id_country);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Eliminado Satisfactoriamente"];
                
            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }

        }
    }
?>