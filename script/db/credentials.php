<?php
namespace App;

    abstract class credentials{
        protected $host = '172.16.49.20';
        private $user = 'sputnik';
        private $password = 'Sp3tn1kC@';
        protected $dbname = 'campusland'; 

        /* protected $host = 'localhost';
        private $user = 'root';
        private $password = '';
<<<<<<< HEAD
        protected $dbname = 'campusland'; 
=======
    protected $dbname = 'campusland';  */
>>>>>>> 3c6933ab89beee5ee1f612ef73e6cdef1b585091

        public function __get($name){
            return $this->{$name};
        }
    }
?>