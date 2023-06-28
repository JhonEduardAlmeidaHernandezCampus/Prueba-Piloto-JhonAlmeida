<?php
namespace App;
    class position extends connect{
        use getInstance;
        private $message;
        private $queryPostPosition = 'INSERT INTO position (name_position, arl) VALUES (:name_position, :arl)';
        private $queryGetAllPosition = 'SELECT * FROM position';
        private $queryGetPosition = 'SELECT * FROM position WHERE id = :id_position';
        private $queryUpdatePosition = 'UPDATE position SET name_position = :name_position, arl = :arl WHERE id = :id_position';
        private $queryDeletePosition = 'DELETE FROM position WHERE id = :id_position';

        public function __construct(){parent::__construct();}

        public function postPosition($name_position, $arl){
            try {
                $res = $this->connec->prepare($this->queryPostPosition);
                $res->bindValue("name_position", $name_position);
                $res->bindValue("arl", $arl);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllPosition(){
            try {
                $res = $this->connec->prepare($this->queryGetAllPosition);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();
                
            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }
        
        public function getPosition($id_position){
            try {
                $res = $this->connec->prepare($this->queryGetPosition);
                $res->bindValue("id_position", $id_position);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();
                
            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updatePosition($data, $id_position){
            $name_position = $data["name_position"];
            $arl = $data["arl"];
            try {
                $res = $this->connec->prepare($this->queryUpdatePosition);
                $res->bindValue("name_position", $name_position);
                $res->bindValue("arl", $arl);
                $res->bindValue("id_position", $id_position);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Satisfactoriamete"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deletePosition($id_position){
            try {
                $res = $this->connec->prepare($this->queryDeletePosition);
                $res->bindValue("id_position", $id_position);
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