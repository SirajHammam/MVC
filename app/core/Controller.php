<?php // tempat buat method buat view ($view = controllers/ $data = wadah pengisian)

class Controller{
    public function view($view,$data=[]){
        require_once '../app/view/' .$view.'.php';
    }
    public function model($model){
        require_once '../app/models/' .$model.'.php';
        return new $model;
    }
}