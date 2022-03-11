<?php

class Home extends Controller{
    public function index(){
        // echo 'home/index';
        $data['judul']='home';
        $this->view('template/header',$data);
        $this->view('home/index');
        $this->view('template/footer');
    }
}