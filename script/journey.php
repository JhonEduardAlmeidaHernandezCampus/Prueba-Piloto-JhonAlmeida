<?php
namespace App;
    class journey extends connect{
        use getInstance;
        private $message;
        private $queryPostJourney = 'INSERT INTO journey (name_journey, check_in, check_out) VALUES (:name_journey, :check_in, :check_out)';
        private $queryGetAllJourney = 'SELECT * FROM journey';
        private $queryGetJourney = 'SELECT * FROM journey WHERE id = :id_journey';
        private $queryUpdateJourney = 'UPDATE journey SET name_journey = :name_journey, check_in = :check_in, check_out = :check_out WHERE id = :id_journey';
        private $queryDeleteJourney = 'DELETE FROM journey WHERE id = :id_journey';

        public function __construct(){parent::__construct();}

        public function postJourney($name_journey, $check_in, $check_out){
            try {
                $res = $this->connec->prepare($this->queryPostJourney);
                $res->bindValue("name_journey", $name_journey);
                $res->bindValue("check_in", $check_in);
                $res->bindValue("check_out", $check_out);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }
        
        public function getAllJourney(){
            try {
                $res = $this->connec->prepare($this->queryGetAllJourney);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getJourney($id_journey){
            try {
                $res = $this->connec->prepare($this->queryGetJourney);
                $res->bindValue("id_journey", $id_journey);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateJourney($data, $id_journey){
            $name_journey = $data["name_journey"];
            $check_in = $data["check_in"];
            $check_out = $data["check_out"];
            try {
                $res = $this->connec->prepare($this->queryUpdateJourney);
                $res->bindValue("name_journey", $name_journey);
                $res->bindValue("check_in", $check_in);
                $res->bindValue("check_out", $check_out);
                $res->bindValue("id_journey", $id_journey);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteJourney($id_journey){
            try {
                $res = $this->connec->prepare($this->queryDeleteJourney);
                $res->bindValue("id_journey", $id_journey);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Eliminado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }
    }
?>