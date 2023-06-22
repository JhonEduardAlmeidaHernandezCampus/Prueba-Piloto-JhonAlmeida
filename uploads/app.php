<?php
    trait getInstance{
        public static $instance;
        public static function getInstance() {
            $arg = func_get_args();
            $arg = array_pop($arg);
            // return (self::$instance == null) ? self::$instance = new self(...(array) $arg) : self::$instance;
            return (!(self::$instance instanceof self) || !empty($arg)) ? self::$instance = new static(...(array) $arg) : self::$instance;
        }

        //modificadores de acceso 
        function __set($name, $value){
            $this->$name = $value;
        }
    }

    function autoload($class) {

        // Directorios donde buscar archivos de clases
        $directories = [
            dirname(__DIR__).'/script/',
            dirname(__DIR__).'/script/db/'
        ];

        // Convertir el nombre de la clase en un nombre de archivo relativo 
        $classFile = str_replace('\\', '/', $class) . '.php';

        // Recorrer los directorios y buscar el archivo de la clase
        foreach ($directories as $directory) {
            $file = $directory.$classFile;
            // Verificar si el archivo existe y cargarlo
            if (file_exists($file)) {
                require $file;
                break;
            }
        }

    }
    spl_autoload_register('autoload');

    // country regions::getInstance(json_decode(file_get_contents("php://input"), true))->postRegion("Huarochirí", 2);
    // country regions::getInstance()->getRegion();
    // country regions::getInstance(json_decode(file_get_contents("php://input"), true))->UpdateRegion("Machu Picchu", 2, 1);
    regions::getInstance()->DeleteRegion(3);

?>