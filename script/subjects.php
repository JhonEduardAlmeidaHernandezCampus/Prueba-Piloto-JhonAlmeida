<?php
namespace App;
    class subjects extends connect{
        use getInstance;
        private $message;
        private $queryPostSubjects = 'INSERT INTO subjects (name_subject) VALUES (:name_subject)';
        private $queryGetSubjects = 'SELECT * FROM subjects';
        private $queryUpdateSubjects =  'UPDATE subjects SET name_subject = :name_subject WHERE id = :id_subject';
        private $queryDeleteSubjects = 'DELETE FROM subjects WHERE id = :id_subject';

        public function __construct(){parent::__construct();}

        public function postSubject($name_subject){
            try {
                $res = $this->connec->prepare($this->queryPostSubjects);
                $res->bindValue("name_subject", $name_subject);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getSubjects(){
            try {
                $res = $this->connec->prepare($this->queryGetSubjects);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function UpdateSubjects($name_subject, $id_subject){
            try {
                $res = $this->connec->prepare($this->queryUpdateSubjects);
                $res->bindValue("name_subject", $name_subject);
                $res->bindValue("id_subject", $id_subject);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Existosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function DeleteSubjects($id_subject){
            try {
                $res = $this->connec->prepare($this->queryDeleteSubjects);
                $res->bindValue("id_subject", $id_subject);
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