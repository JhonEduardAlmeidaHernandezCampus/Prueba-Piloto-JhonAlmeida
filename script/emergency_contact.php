<?php
namespace App;
    class emergency_contact extends connect{
        use getInstance;
        private $message;
        private $queryPostEmergencyContact = 'INSERT INTO emergency_contact (id_staff, cel_number, relationship, full_name, email) VALUES (:id_staff, :cel_number, :relationship, :full_name, :email)';
        private $queryGetAllEmergencyContact = 'SELECT emergency_contact.id AS Code, staff.doc, staff.first_name, staff.first_surname, emergency_contact.cel_number, emergency_contact.relationship, emergency_contact.full_name, emergency_contact.email FROM emergency_contact INNER JOIN staff ON emergency_contact.id_staff = staff.id';
        private $queryGetEmergencyContact = 'SELECT emergency_contact.id AS Code, staff.id, staff.doc, staff.first_name, staff.first_surname, emergency_contact.cel_number, emergency_contact.relationship, emergency_contact.full_name, emergency_contact.email FROM emergency_contact INNER JOIN staff ON emergency_contact.id_staff = staff.id WHERE emergency_contact.id = :id_emergency_contact';
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

        public function getAllEmergencyContact(){
            try {
                $res = $this->connec->prepare($this->queryGetAllEmergencyContact);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getEmergencyContact($id_emergency_contact){
            try {
                $res = $this->connec->prepare($this->queryGetEmergencyContact);
                $res->bindValue("id_emergency_contact", $id_emergency_contact);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateEmergencyContact($data, $id_emergency_contact){
            $id_staff = $data["id_staff"];
            $cel_number = $data["cel_number"];
            $relationship = $data["relationship"];
            $full_name = $data["full_name"];
            $email = $data["email"];
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