<?php
namespace App;
    class chapters extends connect{
        use getInstance;
        private $message;
        private $queryPostChapters = 'INSERT INTO chapters (id_thematic_units, name_chapter, start_date, end_date, description, duration_days) VALUES (:id_thematic_units, :name_chapter, :start_date, :end_date, :description, :duration_days)';
        private $queryGetChapters = 'SELECT * FROM chapters';
        private $queryUpdateChapters = 'UPDATE chapters SET id_thematic_units = :id_thematic_units, name_chapter = :name_chapter, start_date = :start_date, end_date = :end_date, description = :description, duration_days = :duration_days WHERE id = :id_chapters';
        private $queryDeleteChapters = 'DELETE FROM chapters WHERE id = :id_chapters';

        public function __construct(){parent::__construct();}

        public function postChapters($id_thematic_units, $name_chapter, $start_date, $end_date, $description, $duration_days){
            try {
                $res = $this->connec->prepare($this->queryPostChapters);
                $res->bindValue("id_thematic_units", $id_thematic_units);
                $res->bindValue("name_chapter", $name_chapter);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_days", $duration_days);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getChapters(){
            try {
                $res = $this->connec->prepare($this->queryGetChapters);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateChapters($id_thematic_units, $name_chapter, $start_date, $end_date, $description, $duration_days, $id_chapters){
            try {
                $res = $this->connec->prepare($this->queryUpdateChapters);
                $res->bindValue("id_thematic_units", $id_thematic_units);
                $res->bindValue("name_chapter", $name_chapter);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_days", $duration_days);
                $res->bindValue("id_chapters", $id_chapters);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();
                
            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteChapters($id_chapters){
            try {
                $res = $this->connec->prepare($this->queryDeleteChapters);
                $res->bindValue("id_chapters", $id_chapters);
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