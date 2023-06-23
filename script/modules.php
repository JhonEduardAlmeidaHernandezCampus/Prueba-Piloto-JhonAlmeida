<?php
    class modules extends connect{
        use getInstance;
        private $message;
        private $queryPostModules = 'INSERT INTO modules (name_module, start_date, end_date, description, duration_days, id_theme) VALUES (:name_module, :start_date, :end_date, :description, :duration_days, :id_theme)';
        private $queryGetModules = 'SELECT * FROM modules';
        private $queryUpdateModules = 'UPDATE modules SET name_module = :name_module, start_date = :start_date, end_date = :end_date, description = :description, duration_days = :duration_days, id_theme = :id_theme WHERE id = :id_modules';
        private $queryDeleteModules = 'DELETE FROM modules WHERE id = :id_modules';

        public function __construct(){parent::__construct();}

        public function postModules($name_module, $start_date, $end_date, $description, $duration_days, $id_theme){
            try {
                $res = $this->connec->prepare($this->queryPostModules);
                $res->bindValue("name_module", $name_module);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_days", $duration_days);
                $res->bindValue("id_theme", $id_theme);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
            print_r($this->message);
            }
        }

        public function getModules(){
            try {
                $res = $this->connec->prepare($this->queryGetModules);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function updateModules($name_module, $start_date, $end_date, $description, $duration_days, $id_theme, $id_modules){
            try {
                $res = $this->connec->prepare($this->queryUpdateModules);
                $res->bindValue("name_module", $name_module);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_days", $duration_days);
                $res->bindValue("id_theme", $id_theme);
                $res->bindValue("id_modules", $id_modules);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                print_r($this->message);
            }
        }

        public function deleteModules($id_modules){
            try {
                $res = $this->connec->prepare($this->queryDeleteModules);
                $res->bindValue("id_modules", $id_modules);
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