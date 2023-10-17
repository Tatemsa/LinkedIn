<?php
    namespace Core\HTML;

    Class BootstrapForm extends Form{

        /**
         * @param string $html
         * @return string
         */
        protected function surround($html){
            return '<div class="form-groupe">' . $html . '</div>';
        }

        /**
         * @param string $name
         * @return string
         */
        public function input($name){
            return $this->surround('<label>'. $name . '</label><input type="text" name="'. $name .'" value ="'. $this->getValue($name) .'">');
        } 

        /**
         * @return string
         */
        public function submit(){
            return $this->surround('<button type="submit" class="btn btn-primary">Enregistrer</button>');
        }
    }
