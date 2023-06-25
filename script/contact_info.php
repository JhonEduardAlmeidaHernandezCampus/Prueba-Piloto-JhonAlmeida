<?php
namespace App;
    class contact_info extends connect{
        use getInstance;
        private $message;
        private $queryPostContactInfo = 'INSERT INTO contact_info (id_staff, whatsapp, instagram, linkedin, email, address, cel_number) VALUES (:id_staff, :whatsapp, :instagram, :linkedin, :email, :address, :cel_number)';
        private $queryGetContactInfo = 'SELECT * FROM contact_info';
        private $queryUpdateContactInfo = 'UPDATE contact_info SET id_staff = :id_staff, whatsapp = :whatsapp, instagram = :instagram, linkedin = :linkedin, email = :email, address = :address, cel_number = :cel_number WHERE id = :id_contact_info';
        private $queryDeleteContactInfo = 'DELETE FROM contact_info WHERE id = :id_contact_info';

        public function __construct(){parent::__construct();}

        public function postContactInfo($id_staff, $whatsapp, $instagram, $linkedin, $email, $address, $cel_number){
            try {
                $res = $this->connec->prepare($this->queryPostContactInfo);
                $res->bindValue('id_staff', $id_staff);
                $res->bindValue('whatsapp', $whatsapp);
                $res->bindValue('instagram', $instagram);
                $res->bindValue('linkedin', $linkedin);
                $res->bindValue('email', $email);
                $res->bindValue('address', $address);
                $res->bindValue('cel_number', $cel_number);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getContactInfo(){
            try {
                $res = $this->connec->prepare($this->queryGetContactInfo);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function UpdateContactInfo($id_staff, $whatsapp, $instagram, $linkedin, $email, $address, $cel_number, $id_contact_info){
            try {
                $res = $this->connec->prepare($this->queryUpdateContactInfo);
                $res->bindValue('id_staff', $id_staff);
                $res->bindValue('whatsapp', $whatsapp);
                $res->bindValue('instagram', $instagram);
                $res->bindValue('linkedin', $linkedin);
                $res->bindValue('email', $email);
                $res->bindValue('address', $address);
                $res->bindValue('cel_number', $cel_number);
                $res->bindValue('id_contact_info', $id_contact_info);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Satisfactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function DeleteContactInfo($id_contact_info){
            try {
                $res = $this->connec->prepare($this->queryDeleteContactInfo);
                $res->bindValue('id_contact_info', $id_contact_info);
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