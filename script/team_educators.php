<?php
namespace App;
    class team_educators extends connect{
        use getInstance;
        private $message;
        private $queryPostTeamEducators = 'INSERT INTO team_educators (name_rol) VALUES (:name_rol)';
        private $queryGetTeamEducators = 'SELECT * FROM team_educators';
        private $queryUpdateTeamEducators =  'UPDATE team_educators SET name_rol = :name_rol WHERE id = :id_team_education';
        private $queryDeleteTeamEducators = 'DELETE FROM team_educators WHERE id = :id_team_education';

        public function __construct(){parent::__construct();}

        public function postTeamEducators($name_rol){
            try {
                $res = $this->connec->prepare($this->queryPostTeamEducators);
                $res->bindValue("name_rol", $name_rol);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function getTeamEducators(){
            try {
                $res = $this->connec->prepare($this->queryGetTeamEducators);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function UpdateTeamEducators($name_rol, $id_team_education){
            try {
                $res = $this->connec->prepare($this->queryUpdateTeamEducators);
                $res->bindValue("name_rol", $name_rol);
                $res->bindValue("id_team_education", $id_team_education);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Existosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function DeleteTeamEducators($id_team_education){
            try {
                $res = $this->connec->prepare($this->queryDeleteTeamEducators);
                $res->bindValue("id_team_education", $id_team_education);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Eliminado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }
    }
?>