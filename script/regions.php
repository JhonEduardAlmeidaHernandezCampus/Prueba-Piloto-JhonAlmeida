<?php
    class regions extends connect{
        use getInstance;
        private $message;
        private $queryPostRegion = 'INSERT INTO regions (name_region, id_country) VALUES (:name, :country)';
        private $queryGetRegion = 'SELECT countries.id AS Id_Pais, countries.name_country AS Nombre_Pais, regions.name_region AS Nombre_Region FROM regions INNER JOIN countries WHERE countries.id = regions.id_country';
        private $queryUpdateRegion = 'UPDATE regions SET name_region = :value_region, id_country = :value_country WHERE id = :id_region';
        private $queryDeleteRegion = 'DELETE FROM regions WHERE id = :id_region';

        public function __construct(){parent::__construct();}

        public function postRegion($name, $country){
            try {
                $res = $this->connec->prepare($this->queryPostRegion);
                $res->bindValue('name', $name);
                $res->bindValue('country', $country);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function getRegion(){
            try {
                $res = $this->connec->prepare($this->queryGetRegion);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function UpdateRegion($value_region, $value_country, $id_region){
            try {
                $res = $this->connec->prepare($this->queryUpdateRegion);
                $res->bindValue('value_region', $value_region);
                $res->bindValue('value_country', $value_country);
                $res->bindValue('id_region', $id_region);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Satisfactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function DeleteRegion($id_region){
            try {
                $res = $this->connec->prepare($this->queryDeleteRegion);
                $res->bindValue('id_region', $id_region);
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