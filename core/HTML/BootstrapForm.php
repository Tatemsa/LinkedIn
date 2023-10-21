<?php
    namespace Core\HTML;

    Class BootstrapForm extends Form{

        /**
         * @param string $name
         * @param string $label
         * @param array $option
         * @return string
         */
        public function input($name, $label, $option = []){
            $type = isset($option['type']) ? $option['type'] : 'text';
            $label = '<label>'. $label. '</label>';
            if($type === 'textarea'){
                $input = '<textarea  name="'. $name .'" class="form-control">'. $this->getValue($name) .'</textarea>';
            } else {
                $input = '<input type="'. $type .'" name="'. $name .'" value ="'. $this->getValue($name) .'">';
                
            }
            
            return $this->surround($label . $input);
        } 

        /**
         * @param string $name
         * @param string $label
         * @param array $option
         * @return string
         */
        public function select($name, $label, $options){
            $label = '<label>'. $label . '</label>';
            $input = '<select class="form-control" name="'. $name .'">';
            foreach($options as $key=>$value){
                $attributes = "";
                if($key == $this->getValue($name)){
                    $attributes = "selected";
                }
                $input .= "<option value='$key' $attributes>$value</option>"; 
            }
            $input .= '</select>';
            return $this->surround($label . $input);
        }

        /**
         * @return string
         */
        public function submit(){
            return $this->surround('<button type="submit" class="btn btn-primary">Enregistrer</button>');
        }

        /**
         * @param string $html
         * @return string
         */
        protected function surround($html){
            return '<div class="form-group">' . $html . '</div>';
        }

    }

    
