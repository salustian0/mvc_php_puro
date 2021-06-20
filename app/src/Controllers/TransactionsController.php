<?php
namespace Src\Controllers;

use Src\Models\Accounts_Model;
use Src\Models\PessoasModel;
use Src\Models\TransactionsModel;

/**
 * Class AccountsController
 * @package Src\Controllers
 * @author Renan Salustiano
 * Controller -> accounts (Responsável por ações da conta)
 */
class TransactionsController extends Controller {
    private $Accounts_Model = null;
    private $PessoasModel = null;
    private $TransactionsModel = null;
    private $module;
    private $limit_pagination = 5;
    function __construct()
    {
        parent::__construct();
        $this->Accounts_Model = new Accounts_Model();
        $this->PessoasModel = new PessoasModel();
        $this->TransactionsModel = new TransactionsModel();

        $this->module = "transactions";

    }

    public function index(){
        $tpl = array();

        /**
         * Calculos paginação
         */
        $page = isset($_GET['page']) ? ((int)$_GET['page'] -1 ) : 0;
        $limit = array("start" => ($page * $this->limit_pagination), "limit" => $this->limit_pagination);

        /**
         * Listagem de dados
         */
        $listing = $this->TransactionsModel->listing(array(),$limit);


        //Paginação!
        $total_results = $this->TransactionsModel->countPaginate();
        $tpl['total_results'] = isset($total_results) ? $total_results : 0;
        $tpl['pagination'] =  makePaginationView($total_results,$this->limit_pagination,$page);

        if(isset($listing) && count($listing)){
            $tpl['listing'] = $listing;
        }

        /**
         * Setando arquivos js que serão utilizados nessa página, já com os arquivos pré definidos no controller base: 'Controller'
         */
        $this->template->setJs($this->js_files);
        $this->template->view("{$this->module}/list.tpl",$tpl);
    }

    /**
     * Função responsável por renderizar o formulário -> Registrar/(Esse módulo não tem as opções de exclusão ou edição)
     */
    public function form(){
        $tpl = array();
        $selected_account = isset($_GET['account']) ? $_GET['account'] : 0;
        $selected_pessoa = isset($_GET['pessoa']) ? $_GET['pessoa'] : 0;

        $tpl['selected_pessoa'] = $selected_pessoa;

        $tpl['js_const']['selected_account'] = $selected_account;
        /**
         * Buscando registro de pessoas para montar a select na view
         */
        $pessoas = $this->PessoasModel->getPessoas();
        if(isset($pessoas) && count($pessoas)){
            $tpl['pessoas']  = $pessoas;
        }

        /**
         * Setando js especifico dessa página
         */
        $this->js_files[] = 'transactions_form.js';
        $this->template->setJs($this->js_files);
        $this->template->view("{$this->module}/form.tpl",$tpl);
    }
    public function ajx_get_accounts(){
        if(isset($_GET['idPessoaFk']) && !empty($_GET['idPessoaFk'])){
            $id = $_GET['idPessoaFk'];
            /**
             * Buscando registro de contas para montar a select na view
             */
            $accounts = $this->Accounts_Model->getAccounts("accounts.idPessoaFk = '{$id}' ");
            if(isset($accounts) && count($accounts)){
                echo json_encode($accounts);
                die();
            }
        }
        echo json_encode(array());
    }

    /**
     * Função responsável por registrar dados no banco
     */
    public function save(){
        /**
         * Validando dados
         */


        $required_indexes = array('idAccountFk','value','operation');
        if(!validate($required_indexes,$_POST)){
            /**
             * Salvando dados da requisição para serem retornados a view e preencher novamente os campos
             */
            record_request_data($_POST);
            set_message("danger","Verifique todos os campos.");
            return redirect($this->module."/form");
        }

        if((int)$_POST['value'] < 0 || !is_numeric($_POST['value'])){
            set_message("danger","Esse valor é inválido!");
            return redirect($this->module."/form");
        }

        $account = $this->Accounts_Model->getAccounts("accounts.id = '{$_POST['idAccountFk']}'");

        if(isset($account) && count($account)){
            $account = $account[0];
            if($_POST['operation'] === "retirada" && (float)$_POST['value'] > (float)$account['value']){
                set_message("danger","Essa conta não possui fundos suficientes, você pode realizar um deposíto antes de retirar!");
                return redirect($this->module."/form");
            }
        }else
        {
            set_message("Conta inválida!");
            redirect($this->module."/form");
        }

        /**
         * setando valores
         */
        $this->TransactionsModel->setIdAccount($_POST['idAccountFk']);
        $this->TransactionsModel->setOperation($_POST['operation']);
        $this->TransactionsModel->setValue($_POST['value']);

        /**
         * Registrando
         */

        switch ($_POST['operation']){
            case "retirada":
                $newAccountValue = (float)$account["value"] - (float)$_POST['value'];
                break;
            case "deposito":
                $newAccountValue = (float)$account["value"] + (float)$_POST['value'];
                break;
        }

        if($this->Accounts_Model->change(array("value" => $newAccountValue),"accounts.id = {$account['id']}")){
            if($this->TransactionsModel->record()){
                set_message("success","Movimentação  registrada com sucesso!");
                return redirect($this->module."/index");
            }else
            {
                set_message("danger","A Movimentação foi realizada porém houve um erro durane a tentativa de registro dessa movimentação");
                return redirect($this->module."/index");
            }
        }else
        {
            set_message("danger","Houve um erro durante a movimentação, por favor tente novamente mais tarde");
            return redirect($this->module."/index");
        }

    }

}
