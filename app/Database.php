<?php
    namespace App;

    use \PDO;
    
    class Database{

        private $db_name; 
        private $db_user; 
        private $db_password; 
        private $db_host;
        private $pdo;

        public function __construct($db_name, $db_user='root', $db_password='', $db_host='localhost'){
            $this->db_name = $db_name;
            $this->db_user = $db_user ;
            $this->db_password = $db_password;
            $this->db_host = $db_host;
        }

        public function query($statement, $class_name){
            $req = $this->getPDO()->query($statement);
            $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
            return $datas;
        }
        
        public function prepare($statement, $attribute, $class_name, $one = false){
            $req = $this->getPDO()->prepare($statement);
            $req->execute($attribute);
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
            if($one){
                $datas = $req->fetch();
            }else{
                $datas = $req->fetchAll();
            }
            
            return $datas; 

        } 

        private function getPDO(){
            if($this->pdo == null){
                $pdo = new PDO('mysql:dbname=linkedindb;host=localhost','root','');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
            }
            return $this->pdo;
        }

    }