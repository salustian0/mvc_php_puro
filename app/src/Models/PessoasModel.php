<?php
namespace Src\Models;
use Src\Db\Connection;

class PessoasModel extends Connection {

    protected $table = "pessoas";
    private $id;
    private $name;
    private $address;
    private $docNumber;

    public function __construct()
    {
       parent::__construct();
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setAddress($address){
        $this->address = $address;
    }
    public function setDocNumber($docNumber){
        $this->docNumber = $docNumber;
    }

    function record(){
        return self::insert(array(
            "nome" => $this->name,
            "cpf" => $this->docNumber,
            "endereco" => $this->address
        ));
    }


    function listing($limit){
         return self::select("{$this->table}.active = 'Y' ",[
             "fields" => "{$this->table}.*",
             "limit" => "{$limit['start']},{$limit['limit']}",
             "order" => "{$this->table}.dtRegister DESC"
         ]);
    }

    public function change($data = array(),$where = array()){
        return self::update($data,$where);
    }

    public function countPaginate($where = null){
        return self::countRegisters("{$this->table}.active = 'Y' ");
    }

    public function getLastTransactions(){
         return self::select(null,[
            "fields" => 'pessoas.nome,pessoas.cpf,accounts.account_number,bank_transactions.dtRegister,bank_transactions.value,
             DATE_FORMAT(bank_transactions.dtRegister, "%d/%m/%Y \ás %H:%i:%s") as dtRegister',
             "joins" =>[
                'inner  join accounts on accounts.idPessoaFk = pessoas.id',
                'inner  join bank_transactions on bank_transactions.idAccountFk = accounts.id'
             ],
             "limit" => 10,
             "order" => 'bank_transactions.dtRegister DESC'
         ]);
    }
    public function get($where = null){
        return self::select($where,[
            "fields" => "{$this->table}.*",
            "unique" => true
            ]);
    }
    public function getPessoas(){
        return self::select(null,[
            "fields" => 'pessoas.id,pessoas.nome,pessoas.cpf'
        ]);
    }

}