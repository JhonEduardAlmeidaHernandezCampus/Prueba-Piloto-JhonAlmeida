<?php
namespace App;
    class optional_topics extends connect{
        use getInstance;
        private $message;
        private $queryPostOptionalTopics = 'INSERT INTO optional_topics (id_topic, id_team, id_subject, id_camper, id_team_educator) VALUES (:id_topic, :id_team, :id_subject, :id_camper, :id_team_educator)';
        private $queryGetOptionalTopics = 'SELECT * FROM optional_topics';
        private $queryUpdateOptionalTopics = 'UPDATE optional_topics SET id_topic = :id_topic, id_team = :id_team, id_subject = :id_subject, id_camper = :id_camper, id_team_educator = :id_team_educator WHERE id = :id_optional_topics';
        private $queryDeleteOptionalTopics = 'DELETE FROM optional_topics WHERE id = :id_optional_topics';

        public function __construct(){parent::__construct();}

        public function postOptionalTopics($id_topic, $id_team, $id_subject, $id_camper, $id_team_educator){
            try {
                $res = $this->connec->prepare($this->queryPostOptionalTopics);
                $res->bindValue("id_topic", $id_topic);
                $res->bindValue("id_team", $id_team);
                $res->bindValue("id_subject", $id_subject);
                $res->bindValue("id_camper", $id_camper);
                $res->bindValue("id_team_educator", $id_team_educator);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getOptionalTopics(){
            try {
                $res = $this->connec->prepare($this->queryGetOptionalTopics);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateOptionalTopics($id_topic, $id_team, $id_subject, $id_camper, $id_team_educator, $id_optional_topics){
            try {
                $res = $this->connec->prepare($this->queryUpdateOptionalTopics);
                $res->bindValue("id_topic", $id_topic);
                $res->bindValue("id_team", $id_team);
                $res->bindValue("id_subject", $id_subject);
                $res->bindValue("id_camper", $id_camper);
                $res->bindValue("id_team_educator", $id_team_educator);
                $res->bindValue("id_optional_topics", $id_optional_topics);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteOptionalTopics($id_optional_topics){
            try {
                $res = $this->connec->prepare($this->queryDeleteOptionalTopics);
                $res->bindValue("id_optional_topics", $id_optional_topics);
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