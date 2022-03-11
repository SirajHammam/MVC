<?php
class App{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // var_dump($_GET);
        $url = $this->parseURL();
        // var_dump($url);
        
        //cari controller
        if($url == NULL){
		 	$url = [$this->controller];
		}
        if(file_exists('../app/controllers/'.$url[0].'.php')){
            $this->controller=$url[0];
            unset($url[0]);
            //var_dump($url);
        }
        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;//object

        // cari method
        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
                //  var_dump($url);
            }
        }
        // cari parammeter
        if(!empty($url)){
            $this->params = array_values(($url));
            //var_dump($url);
        }

        //jalankan controller dan method, serta kirimkan param jika ada
        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    public function parseURL(){ 
        // namgkep data
        if(isset($_GET['url'])){
            $url = $_GET['url'];

        // menghilangkan slise, hecker
        $url= rtrim($_GET['url'],'/'); 
        $url= filter_var($url,FILTER_SANITIZE_URL); 
        $url= explode('/',$url);
        return $url; 
        }
    }
}