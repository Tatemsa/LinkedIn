<?php

namespace App\Controller;

use  \Core\Controller\Controller;
use \App;

class AppController extends Controller{

    protected $template = 'default';

    public function __construct(){
        $this->viewPath = ROOT . '/app/Views/';
    }

    protected function loadModel($model_name){
        $this->$model_name = App::getInstanceDb()->getTable($model_name);
        
    }

}