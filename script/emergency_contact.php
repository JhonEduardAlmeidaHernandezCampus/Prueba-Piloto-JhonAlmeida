<?php
namespace App;
    class emergency_contact extends connect{
        use getInstance;
        private $message;
        private $queryPostEmergencyContact = 'INSERT INTO emergency_contact (id_staff, cel_number, relationship, full_name, email) VALUES (:id_staff, :cel_number, :relationship, :full_name, :email)';
        private $queryGetEmergencyContact = 'SELECT emergency_contact.*, doc, first_name, first_surname FROM emergency_contact INNER JOIN staff ON emergency_contact.id_staff = staff.id';
        private $queryUpdateEmergencyContact = 'UPDATE emergency_contact SET id_staff = :id_staff, cel_number = :cel_number, relationship = :relationship, full_name = :full_name, email = :email  WHERE id = :id_emergency_contact';
        private $queryDeleteEmergencyContact = 'DELETE FROM emergency_contact WHERE id = :id_emergency_contact';

        public function __construct(){parent::__construct();}

        public function postEmergencyContact($id_staff, $cel_number, $relationship, $full_name, $email){
            try {
                $res = $this->connec->prepare($this->queryPostEmergencyContact);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("cel_number", $cel_number);
                $res->bindValue("relationship", $relationship);
                $res->bindValue("full_name", $full_name);
                $res->bindValue("email", $email);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getEmergencyContact(){
            try {
                $res = $this->connec->prepare($this->queryGetEmergencyContact);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateEmergencyContact($id_staff, $cel_number, $relationship, $full_name, $email, $id_emergency_contact){
            try {
                $res = $this->connec->prepare($this->queryUpdateEmergencyContact);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("cel_number", $cel_number);
                $res->bindValue("relationship", $relationship);
                $res->bindValue("full_name", $full_name);
                $res->bindValue("email", $email);
                $res->bindValue("id_emergency_contact", $id_emergency_contact);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();
                
            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteEmergencyContact($id_emergency_contact){
            try {
                $res = $this->connec->prepare($this->queryDeleteEmergencyContact);
                $res->bindValue("id_emergency_contact", $id_emergency_contact);
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