<?php
namespace App;
    class levels extends connect{
        use getInstance;
        private $message;
        private $queryPostLevels = 'INSERT INTO levels (name_level, group_level) VALUES (:name_level, :group_level)';
        private $queryGetAllLevels = 'SELECT * FROM levels';
        private $queryGetLevels = 'SELECT * FROM levels WHERE id = :id_levels';
        private $queryUpdateLevels =  'UPDATE levels SET name_level = :name_level, group_level = :group_level WHERE id = :id_levels';
        private $queryDeleteLevels = 'DELETE FROM levels WHERE id = :id_levels';

        public function __construct(){parent::__construct();}

        public function postLevels($name_level, $group_level){
            try {
                $res = $this->connec->prepare($this->queryPostLevels);
                $res->bindValue("name_level", $name_level);
                $res->bindValue("group_level", $group_level);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllLevels(){
            try {
                $res = $this->connec->prepare($this->queryGetAllLevels);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getLevels($id_levels){
            try {
                $res = $this->connec->prepare($this->queryGetLevels);
                $res->bindValue("id_levels", $id_levels);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateLevels($data, $id_levels){
            $name_level = $data["name_level"];
            $group_level = $data["group_level"];
            try {
                $res = $this->connec->prepare($this->queryUpdateLevels);
                $res->bindValue("name_level", $name_level);
                $res->bindValue("group_level", $group_level);
                $res->bindValue("id_levels", $id_levels);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Existosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteLevels($id_levels){
            try {
                $res = $this->connec->prepare($this->queryDeleteLevels);
                $res->bindValue("id_levels", $id_levels);
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