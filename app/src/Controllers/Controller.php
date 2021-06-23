<?php

namespace Src\Controllers;
use Src\Libraries\Template;

/**
 * Class Controller
 * @package Src\Controllers
 * @author Renan Salustiano
 * Controller base que contém configurações que  serão necessárias a toda classe do tipo Controller
 */
class Controller{

    protected $child = array();
    protected $last_request_data = array();
    protected $js_files = array();

    function __construct(){
        $this->template = new Template();
        include "Src/Helpers/default.php";
        //Obtendo referencia da classe filha
        $this->child['class'] = get_called_class();

        /**
         * Obtendo nome da classe filha para o redirecionamento  em : submit caso a função não seja válida
         */
        try {
            $arr = explode("\\", $this->child['class']);
            $controller_name = lcfirst(end($arr));
            $arr = preg_split('/[A-Z]/', $controller_name);
            $this->child['name'] = current($arr);
            $this->template->setVar("module",$this->child['name']);
        }catch(\Exception $ex){
            die("Houve um erro em uma parte importante do programa, por favor tente novamente mais tarde");
        }

        // Prevent XSS input */
        if(count($_GET)){
            $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        }
        if(count($_POST)){
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        }

        /**
         * Recuperando dados da requisição anterior para que os campos não percam os dados digitados
         */
        if(isset($_SESSION['last_request_data'])){
           $this->last_request_data = $_SESSION['last_request_data'];
           $this->template->setVar("_data",$this->last_request_data);
           unset($_SESSION['last_request_data']);
        }
        /**
         * Recuperando mensagens para a View
         */
        if(isset($_SESSION['message'])){
            $this->messages = $_SESSION['message'];
            $this->template->setVar("_messages",$this->messages);
            unset($_SESSION['message']);
        }
        $this->js_files[] = 'main.js';

    }

    /**
     * Função responsável por chamar metodos internos do Controller filho (funcionamento dos modulos form e save)
     * Extremamente importante!
     */
    public function submit(){
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            //unset($_POST['action']);
            if(method_exists($this->child['class'],$action)){
               $this->$action();
               die();
            }
        }
        return redirect($this->child['name']."/index");
    }

}