<?php
namespace App;
    class routes extends connect{
        use getInstance;
        private $message;
        private $queryPostRoutes = 'INSERT INTO routes (name_route, start_date, end_date, description, duration_month) VALUES (:name_route, :start_date, :end_date, :description, :duration_month)';
        private $queryGetAllRoutes = 'SELECT * FROM routes';
        private $queryGetRoutes = 'SELECT * FROM routes WHERE id = :id_routes';
        private $queryUpdateRoutes = 'UPDATE routes SET name_route = :name_route, start_date = :start_date, end_date = :end_date, description = :description, duration_month = :duration_month  WHERE id = :id_routes';
        private $queryDeleteRoutes = 'DELETE FROM routes WHERE id = :id_routes';

        public function __construct(){parent::__construct();}

        public function postRoutes($name_route, $start_date, $end_date, $description, $duration_month){
            try {
                $res = $this->connec->prepare($this->queryPostRoutes);
                $res->bindValue("name_route", $name_route);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_month", $duration_month);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllRoutes(){
            try {
                $res = $this->connec->prepare($this->queryGetAllRoutes);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getRoutes($id_routes){
            try {
                $res = $this->connec->prepare($this->queryGetRoutes);
                $res->bindValue("id_routes", $id_routes);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateRoutes($data, $id_routes){
            $name_route = $data["name_route"];
            $start_date = $data["start_date"];
            $end_date = $data["end_date"];
            $description = $data["description"];
            $duration_month = $data["duration_month"];
            try {
                $res = $this->connec->prepare($this->queryUpdateRoutes);
                $res->bindValue("name_route", $name_route);
                $res->bindValue("start_date", $start_date);
                $res->bindValue("end_date", $end_date);
                $res->bindValue("description", $description);
                $res->bindValue("duration_month", $duration_month);
                $res->bindValue("id_routes", $id_routes);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();
                
            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function deleteRoutes($id_routes){
            try {
                $res = $this->connec->prepare($this->queryDeleteRoutes);
                $res->bindValue("id_routes", $id_routes);
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