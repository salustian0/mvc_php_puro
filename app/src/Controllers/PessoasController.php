<?php
namespace Src\Controllers;

use Src\Models\PessoasModel;

/**
 * Class PessoasController
 * @package Src\Controllers
 * @author Renan Salustiano
 * Controller -> pessoas (Responsável por ações de pessoa)
 */
class PessoasController extends Controller {
    private $PessoasModel = null;
    private $module;
    private $limit_pagination = 5;
    function __construct()
    {
        parent::__construct();
        $this->PessoasModel = new PessoasModel();
        $this->module = "pessoas";

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
        $listing = $this->PessoasModel->listing($limit);


        //Paginação!
        $total_results = $this->PessoasModel->countPaginate();
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
         * Caso seja edição busca os dados do registro solicitado
         */
        if(!empty($id) && empty($this->last_request_data)){
            $pessoa = $this->PessoasModel->get("pessoas.id = '{$id}' ");
            if(isset($pessoa) && count($pessoa)){
                $tpl['_data'] = $pessoa[0];
            }
        }

        $this->js_files[] = 'pessoas_form.js';
        $this->template->setJs($this->js_files);
        $this->template->view("{$this->module}/form.tpl",$tpl);
    }

    /**
     * Função responsável por registrar e modificar dados no banco
     */
    public function save(){
        $id = isset($_POST['id']) ? $_POST['id'] : null;


        $required_indexes = array('nome','endereco','cpf');
        if(!validate($required_indexes,$_POST)){
            /**
             * Salvando dados da requisição para serem retornados a view e preencher novamente os campos
             */
            record_request_data($_POST);
            set_message("danger","Verifique todos os campos.");
            return redirect($this->module."/form");
        }

        if(preg_match("/\d/",$_POST['nome'])){
            record_request_data($_POST);
            set_message("danger","O nome não pode conter números!");
            return redirect($this->module."/form");
        }

        if(strlen($_POST['nome']) > 200){
            record_request_data($_POST);
            set_message("danger","O nome deve conter no máximo 200 caracteres!");
            return redirect($this->module."/form");
        }

        if(strlen(str_replace([".","-"],"",$_POST['cpf'])) > 11){
            record_request_data($_POST);
            set_message("danger","O cpf deve conter no máximo 11 caracteres!");
            return redirect($this->module."/form");
        }




        if(isset($id) && !empty($id)){ //Edição
                $columns = array();
                $columns['nome'] = isset($_POST['nome']) ? ucfirst($_POST['nome']) : null;
                $columns['cpf'] = isset($_POST['cpf']) ? str_replace(['.','-'],"",$_POST['cpf']) : null;
                $columns['endereco'] = isset($_POST['endereco']) ? $_POST['endereco'] : null;


            if($this->PessoasModel->change(array_filter($columns),"pessoas.id = '{$id}' ")){
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

                $this->PessoasModel->setName(ucfirst($_POST['nome']));
                $this->PessoasModel->setAddress($_POST['endereco']);
                $this->PessoasModel->setDocNumber(str_replace(['.','-'],"",$_POST['cpf']));

            if($this->PessoasModel->record()){
                    set_message("success","Pessoa registrada com sucesso!");
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
                if($this->PessoasModel->change(array("active" => "N"), "pessoas.id = '{$v}' ")){
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
