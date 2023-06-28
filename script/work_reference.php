<?php
namespace App;
    class work_reference extends connect{
        use getInstance;
        private $message;
        private $queryPostWorkReference = 'INSERT INTO work_reference (full_name, cel_number, position, company) VALUES (:full_name, :cel_number, :position, :company)';
        private $queryGetAllWorkReference = 'SELECT * FROM work_reference';
        private $queryGetWorkReference = 'SELECT * FROM work_reference WHERE id = :id_work_reference';
        private $queryUpdateWorkReference = 'UPDATE work_reference SET full_name = :full_name, cel_number = :cel_number, position = :position, company = :company WHERE id = :id_work_reference';
        private $queryDeleteWorkReference = 'DELETE FROM work_reference WHERE id = :id_work_reference';

        public function __construct(){parent::__construct();}

        public function postWorkReference($full_name, $cel_number, $position, $company){
            try {
                $res = $this->connec->prepare($this->queryPostWorkReference);
                $res->bindValue('full_name', $full_name);
                $res->bindValue('cel_number', $cel_number);
                $res->bindValue('position', $position);
                $res->bindValue('company', $company);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllWorkReference(){
            try {
                $res = $this->connec->prepare($this->queryGetAllWorkReference);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getWorkReference($id_work_reference){
            try {
                $res = $this->connec->prepare($this->queryGetWorkReference);
                $res->bindValue('id_work_reference', $id_work_reference);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateWorkReference($data, $id_work_reference){
            $full_name = $data["full_name"];
            $cel_number = $data["cel_number"];
            $position = $data["position"];
            $company = $data["company"];
            try {
                $res = $this->connec->prepare($this->queryUpdateWorkReference);
                $res->bindValue('full_name', $full_name);
                $res->bindValue('cel_number', $cel_number);
                $res->bindValue('position', $position);
                $res->bindValue('company', $company);
                $res->bindValue('id_work_reference', $id_work_reference);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Satisfactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteWorkReference($id_work_reference){
            try {
                $res = $this->connec->prepare($this->queryDeleteWorkReference);
                $res->bindValue('id_work_reference', $id_work_reference);
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