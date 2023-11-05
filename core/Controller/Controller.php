<?php 

namespace Core\Controller;

class Controller{

    protected $title = "LinkedIn";
    protected $viewPath;
    protected $template;

    protected function render($view, $variables=[]){
        ob_start();
        extract($variables);
        require ($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require ($this->viewPath . 'template/' . $this->template . '.php');
    }
    
    protected function notFound(){
        header("HTTP/1.0 404 Not Found");
        die('Page introuvable');
    }

    protected function setTitle($title){
        $this->title = $this->title . ' | ' . $title;
    }

    protected function forbidden(){
        header('HTTP/1.0 403 forbidden');
        die('Access interdit');
    }

}