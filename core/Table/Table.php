<?php 
    
    namespace Core\Table;

    use \Core\Database\Database;

    class Table{

        protected $table;
        protected $db;

        public function __construct(Database $db){

            $this->db = $db;
            if($this->table === null){
                $parts = explode('\\',get_class($this));
                $class_name = end($parts);
                $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
            }
            
        }

        public function find($id){
            return $this->query("
                                SELECT *
                                FROM ". $this->table ."
                                WHERE id=?",
                                [$id], true);
        }

        public function update($id, $fields){
            $sql_parts = [];
            $attributes = [];
            foreach($fields as $key=>$value){
                $sql_parts[] = "$key=?";
                $attributes[] = $value;
            }
            $attributes[] = $id;
            $sql_part = implode(',', $sql_parts);
            return $this->query("
                                UPDATE ". $this->table ."
                                SET ". $sql_part ."
                                WHERE id=?",
                                $attributes, true);
        }

        public function create($fields){
            $sql_parts = [];
            $attributes = [];
            foreach($fields as $key=>$value){
                $sql_parts[] = "$key=?";
                $attributes[] = $value;
            }
            $sql_part = implode(',', $sql_parts);
            return $this->query("
                                INSERT INTO ". $this->table ."
                                SET ". $sql_part ,
                                $attributes, true);
        }

        public function delete($id){
            return $this->query("DELETE FROM `$this->table` WHERE `$this->table`.`id`= ?",[$id] ,true);
        }

        public function extractRecord($key, $value){
            $records = $this->all();
            $return = [];
            foreach($records as $v){
                $return[$v->$key] = $v->$value;
            }
            return $return;
        }
        public function all(){

            return $this->query('SELECT * FROM ' . $this->table);
            
        }

        public function query($statement , $attributes = null, $one = false){
            if($attributes){
               return $this->db->prepare($statement, $attributes, str_replace('Table', 'Entity', get_class($this)), $one);
            } else {
               return $this->db->query($statement, str_replace('Table', 'Entity', get_class($this)), $one);
            }
        }

    }

