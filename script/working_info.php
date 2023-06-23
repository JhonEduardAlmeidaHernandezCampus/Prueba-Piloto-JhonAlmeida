<?php
namespace App;
    class working_info extends connect{
        use getInstance;
        private $message;
        private $queryPostWorkingInfo = 'INSERT INTO working_info (id_staff, years_exp, months_exp, id_work_reference, id_personal_ref, start_contract, end_contract) VALUES (:id_staff, :years_exp, :months_exp, :id_work_reference, :id_personal_ref, :start_contract, :end_contract)';
        private $queryGetWorkingInfo = 'SELECT * FROM working_info';
        private $queryUpdateWorkingInfo = 'UPDATE working_info SET id_staff = :id_staff, years_exp = :years_exp, months_exp = :months_exp, id_work_reference = :id_work_reference, id_personal_ref = :id_personal_ref, start_contract = :start_contract, end_contract = :end_contract  WHERE id = :id_working_info';
        private $queryDeleteWorkingInfo = 'DELETE FROM working_info WHERE id = :id_working_info';

        public function __construct(){parent::__construct();}

        public function postWorkingInfo($id_staff, $years_exp, $months_exp, $id_work_reference, $id_personal_ref, $start_contract, $end_contract){
            try {
                $res = $this->connec->prepare($this->queryPostWorkingInfo);
                $res->bindValue('id_staff', $id_staff);
                $res->bindValue('years_exp', $years_exp);
                $res->bindValue('months_exp', $months_exp);
                $res->bindValue('id_work_reference', $id_work_reference);
                $res->bindValue('id_personal_ref', $id_personal_ref);
                $res->bindValue('start_contract', $start_contract);
                $res->bindValue('end_contract', $end_contract);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function getWorkingInfo(){
            try {
                $res = $this->connec->prepare($this->queryGetWorkingInfo);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => $res->fetchAll(PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function UpdateWorkingInfo($id_staff, $years_exp, $months_exp, $id_work_reference, $id_personal_ref, $start_contract, $end_contract, $id_working_info){
            try {
                $res = $this->connec->prepare($this->queryUpdateWorkingInfo);
                $res->bindValue('id_staff', $id_staff);
                $res->bindValue('years_exp', $years_exp);
                $res->bindValue('months_exp', $months_exp);
                $res->bindValue('id_work_reference', $id_work_reference);
                $res->bindValue('id_personal_ref', $id_personal_ref);
                $res->bindValue('start_contract', $start_contract);
                $res->bindValue('end_contract', $end_contract);
                $res->bindValue('id_working_info', $id_working_info);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Satisfactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

        public function DeleteWorkingInfo($id_working_info){
            try {
                $res = $this->connec->prepare($this->queryDeleteWorkingInfo);
                $res->bindValue('id_working_info', $id_working_info);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Eliminado Satisfactoriamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                print_r($this->message);
            }
        }

    }
?>