<?php
namespace App;
    class cities extends connect{
        use getInstance;
        private $message;
        private $queryPostCities = 'INSERT INTO cities (name_city, id_region) VALUES (:name_city, :id_region)';
        private $queryGetAllCities = 'SELECT cities.id AS Code, countries.name_country, regions.name_region, cities.name_city FROM cities INNER JOIN regions ON cities.id_region = regions.id INNER JOIN countries ON regions.id_country = countries.id';
        private $queryGetCities = 'SELECT cities.id AS Code, cities.name_city, regions.id, regions.name_region FROM cities INNER JOIN regions ON cities.id_region = regions.id WHERE cities.id = :id_cities';
        private $queryUpdateCities = 'UPDATE cities SET name_city = :name_city, id_region = :id_region WHERE id = :id_cities';
        private $queryDeleteCities = 'DELETE FROM cities WHERE id = :id_cities';

        public function __construct(){parent::__construct();}

        public function postCities($name_city, $id_region){
            try {
                $res = $this->connec->prepare($this->queryPostCities);
                $res->bindValue("name_city", $name_city);
                $res->bindValue("id_region", $id_region);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllCities(){
            try {
                $res = $this->connec->prepare($this->queryGetAllCities);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getCities($id_cities){
            try {
                $res = $this->connec->prepare($this->queryGetCities);
                $res->bindValue("id_cities", $id_cities);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateCities($data, $id_cities){
            $name_city = $data["name_city"];
            $id_region = $data["id_region"];
            try {
                $res = $this->connec->prepare($this->queryUpdateCities);
                $res->bindValue("name_city", $name_city);
                $res->bindValue("id_region", $id_region);
                $res->bindValue("id_cities", $id_cities);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteCities($id_cities){
            try {
                $res = $this->connec->prepare($this->queryDeleteCities);
                $res->bindValue("id_cities", $id_cities);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Eliminado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }
    }
?>