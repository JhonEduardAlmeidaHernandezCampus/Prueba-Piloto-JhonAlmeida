<?php
namespace App;
    class position extends connect{
        use getInstance;
        private $message;
        private $queryPostPosition = 'INSERT INTO position (name_position, arl) VALUES (:name_position, :arl_name)';
        private $queryGetPosition = 'SELECT * FROM position';
        private $queryUpdatePosition = 'UPDATE position SET name_position = :name_position, arl = :arl WHERE id = :id_position';
        private $queryDeletePosition = 'DELETE FROM position WHERE id = :id_position';

        public function __construct(){parent::__construct();}

        public function postPosition($name_position, $arl_name){
            try {
                $res = $this->connec->prepare($this->queryPostPosition);
                $res->bindValue("name_position", $name_position);
                $res->bindValue("arl_name", $arl_name);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }
        
        public function getPosition(){
            try {
                $res = $this->connec->prepare($this->queryGetPosition);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();
                
            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function UpdatePosition($name_position, $arl, $id_position){
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

        public function DeletePosition($id_position){
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