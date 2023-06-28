<?php
namespace App;
    class themes extends connect{
        use getInstance;
        private $message;
        private $queryPostThemes = 'INSERT INTO themes (id_chapter, name_theme, start_date, end_date, description, duration_days) VALUES (:id_chapter, :name_theme, :start_date, :end_date, :description, :duration_days)';
        private $queryGetAllThemes = 'SELECT themes.id AS Code, chapters.name_chapter AS Name, themes.name_theme, themes.start_date, themes.end_date, themes.description, themes.duration_days FROM themes INNER JOIN chapters ON themes.id_chapter = chapters.id';
        private $queryGetThemes = 'SELECT themes.id AS Code, chapters.name_chapter AS Name, themes.name_theme, themes.start_date, themes.end_date, themes.description, themes.duration_days FROM themes INNER JOIN chapters ON themes.id_chapter = chapters.id WHERE themes.id = :id_themes';
        private $queryUpdateThemes = 'UPDATE themes SET id_chapter = :id_chapter, name_theme = :name_theme, start_date = :start_date, end_date = :end_date, description = :description, duration_days = :duration_days WHERE id = :id_themes';
        private $queryDeleteThemes = 'DELETE FROM themes WHERE id = :id_themes';

        public function __construct(){parent::__construct();}

        public function postThemes($id_chapter, $name_theme, $start_date, $end_date, $description, $duration_days){
            try {
                $res = $this->connec->prepare($this->queryPostThemes);
                $res->bindValue("id_chapter", $id_chapter);
                $res->bindValue("name_theme", $name_theme);
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

        public function getAllThemes(){
            try {
                $res = $this->connec->prepare($this->queryGetAllThemes);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getThemes($id_themes){
            try {
                $res = $this->connec->prepare($this->queryGetThemes);
                $res->bindValue("id_themes", $id_themes);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateThemes($data, $id_themes){
            $id_chapter = $data["id_chapter"];
            $name_theme = $data["name_theme"];
            $start_date = $data["start_date"];
            $end_date = $data["end_date"];
            $description = $data["description"];
            $duration_days = $data["duration_days"];
            try {
                $res = $this->connec->prepare($this->queryUpdateThemes);
                $res->bindValue("id_chapter", $id_chapter);
                $res->bindValue("name_theme", $name_theme);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_days", $duration_days);
                $res->bindValue("id_themes", $id_themes);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteThemes($id_themes){
            try {
                $res = $this->connec->prepare($this->queryDeleteThemes);
                $res->bindValue("id_themes", $id_themes);
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