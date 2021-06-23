<?php
namespace Src\Core;
/**
 * Class Route
 * @package Src\Core
 * @author Renan Salustiano
 * Classe responsável por gerenciar urls amigaveis
 */
class Route{

    private $url = array();

    function __construct(){
        $this->init();
    }

    private function init(){
        /**
         * Explodindo url
         */
        $this->url = isset($_GET["url"]) ? $_GET['url'] : "home/index";
        $this->url = explode("/",$this->url);
        $this->url = array_filter($this->url);
        $this->url = array_values($this->url);


        /**
         * convertendo parâmetros necessários
         */
        $controller = $this->getController();
        $action = $this->getAction();
        $params = $this->getParams();
        $namespace = "\\Src\\Controllers\\";
        $file  = "src/Controllers/{$controller}.php";

        if(file_exists($file)){
            $controller = $namespace.$controller;
            if(method_exists($controller,$action)){
                /**
                 * Chamando controller e action solicitados e passando os parâmetros
                 */
                call_user_func_array([new $controller,$action],$params);
                die();
            }
        }

        /**
         * Caso controller e action informados não existam -> página de erro
         */
        $home = $namespace."HomeController";
        $action = "error";
        call_user_func_array([new $home,$action],$params);
    }

    /**
     * @return string
     * Função responsável por retornar o controller
     */
    private function getController(){
        $controller =  ucfirst($this->url[0])."Controller";
        array_shift($this->url);
        return $controller;
    }

    /**
     * @return mixed|string
     * Função responsável por retornar a action
     */
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

    /**
     * @return array
     * Função responsável por retornar os parâmetros (qualquer dado informado após controller/action) (o que sobrar no array)
     */
    private function getParams(){
        return $this->url;
    }
}