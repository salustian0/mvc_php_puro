<?php
namespace Src\Core;

class Route{

    private $url = array();

    function __construct(){
        $this->init();
    }

    private function init(){
        $this->url = isset($_GET["url"]) ? $_GET['url'] : "home/index";
        $this->url = explode("/",$this->url);
        $this->url = array_filter($this->url);
        $this->url = array_values($this->url);


        $controller = $this->getController();

        $action = $this->getAction();
        $params = $this->getParams();
        $namespace = "\\Src\\Controllers\\";

        $file  = "src/Controllers/{$controller}.php";

        if(file_exists($file)){
            $controller = $namespace.$controller;
            if(method_exists($controller,$action)){
                call_user_func_array([new $controller,$action],$params);
                die();
            }
        }

        $home = $namespace."HomeController";
        $action = "error";
        call_user_func_array([new $home,$action],$params);
    }

    private function getController(){
        $controller =  ucfirst($this->url[0])."Controller";
        array_shift($this->url);
        return $controller;
    }

    private function getAction(){
        if(isset($this->url[0]) && !empty($this->url[0])){
            $action = $this->url[0];
        }else
        {
            $action = "index";
        }
        array_shift($this->url);
        return $action;
    }
    private function getParams(){
        return $this->url;
    }
}