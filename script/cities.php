<?php
namespace App;
    class cities extends connect{
        use getInstance;
        private $message;
        private $queryPostCities = 'INSERT INTO cities (name_city, id_region) VALUES (:name_city, :id_region)';
        private $queryGetCities = 'SELECT countries.id AS Id_Pais, countries.name_country AS Nombre_Pais, regions.id AS Id_Region, regions.name_region AS Nombre_Region, cities.id AS Id_Ciudad, cities.name_city AS Nombre_Ciudad FROM cities INNER JOIN regions ON cities.id_region = regions.id INNER JOIN countries ON regions.id_country = countries.id';
        private $queryUpdateCities = 'UPDATE cities SET name_city = :name_city, id_region = :id_region WHERE id = :id_city';
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
                print_r($this->message);
            }
        }

        public function getCities(){
            try {
                $res = $this->connec->prepare($this->queryGetCities);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function UpdateCities($name_city, $id_region, $id_city){
            try {
                $res = $this->connec->prepare($this->queryUpdateCities);
                $res->bindValue("name_city", $name_city);
                $res->bindValue("id_region", $id_region);
                $res->bindValue("id_city", $id_city);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function DeleteCities($id_cities){
            try {
                $res = $this->connec->prepare($this->queryDeleteCities);
                $res->bindValue("id_cities", $id_cities);
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