<?php
    class teachers extends connect{
        use getInstance;
        private $message;
        private $queryPostTeachers = 'INSERT INTO teachers (id_staff, id_route, id_academic_area, id_position, id_team_educator) VALUES (:id_staff, :id_route, :id_academic_area, :id_position, :id_team_educator)';
        private $queryGetTeachers = 'SELECT * FROM teachers';
        private $queryUpdateTeachers = 'UPDATE teachers SET id_staff = :id_staff, id_route = :id_route, id_academic_area = :id_academic_area, id_position = :id_position, id_team_educator = :id_team_educator WHERE id = :id_teachers';
        private $queryDeleteTeachers = 'DELETE FROM teachers WHERE id = :id_teachers';

        public function __construct(){parent::__construct();}

        public function postTeachers($id_staff, $id_route, $id_academic_area, $id_position, $id_team_educator){
            try {
                $res = $this->connec->prepare($this->queryPostTeachers);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_route", $id_route);
                $res->bindValue("id_academic_area", $id_academic_area);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_team_educator", $id_team_educator);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
            print_r($this->message);
            }
        }

        public function getTeachers(){
            try {
                $res = $this->connec->prepare($this->queryGetTeachers);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function updateTeachers($id_staff, $id_route, $id_academic_area, $id_position, $id_team_educator, $id_teachers){
            try {
                $res = $this->connec->prepare($this->queryUpdateTeachers);
                $res->bindValue("id_staff", $id_staff);
                $res->bindValue("id_route", $id_route);
                $res->bindValue("id_academic_area", $id_academic_area);
                $res->bindValue("id_position", $id_position);
                $res->bindValue("id_team_educator", $id_team_educator);
                $res->bindValue("id_teachers", $id_teachers);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                print_r($this->message);
            }
        }

        public function deleteTeachers($id_teachers){
            try {
                $res = $this->connec->prepare($this->queryDeleteTeachers);
                $res->bindValue("id_teachers", $id_teachers);
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