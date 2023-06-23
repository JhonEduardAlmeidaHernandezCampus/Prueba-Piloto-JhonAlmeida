<?php
namespace App;
    class tutors extends connect{
        use getInstance;
        private $message;
        private $queryPostTutors = 'INSERT INTO tutors (id_staff, id_academic_area, id_position) VALUES (:id_staff, :id_academic_area, :id_position)';
        private $queryGetTutors = 'SELECT * FROM tutors';
        private $queryUpdateTutors = 'UPDATE tutors SET id_staff = :id_staff, id_academic_area = :id_academic_area, id_position = :id_position WHERE id = :id_tutors';
        private $queryDeleteTutors = 'DELETE FROM tutors WHERE id = :id_tutors';

        public function __construct(){parent::__construct();}

        public function postTutors($id_staff, $id_academic_area, $id_position){
            try {
                $res = $this->connec->prepare($this->queryPostTutors);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_academic_area", $id_academic_area);
                $res->bindValue("id_position", $id_position);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
            print_r($this->message);
            }
        }

        public function getTutors(){
            try {
                $res = $this->connec->prepare($this->queryGetTutors);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function updateTutors($id_staff, $id_academic_area, $id_position, $id_tutors){
            try {
                $res = $this->connec->prepare($this->queryUpdateTutors);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_academic_area", $id_academic_area);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_tutors", $id_tutors);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                print_r($this->message);
            }
        }

        public function deleteTutors($id_tutors){
            try {
                $res = $this->connec->prepare($this->queryDeleteTutors);
                $res->bindValue("id_tutors", $id_tutors);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Eliminado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                print_r($this->message);
            }
        }
    }
?>