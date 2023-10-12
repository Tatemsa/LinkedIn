<?php

    namespace App;
    class App{

     
        private $title = "LinkedIn";
        private $db_instance;
        private static $_instance;



        public static function getInstanceDb(){
            if(is_null(self::$_instance)){
                self::$_instance = new App();
            }

            return self::$_instance;

        }

        public function getTable($name){
            $class_name = '\\App\\Table\\'. ucfirst($name). 'Table';
            return new $class_name();
        }

        public function getDb(){
            $config = Config::getInstance();
            if($this->db_instance){
                $this->db_instance = new Database($config->get('db_name'),$config->get('db_user'), $config->get('db_password'), $config->get('db_host'));
            }
           return $this->db_instance;
        }

        // public function getDb(){
        //     if(self:: $database == null){
        //         self::$database = new Database($this->settings['db_name'],$this->settings['db_user'], $this->settings['db_password'], $this->settings['db_host']);
        //     }
            
        //     return self::$database;
        // }

        // public function notFound(){
        //     header("HTTP/1.0 404 Not Found");
        //     header("Location: index.php?p=404 ");
        // }

        // public function getTitle(){
        //     return self::$title;
        // }

        // public function setTitle($title){
        //     self::$title = $title;
        // }
    }