<?php

namespace App\Controller;


class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        $posts = $this->Post->last();
        $categories =$this->Category->all();
        $this->render('posts.index', compact('posts','categories'));
    }

    public function categories(){

        $category = $this->Category->find($_GET['id']);
        if($category===null){
            $this->notFound();
        }
        $posts = $this->Post->getLastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('posts','categories', 'category'));
        

    }

    public  function show(){
        $post = $this->Post->find($_GET['id']);
        $this->render('posts.show', compact('post'));
        
    }

}