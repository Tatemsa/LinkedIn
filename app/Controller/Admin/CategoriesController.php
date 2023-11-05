<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class CategoriesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }
    public function index(){
        $categories = $this->Category->all();
        $this->render('admin.categories.index', compact('categories'));
    }

    public function add(){
        if(!empty($_POST)){
            $result= $this->Category->create(['title'=>$_POST['title']]);
            if(!$result){
                return $this->index();
            }
        }
       
        $this->render('admin.categories.edith', compact('form'));
    }

    public function delete(){
        if(!empty($_POST)){
            $result=$this->Category->delete($_POST['id']);
            if($result){
                return $this->index();
            }
        }
    }

    public function edith(){
        if(!empty($_POST)){
            $result=$this->Category->update($_GET['id'], ['title'=>$_POST['title']]);
            if(!$result){
               return $this->index();
            }
        }
        
        $category = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edith', compact('form'));
    }

}