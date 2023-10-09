<?php 
    namespace App\Table;
    
    use App\App;
    class Article extends Table{
        
        protected static $table = 'posts';
        
        public static function find($id){
            return self::query("
                                SELECT posts.id, posts.title, posts.content, categories.title as category
                                FROM posts 
                                LEFT JOIN categories ON category_id = categories.id
                                WHERE posts.id = ?
                             ", [$id], true); 
        }
        
        public static function getLast(){
            return self::query("
                            SELECT posts.id, posts.title, posts.content, categories.title as category
                            FROM posts LEFT JOIN categories 
                            ON category_id = categories.id
                            ORDER BY posts.date DESC
                        "); 
        }

        public static function lastByCategory($categorie_id){
            return self::query("
                            SELECT posts.id, posts.title, posts.content, categories.title as category
                            FROM posts 
                            LEFT JOIN categories ON category_id = categories.id
                            WHERE category_id = ?
                            ORDER BY posts.date DESC
                        ", [$categorie_id]); 
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