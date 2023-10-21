<?php 
    
    namespace App\Table;

    use \Core\Table\Table;
    
    class PostTable extends Table{
        
        /**
         * Recupere les derniers articles
         * @return array
         */
        public function last(){
            return $this->query("
                                SELECT posts.id, posts.title, posts.content, posts.date, categories.title as category
                                FROM posts
                                LEFT JOIN categories ON posts.category_id = categories.id
                                ORDER BY posts.date DESC");
        }


        /**
         * Recupere un article en le liant a sa categorie
         * @param int $category_id 
         *  @return \App\Entity\PostEntity
         */
        public function find($id){
            return $this->query("
                                SELECT posts.id, posts.title, posts.content, posts.date, posts.category_id , categories.title as category
                                FROM ". $this->table ."
                                LEFT JOIN categories ON posts.category_id = categories.id
                                WHERE posts.id=?",
                                [$id], true);
        }

        /**
         * Recupereun les derniers article de la classe demandee
         * @param int $category_id
         * @return array
         */
        public function getLastByCategory($category_id){
            return $this->query("SELECT posts.id, posts.title, posts.content, posts.date, categories.title as category
                                FROM posts
                                LEFT JOIN categories ON posts.category_id = categories.id
                                WHERE posts.category_id = ?
                                ORDER BY posts.date DESC",
                                [$category_id]);
        }
    }