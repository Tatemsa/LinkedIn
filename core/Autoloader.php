<?php
    namespace Core;
    /**
     * Autoloader Cette classe va nous permettre de d'importer automatique nos autres classes quand on en aura besoin 
     */
    class Autoloader{

        /**
         * Cette fonction va permettre d'enregistrer nos autoloaders a chaque import de classes pour permettre d'en appeler plusieurs
         */
        static function register(){

            spl_autoload_register(array(__CLASS__, 'autoload'));
        }
    
        /**
         * @param string $class Represente le nom de la classe a importer
         */
        static function autoload($class){
            if(strpos($class, __NAMESPACE__.'\\')===0){
                $class = str_replace(__NAMESPACE__.'\\','',$class);
                $class = str_replace('\\','/',$class);
                require __DIR__.'/'. $class .'.php';
            }
        }
    }
?>