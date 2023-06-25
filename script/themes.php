<?php
namespace App;
    class themes extends connect{
        use getInstance;
        private $message;
        private $queryPostThemes = 'INSERT INTO themes (id_chapter, name_theme, start_date, end_date, description, duration_days) VALUES (:id_chapter, :name_theme, :start_date, :end_date, :description, :duration_days)';
        private $queryGetThemes = 'SELECT * FROM themes';
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

        public function getThemes(){
            try {
                $res = $this->connec->prepare($this->queryGetThemes);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateThemes($id_chapter, $name_theme, $start_date, $end_date, $description, $duration_days, $id_themes){
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