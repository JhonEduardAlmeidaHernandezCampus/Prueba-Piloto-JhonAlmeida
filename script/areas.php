<?php
namespace App;
    class areas extends connect{
        use getInstance;
        private $message;
        private $queryPostAreas = 'INSERT INTO areas (name_area) VALUES (:name_area)';
        private $queryGetAreas = 'SELECT id AS Id_Area, name_area AS Nombre_Area FROM areas';
        private $queryUpdateAreas = 'UPDATE areas SET name_area = :name_area WHERE id = :id_areas';
        private $queryDeleteAreas = 'DELETE FROM areas WHERE id = :id_areas';

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
                echo json_encode($this->message, JSON_PRETTY_PRINT);
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
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function UpdateAreas($name_area, $id_areas){
            try {
                $res = $this->connec->prepare($this->queryUpdateAreas);
                $res->bindValue("name_area", $name_area);
                $res->bindValue("id_areas", $id_areas);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Safistactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function DeleteAreas($id_areas){
            try {
                $res = $this->connec->prepare($this->queryDeleteAreas);
                $res->bindValue("id_areas", $id_areas);
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