<?php
namespace Src\Controllers;

use Src\Models\Accounts_Model;
use Src\Models\PessoasModel;

/**
 * Class AccountsController
 * @package Src\Controllers
 * @author Renan Salustiano
 * Controller -> accounts (Responsável por ações da conta)
 */
class AccountsController extends Controller {
    private $Accounts_Model = null;
    private $Pessoas_Model = null;
    private $module;
    private $limit_pagination = 5;
    function __construct()
    {
        parent::__construct();
        $this->Accounts_Model = new Accounts_Model();
        $this->Pessoas_Model = new PessoasModel();
        $this->module = "accounts";

    }

    public function index(){
        $tpl = array();

        /**
         * Calculos paginação
         */
        $page = isset($_GET['page']) ? ((int)$_GET['page'] -1 ) : 0;
        $limit = array("start" => ( $page * $this->limit_pagination), "limit" => $this->limit_pagination);

        /**
         * Listagem de dados
         */
        $listing = $this->Accounts_Model->listing(array(),$limit);

        //Paginação!
        $total_results = $this->Accounts_Model->countPaginate();
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
     * Função responsável por renderizar o formulário -> Registrar/Modificar
     */
    public function form(){
        $tpl = array();
        $id = null;
        /**
         * Recuperando id caso seja edição de dados
         */
        if(isset($_POST['action'])){
            if(isset($_POST['id'])){
                $id = current($_POST['id']);
            }else{
                set_message("danger","É necessário selecionar um registro para realizar a edição!");
                return redirect($this->module,"/index");
            }
        }else if(isset($this->last_request_data['id'])){
            $id = $this->last_request_data['id'];
        }

        /**
         * Buscando registro de pessoas para montar a select na view
         */
        $pessoas = $this->Pessoas_Model->getPessoas();
        if(isset($pessoas) && count($pessoas)){
            $tpl['pessoas']  = $pessoas;
        }

        /**
         * Caso seja edição busca os dados do registro solicitado
         */
        if(!empty($id) && empty($this->last_request_data)){
            $pessoa = $this->Accounts_Model->get("accounts.id = '{$id}' ");
            if(isset($pessoa) && count($pessoa)){
                $tpl['_data'] = $pessoa[0];
            }
        }

        $this->template->setJs($this->js_files);
        $this->template->view("{$this->module}/form.tpl",$tpl);
    }

    /**
     * Função responsável por registrar e modificar dados no banco
     */
    public function save(){
        $id = isset($_POST['id']) ? $_POST['id'] : null;

        $required_indexes = array('account_number','idPessoaFk');
        if(!validate($required_indexes,$_POST)){
            /**
             * Salvando dados da requisição para serem retornados a view e preencher novamente os campos
             */
            record_request_data($_POST);
            set_message("danger","Verifique todos os campos.");
            return redirect($this->module."/form");
        }

        if(!is_numeric($_POST['account_number'])){
            record_request_data($_POST);
            set_message("danger","O número da conta precisa ser totalmente númerico!");
            return redirect($this->module."/form");
        }

        if(isset($id) && !empty($id)){ //Edição
                $columns = array();
                $columns['account_number'] = isset($_POST['account_number']) ? $_POST['account_number'] : null;
                $columns['idPessoaFk'] = isset($_POST['idPessoaFk']) ? $_POST['idPessoaFk'] : null;

                if($this->Accounts_Model->change(array_filter($columns),"accounts.id = '{$id}' ")){
                    set_message("success","Registro atualizado com sucesso");
                    return redirect($this->module."/index");
                }else
                {
                    set_message("danger","Houve um erro durante a tentativa de atualização do registro, por favor tente novamente mais tarde");
                    return redirect($this->module."/index");
                }

        }
        else //Registro
        {
                $this->Accounts_Model->setAccountNumber($_POST['account_number']);
                $this->Accounts_Model->setIdPessoa($_POST['idPessoaFk']);
                if($this->Accounts_Model->record()){
                    set_message("success","Nova conta criada com sucesso!");
                    return redirect($this->module."/index");
                }else
                {
                    set_message("danger","Houve um erro durante a tentativa de registro, por favor tente novamente mais tarde");
                    return redirect($this->module."/index");
                }

        }

    }

    /**
     * Função responsável por deletar registros
     * Soft delete
     */
    public function delete($ids){
       // $ids = isset($_POST['id']) ? $_POST['id'] : null;
        $count_deleted = 0;
        if(isset($ids) && count($ids)){
            foreach ($ids as  $k => $v) {
                if($this->Accounts_Model->change(array("active" => "N"), "accounts.id = '{$v}' ")){
                    $count_deleted++;
                }
            }
            if($count_deleted > 0){
                $text = $count_deleted === 1 ? "registro deletado com sucesso" : "{$count_deleted} registros deletados com sucesso";
                set_message("success", $text);
            }else
            {
                set_message("danger", "nenhum registro deletado!");
            }
        }else
        {
            set_message("danger","É necessário selecionar um registro para realizar a exclusão!");
        }
       return  redirect($this->module."/index");
    }

    /**
     * Função responsável por renderizar a view de confirmação de deleção de registros
     */
    public function deletion_verification(){
        $tpl = array();
        $ids = isset($_POST['id']) ? $_POST['id'] : null;

        if(!isset($ids) || is_null($ids) || !count($ids)){
            set_message("danger","Você precisa selecionar ao menos um registro para continuar!");
            redirect($this->module."/index");
        }

        $tpl['ids'] = $ids;
        $tpl['module'] = $this->module;


        if(isset($_POST['action']) && isset($_POST['id'])){
            $action = $_POST['action'];

            switch ($action){
                case "true":
                    return $this->delete($ids); //Realizando a exclusão dos registros
                    break;
                case "false":
                    redirect($this->module."/index");
                    break;
            }
        }

        $this->template->view("confirm_deletion.tpl",$tpl);
    }
}
