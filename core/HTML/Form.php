<?php
    namespace Core\HTML;

    class Form{

        private $data;
        public $surround = 'p';

        public function __construct($data = array()){
            $this->data = $data;
        }

         /**
         * @param string $name
         * @param string $label
         * @param array $option
         * @return string
         */
        public function input($name, $label, $option = []){
            $type = isset($option['type']) ? $option['type'] : 'text';
            return $this->surround('<input type="'. $type .'" name="'. $name.'" value="'. $this->getValue($name) .'">');
        } 

        /**
         * @return string
         */
        public function submit(){
            return $this->surround('<button type="submit">Enregister</button>');
        }

         /**
         * @param string $html
         * @return string
         */
        protected function surround($html){
            return "<". $this->surround .">". $html ."</". $this->surround .">";
        } 

        protected function getValue($index){
            if(is_object($this->data)){
                return $this->data->$index;
            }
            return isset($this->data[$index]) ? $this->data[$index] : null;
        }

    }