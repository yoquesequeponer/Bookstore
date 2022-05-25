<?php 
class Controller{
    protected $controller;
    public function __construct($name){
        $this->controller = $name;

    }
    public function view($view,$data=[]){
        require_once 'app/views/'. $this->controller.'/'.$view.'.php' ;  
     }
}
?>