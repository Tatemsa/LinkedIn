<?php 

    namespace App;

    class Config{

        private $settings = [];
        private static $_instance = [];
        public function __construct(){
            $this->settings = require dirname(__DIR__) .'/config/Config.php';
        }

        public static function getInstance(){
            if(self::$_instance === []){
                self::$_instance = new Config();
            }
            return self::$_instance;
        }

        public function get($key){
            if(!isset($this->settings[$key])){
                return null;
            }
            return $this->settings[$key];
        }

    }