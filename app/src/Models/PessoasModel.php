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
        /**
         * Listando pessoas ativas
         */
         return self::select("{$this->table}.active = 'Y' ",[
             "fields" => "{$this->table}.*,DATE_FORMAT({$this->table}.dtRegister, '%d/%m/%Y \á\s %H:%i:%s') as dtRegister",
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

    public function get($where = null){
        return self::select($where,[
            "fields" => "{$this->table}.*",
            "unique" => true
            ]);
    }

    /**
     * @return array
     * Função desnecessária! -> Alteração realizada após entrega
     */
    public function getPessoas(){
        return self::select("pessoas.active = 'Y' ",[
            "fields" => 'pessoas.id,pessoas.nome,pessoas.cpf'
        ]);
    }

}