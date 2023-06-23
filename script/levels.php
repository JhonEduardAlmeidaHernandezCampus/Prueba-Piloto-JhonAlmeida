<?php
namespace App;
    class levels extends connect{
        use getInstance;
        private $message;
        private $queryPostLevels = 'INSERT INTO levels (name_level, group_level) VALUES (:name_levels, :group_levels)';
        private $queryGetLevels = 'SELECT * FROM levels';
        private $queryUpdateLevels =  'UPDATE levels SET name_level = :name_levels, group_level = :group_levels WHERE id = :id_levels';
        private $queryDeleteLevels = 'DELETE FROM levels WHERE id = :id_levels';

        public function __construct(){parent::__construct();}

        public function postLevels($name_levels, $group_levels){
            try {
                $res = $this->connec->prepare($this->queryPostLevels);
                $res->bindValue("name_levels", $name_levels);
                $res->bindValue("group_levels", $group_levels);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function getLevels(){
            try {
                $res = $this->connec->prepare($this->queryGetLevels);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function UpdateLevels($name_levels, $group_levels, $id_levels){
            try {
                $res = $this->connec->prepare($this->queryUpdateLevels);
                $res->bindValue("name_levels", $name_levels);
                $res->bindValue("group_levels", $group_levels);
                $res->bindValue("id_levels", $id_levels);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Existosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function DeleteLevels($id_levels){
            try {
                $res = $this->connec->prepare($this->queryDeleteLevels);
                $res->bindValue("id_levels", $id_levels);
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