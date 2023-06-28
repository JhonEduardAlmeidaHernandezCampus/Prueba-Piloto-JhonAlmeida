<?php
namespace App;
    class country extends connect{
        use getInstance;
        private $message;
        private $queryPostCountry = 'INSERT INTO countries (name_country) VALUES (:name)';
        private $queryGetAllCountry = 'SELECT id AS Code, name_country AS Name FROM countries';
        private $queryGetCountry = 'SELECT id AS Code, name_country AS Name FROM countries WHERE id = :id_country';
        private $queryUpdateCountry = 'UPDATE countries SET name_country = :name_country WHERE id = :id_country';
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
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllCountry(){
            try {
                $res = $this->connec->prepare($this->queryGetAllCountry);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PD0Exception $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getCountry($id_country){
            try {
                $res = $this->connec->prepare($this->queryGetCountry);
                $res->bindValue("id_country", $id_country);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PD0Exception $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateCountry($name_country, $id_country){
            $name_country = $name_country["name_country"];
            try {
                $res = $this->connec->prepare($this->queryUpdateCountry);
                $res->bindValue("name_country", $name_country);
                $res->bindValue("id_country", $id_country);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Safistactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteCountry($id_country){
            try {
                $res = $this->connec->prepare($this->queryDeleteCountry);
                $res->bindValue("id_country", $id_country);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Eliminado Satisfactoriamente"];
                
            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }

        }
    }
?>