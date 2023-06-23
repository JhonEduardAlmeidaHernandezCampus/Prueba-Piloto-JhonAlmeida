<?php
namespace App;
    class topics extends connect{
        use getInstance;
        private $message;
        private $queryPostTopics = 'INSERT INTO topics (id_module, name_topic, start_date, end_date, description, duration_days) VALUES (:id_module, :name_topic, :start_date, :end_date, :description, :duration_days)';
        private $queryGetTopics = 'SELECT * FROM topics';
        private $queryUpdateTopics = 'UPDATE topics SET id_module = :id_module, name_topic = :name_topic, start_date = :start_date, end_date = :end_date, description = :description, duration_days = :duration_days WHERE id = :id_topics';
        private $queryDeleteTopics = 'DELETE FROM topics WHERE id = :id_topics';

        public function __construct(){parent::__construct();}

        public function postTopics($id_module, $name_topic, $start_date, $end_date, $description, $duration_days){
            try {
                $res = $this->connec->prepare($this->queryPostTopics);
                $res->bindValue("id_module", $id_module);
                $res->bindValue("name_topic", $name_topic);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_days", $duration_days);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
            print_r($this->message);
            }
        }

        public function getTopics(){
            try {
                $res = $this->connec->prepare($this->queryGetTopics);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function updateTopics($id_module, $name_topic, $start_date, $end_date, $description, $duration_days, $id_topics){
            try {
                $res = $this->connec->prepare($this->queryUpdateTopics);
                $res->bindValue("id_module", $id_module);
                $res->bindValue("name_topic", $name_topic);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_days", $duration_days);
                $res->bindValue("id_topics", $id_topics);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                print_r($this->message);
            }
        }

        public function deleteTopics($id_topics){
            try {
                $res = $this->connec->prepare($this->queryDeleteTopics);
                $res->bindValue("id_topics", $id_topics);
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