<?php


namespace Src\Models;
use Src\Db\Connection;

class Accounts_Model extends Connection
{
    private $id;
    private $account_number;
    private $dtRegister;
    private $idPessoaFk;
    private $dtLastUpdate;

    protected $table = "accounts";

    public function __construct()
    {
        parent::__construct();
        $this->dtRegister = date("Y-m-d H:i:s");
    }

    public function setId(int $id){
        $this->id = $id;
    }
    public function setIdPessoa(int $idPessoaFk){
        $this->idPessoaFk = $idPessoaFk;
    }
    public function setAccountNumber(int $account_number){
        $this->account_number = $account_number;
    }
    public function setValue($value){
        $this->value = $value;
    }

    public function record(){
        return self::insert(array(
            "account_number" => $this->account_number,
            "dtRegister" => $this->dtRegister,
            "idPessoaFk" => $this->idPessoaFk));
    }

    public function listing($where = null, $limit = array()){
        return self::select("accounts.active = 'Y'",array(
            "fields" => "accounts.id,{$this->table}.account_number, 
            DATE_FORMAT({$this->table}.dtRegister, '%d/%m/%Y \ás %H:%i:%s') as dtRegister,
            accounts.value,
            accounts.idPessoaFk,
            pessoas.nome,pessoas.cpf",
            "joins" => array("INNER JOIN pessoas ON pessoas.id = {$this->table}.idPessoaFk"),
            "limit" => "{$limit['start']},{$limit['limit']}",
            "order" => "{$this->table}.dtRegister DESC"
        ));
    }
    public function countPaginate($where = null){
        return self::countRegisters("accounts.active = 'Y'",array(
            "joins" => array("INNER JOIN pessoas ON pessoas.id = {$this->table}.idPessoaFk")
        ));
    }

    public function change($data = array(),$where = array()){
        return self::update($data,$where);
    }
    function get($where = null){
        return self::select($where,[
            "fields" => 'accounts.id,pessoas.nome,pessoas.cpf,accounts.account_number,accounts.idPessoaFk',
            "joins" =>[
                'inner  join pessoas on accounts.idPessoaFk = pessoas.id'
            ],
            "unique" => true
        ]);
    }
    public function getAccounts($where  =  null){
        return self::select("{$where} AND accounts.active = 'Y' ",array(
            "fields" => "{$this->table}.id,
            {$this->table}.value,
            {$this->table}.account_number"
        ));
    }
    public function exists($where = null){
        return self::select($where,[
            "fields" => "{$this->table}.id",
            "unique" => true
        ]);
    }
}