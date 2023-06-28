<?php
namespace App;
    class chapters extends connect{
        use getInstance;
        private $message;
        private $queryPostChapters = 'INSERT INTO chapters (id_thematic_units, name_chapter, start_date, end_date, description, duration_days) VALUES (:id_thematic_units, :name_chapter, :start_date, :end_date, :description, :duration_days)';
        private $queryGetAllChapters = 'SELECT chapters.id AS Code, thematic_units.id, thematic_units.name_thematics_units AS NameThematic, chapters.name_chapter, chapters.start_date, chapters.end_date, chapters.description, chapters.duration_days FROM chapters INNER JOIN thematic_units ON chapters.id_thematic_units = thematic_units.id';
        private $queryGetChapters = 'SELECT chapters.id AS Code, thematic_units.id, thematic_units.name_thematics_units AS NameThematic, chapters.name_chapter, chapters.start_date, chapters.end_date, chapters.description, chapters.duration_days FROM chapters INNER JOIN thematic_units ON chapters.id_thematic_units = thematic_units.id WHERE chapters.id = :id_chapters';
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

        public function getAllChapters(){
            try {
                $res = $this->connec->prepare($this->queryGetAllChapters);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getChapters($id_chapters){
            try {
                $res = $this->connec->prepare($this->queryGetChapters);
                $res->bindValue("id_chapters", $id_chapters);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateChapters($data, $id_chapters){
            $id_thematic_units = $data["id_thematic_units"];
            $name_chapter = $data["name_chapter"];
            $start_date = $data["start_date"];
            $end_date = $data["end_date"];
            $description = $data["description"];
            $duration_days = $data["duration_days"];
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