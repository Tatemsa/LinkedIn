<?php 
    namespace App\Table;

    class Article{

        public function __get($key){
            $method = 'get' . ucfirst($key);
            $this->$key = $this->$method();
            return $this->$key;
        }

        public function getExtrait(){
            $html = '<p>'. substr($this->content, 0, 50 ) .'...</p>';
            $html .= '<p><a href="'. $this->getUrl() .'">Voir la suite</a></p>';
            return $html;
        }

        public function getUrl(){
            return "index.php?p=posts&id=". $this->id;
        }

    }