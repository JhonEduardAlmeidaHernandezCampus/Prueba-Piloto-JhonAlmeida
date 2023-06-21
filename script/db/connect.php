<?php
    interface firma{
        public function __get($name);
    }

    class connect extends credentials implements firma{
        use getInstance;
        protected $connec;
        function __construct(public $driver = "mysql", private $port = 3306){
            try {
                $this->connec = new PDO($this->driver.":host=".$this->__get('host').";dbname=".$this->__get('dbname').";port=".$this->port.";user=".$this->user.";password=".$this->password.";");
                echo "Conectado";

            } catch (\PDOExcetion $error) {
                $this->connec = $error->getMessage();
            }
        }
    }
?>