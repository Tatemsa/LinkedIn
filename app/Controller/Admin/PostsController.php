<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
use \App;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }
    public function index(){
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add(){
        if(!empty($_POST)){
            $result= $this->Post->create(['title'=>$_POST['title'], 'content'=>$_POST['content'], 'category_id'=>$_POST['category_id']]);
            if(!$result){
                return $this->index();
            }
        }
       
        $categories = $this->Category->extractRecord('id', 'title');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edith', compact('categories', 'form'));
    }

    public function delete(){
        if(!empty($_POST)){
            $result=$this->Post->delete($_POST['id']);
            if($result){
                return $this->index();
            }
        }
    }

    public function edith(){
            $success = false;
        if(!empty($_POST)){
            $result=$this->Post->update($_GET['id'], ['title'=>$_POST['title'], 'content'=>$_POST['content'], 'category_id'=>$_POST['category_id']]);
            if(!$result){
               return $this->index();
            }
        }
        
        $post = $this->Post->find($_GET['id']);
        $categories =$this->Category->extractRecord('id', 'title');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edith', compact('categories', 'form'));
    }

}