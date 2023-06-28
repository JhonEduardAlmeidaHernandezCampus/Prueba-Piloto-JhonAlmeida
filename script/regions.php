<?php
namespace App;
    class regions extends connect{
        use getInstance;
        private $message;
        private $queryPostRegion = 'INSERT INTO regions (name_region, id_country) VALUES (:name_region, :id_country)';
        private $queryGetAllRegion = 'SELECT regions.id AS Code, regions.name_region, countries.name_country FROM regions INNER JOIN countries WHERE countries.id = regions.id_country';
        private $queryGetRegion = 'SELECT regions.id AS Code, regions.name_region, countries.id, countries.name_country FROM regions INNER JOIN countries ON regions.id_country = countries.id WHERE regions.id = :id_region';
        private $queryUpdateRegion = 'UPDATE regions SET name_region = :name_region, id_country = :id_country WHERE id = :id_region';
        private $queryDeleteRegion = 'DELETE FROM regions WHERE id = :id_region';

        public function __construct(){parent::__construct();}

        public function postRegion($name_region, $id_country){
            try {
                $res = $this->connec->prepare($this->queryPostRegion);
                $res->bindValue('name_region', $name_region);
                $res->bindValue('id_country', $id_country);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllRegion(){
            try {
                $res = $this->connec->prepare($this->queryGetAllRegion);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getRegion($id_region){
            try {
                $res = $this->connec->prepare($this->queryGetRegion);
                $res->bindValue('id_region', $id_region);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateRegion($data, $id_region){
            $name_region = $data["name_region"];
            $id_country = $data["id_country"];
            try {
                $res = $this->connec->prepare($this->queryUpdateRegion);
                $res->bindValue('name_region', $name_region);
                $res->bindValue('id_country', $id_country);
                $res->bindValue('id_region', $id_region);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Satisfactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteRegion($id_region){
            try {
                $res = $this->connec->prepare($this->queryDeleteRegion);
                $res->bindValue('id_region', $id_region);
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