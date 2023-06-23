<?php
namespace App;
    class personal_reference extends connect{
        use getInstance;
        private $message;
        private $queryPostPersonalReference = 'INSERT INTO personal_ref (full_name, cel_number, relationship, occupation) VALUES (:full_name, :cel_number, :relationship, :occupation)';
        private $queryGetPersonalReference = 'SELECT * FROM personal_ref';
        private $queryUpdatePersonalReference = 'UPDATE personal_ref SET full_name = :full_name, cel_number = :cel_number, relationship = :relationship, occupation = :occupation WHERE id = :id_personal_ref';
        private $queryDeletePersonalReference = 'DELETE FROM personal_ref WHERE id = :id_personal_ref';

        public function __construct(){parent::__construct();}

        public function postPersonalReference($full_name, $cel_number, $relationship, $occupation){
            try {
                $res = $this->connec->prepare($this->queryPostPersonalReference);
                $res->bindValue('full_name', $full_name);
                $res->bindValue('cel_number', $cel_number);
                $res->bindValue('relationship', $relationship);
                $res->bindValue('occupation', $occupation);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function getPersonalReference(){
            try {
                $res = $this->connec->prepare($this->queryGetPersonalReference);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function UpdatePersonalReference($full_name, $cel_number, $relationship, $occupation, $id_personal_ref){
            try {
                $res = $this->connec->prepare($this->queryUpdatePersonalReference);
                $res->bindValue('full_name', $full_name);
                $res->bindValue('cel_number', $cel_number);
                $res->bindValue('relationship', $relationship);
                $res->bindValue('occupation', $occupation);
                $res->bindValue('id_personal_ref', $id_personal_ref);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Satisfactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function DeletePersonalReference($id_personal_ref){
            try {
                $res = $this->connec->prepare($this->queryDeletePersonalReference);
                $res->bindValue('id_personal_ref', $id_personal_ref);
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