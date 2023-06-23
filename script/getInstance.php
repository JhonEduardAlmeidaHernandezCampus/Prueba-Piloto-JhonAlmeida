<?php
namespace App;

    trait getInstance{
        public static $instance;
        public static function getInstance() {
            $arg = func_get_args();
            $arg = array_pop($arg);
            return (self::$instance == null) ? self::$instance = new self(...(array) $arg) : self::$instance;
            // return (!(self::$instance instanceof self) || !empty($arg)) ? self::$instance = new static(...(array) $arg) : self::$instance;
        }

        //modificadores de acceso 
        function __set($name, $value){
            $this->$name = $value;
        }
    }
?>