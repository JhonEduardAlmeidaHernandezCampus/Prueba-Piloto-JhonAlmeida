<?php

class staff extends connect{
    use getInstance;
    private $queryPostStaff = 'INSERT INTO staff (doc, first_name, second_name, first_surname, second_surname, eps, id_area, id_city) VALUES (:doc, :first_name, :second_name, :first_surname, :second_surname, :eps, :id_area, :id_city)';
    private $queryGetStaff = 'SELECT staff.id AS id, doc AS cc, first_name AS name_first, second_name AS name_second, first_surname AS surname_first, second_surname AS surname_second, eps, cities.id AS city_code, name_city AS city_name, areas.id AS area_code, name_area AS area_name FROM staff INNER JOIN cities ON staff.id_city = cities.id INNER JOIN areas ON staff.id_area = areas.id';
    private $queryUpdateStaff = 'UPDATE staff SET doc = :doc, first_name = :first_name, second_name = :second_name, first_surname = :first_surname, second_surname = :second_surname, eps = :eps, id_area = :id_area, id_city = :id_city WHERE id = :id_staff';
    private $queryDeleteStaff = 'DELETE FROM staff WHERE id = :id_staff';

    public function __construct(){parent::__construct();}

    public function postStaff($doc, $first_name, $second_name, $first_surname, $second_surname, $eps, $id_area, $id_city){
        try {
            $res = $this->connec->prepare($this->queryPostStaff);
            $res->bindValue("doc", $doc);
            $res->bindValue("first_name", $first_name);
            $res->bindValue("second_name", $second_name);
            $res->bindValue("first_surname", $first_surname);
            $res->bindValue("second_surname", $second_surname);
            $res->bindValue("eps", $eps);
            $res->bindValue("id_area", $id_area);
            $res->bindValue("id_city", $id_city);
            $res->execute();
            $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

        } catch (\PDOException $error) {
           $this->message = $error->getMessage();
        } finally{
           print_r($this->message);
        }
    }

    public function getStaff(){
        try {
            $res = $this->connec->prepare($this->queryGetStaff);
            $res->execute();
            $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

        } catch (\PDOException $error) {
            $this->message = $error->getMessage();

        } finally{
            print_r($this->message);
        }
    }

    public function updateStaff($doc, $first_name, $second_name, $first_surname, $second_surname, $eps, $id_area, $id_city, $id_staff){
        try {
            $res = $this->connec->prepare($this->queryUpdateStaff);
            $res->bindValue("doc", $doc);
            $res->bindValue("first_name", $first_name);
            $res->bindValue("second_name", $second_name);
            $res->bindValue("first_surname", $first_surname);
            $res->bindValue("second_surname", $second_surname);
            $res->bindValue("eps", $eps);
            $res->bindValue("id_area", $id_area);
            $res->bindValue("id_city", $id_city);
            $res->bindValue("id_staff", $id_staff);
            $res->execute();
            $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

        } catch (\PDOException $error) {
            $this->message = $error->getMessage();

        } finally{
            print_r($this->message);
        }
    }

    public function deleteStaff($id_staff){
        try {
            $res = $this->connec->prepare($this->queryDeleteStaff);
            $res->bindValue("id_staff", $id_staff);
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