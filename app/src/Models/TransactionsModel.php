<?php


namespace Src\Models;
use Src\Db\Connection;

class TransactionsModel extends Connection
{
    private $id;
    private $idAccountFk;
    private $dtRegister;
    private $value;
    private $operation;

    protected $table = "bank_transactions";

    public function __construct()
    {
        parent::__construct();
        $this->dtRegister = date("Y-m-d H:i:s");
    }

    public function setId(int $id){
        $this->id = $id;
    }
    public function setIdAccount(int $idAccountFk){
        $this->idAccountFk = $idAccountFk;
    }
    public function setValue($value){
        $this->value = $value;
    }
    public function setOperation($operation){
        $this->operation = $operation;
    }

    public function record(){
        return self::insert(array(
            "idAccountFk" => $this->idAccountFk,
            "dtRegister" => $this->dtRegister,
            "value" => $this->value,
            "operation" => $this->operation
        ));
    }

    public function listing($where = null, $limit = array()){
        return self::select(null,array(
            "fields" => "{$this->table}.operation, 
            {$this->table}.value,
            DATE_FORMAT({$this->table}.dtRegister, '%d/%m/%Y \ás %H:%i:%s') as dtRegister,
            pessoas.nome,accounts.account_number",
            "joins" => array(
                "INNER JOIN accounts ON {$this->table}.idAccountFk = accounts.id",
                "INNER JOIN pessoas ON pessoas.id = accounts.idPessoaFk",
            ),
            "order" => "{$this->table}.dtRegister DESC",
            "limit" => "{$limit['start']},{$limit['limit']}"
        ));
    }

    public function countPaginate($where = null){
        return self::countRegisters(null,array(
            "INNER JOIN accounts ON {$this->table}.idAccountFk = accounts.id",
            "INNER JOIN pessoas ON pessoas.id = accounts.idPessoaFk",
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
}