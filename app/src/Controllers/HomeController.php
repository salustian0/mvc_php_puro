<?php
namespace Src\Controllers;
use Src\Libraries\Template;
use Src\Models\PessoasModel;

class HomeController extends Controller {
    private $pessoaModel = null;

    public function __construct()
    {
        parent::__construct();
        $this->pessoaModel =  new PessoasModel();
    }

    public function index(){
        /**
         * Váriavel responsável por enviar dados para a view
         */
        $tpl = array();

        $last_transactions = $this->pessoaModel->getLastTransactions();

        if(isset($last_transactions) && count($last_transactions)){
            $tpl['last_transactions'] = $last_transactions;
        }

        $this->template->setJs(['home.js']);
       $this->template->view("home.tpl",$tpl);
    }
    public function error(){
        $tpl = array();
        $this->template->view("404.tpl",$tpl);
    }
}