<?php
namespace App;
    interface firma{
        public function __get($name);
    }

    abstract class connect extends credentials implements firma{
        use getInstance;
        protected $connec;
        function __construct(public $driver = "mysql", private $port = 3306){
            try {
                $this->connec = new \PDO($this->driver.":host=".$this->__get('host').";dbname=".$this->__get('dbname').";port=".$this->port.";user=".$this->user.";password=".$this->password.";");
                $this->connec->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); //!conexión PDO

            } catch (\PDOExcetion $error) {
                $this->connec = $error->getMessage();
            }
        }
    }
?>