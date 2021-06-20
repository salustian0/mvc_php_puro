<?php
namespace Src\Db;

use \PDO;
use \PDOException;

/**
 * Class Connection
 * @package Src\Db
 * @author Renan Salustiano
 * Classe responsável pela conexão e ações no banco de dados através de querybuilders
 */
class Connection{
    private $conn = null;
    private $stmt = null;
    private $dbuser = null;
    private $dbname = null;
    private $dbhost = null;
    private $query = null;


    private $dbpass = null;

    public function __construct(){
        $this->dbuser = $_ENV['MYSQL_USER'];
        $this->dbpass = $_ENV['MYSQL_PASS'];
        $this->dbname = "ist";
        $this->dbhost = "mysql";
        $this->connect();
    }

    /**
     * Conectando-se ao banco
     */
    private function connect(){
        try{
            $this->conn = new PDO("mysql:host={$this->dbhost};dbname={$this->dbname}",$this->dbuser,$this->dbpass);
        }catch (PDOException $ex){
            die("Houve um erro durante a conexão ao banco de dados: {$ex->getMessage()}");
        }
    }

    /** Executa ação no banco de dados
     * @param $query
     * @param array $data
     */
    private function execute($data = array()){
        $this->stmt  = $this->conn->prepare($this->query);
        return $this->stmt->execute($data);
    }
    public function getLastQuery(){
        echo $this->query;
        die();
    }

    /** Função responsavel por modificar a tabela que ira realizar operações no banco
     * @param $table
     */
    protected function setTable($table){
        $this->table = $table;
    }

    /** Query builder de inserção de dados no banco
     * @param array $data
     * @return integer
     */
    protected function insert($data = array()){
        /*
         * Criando query
         * */
        $query_fields = implode(",",array_keys($data));
        $query_values  = array_pad([],count($data),"?");
        $query_values = implode(",",$query_values );
        $values = array_values($data);

        $this->query = "INSERT INTO {$this->table}({$query_fields})VALUES({$query_values})";

        $this->execute($values);
        return $this->conn->lastInsertId();
    }

    /** Função responsável por realizar a ação de update no banco de dados
     * @param array $data
     * @param string $where
     * @return mixed
     */
    protected function update($data = array(),$where = null){
        $where = !empty($where) ? " WHERE {$where} " : "";
        $values = array_values($data);
        $query_fields = array_keys($data);
        $query_fields = implode("=?,",$query_fields)."=?";
        $this->query  = "UPDATE {$this->table} SET {$query_fields} {$where}";
        return $this->execute($values);
    }

    /**
     * Função responsável por deletar registros do banco de dados
     * @param string $where
     * @return mixed
     */
    protected function delete($where = null){
        $where = !empty($where) ? " WHERE {$where} " : "";
        $this->query = "DELETE FROM {$this->table} {$where}";
        return $this->execute();
    }
    protected function select($where = null,$args = array()){
        $where   = !empty($where) ? " WHERE {$where} " : "";
        $order = isset($args['order']) ? " ORDER BY {$args['order']} " : "";
        $limit = isset($args['limit']) ? " LIMIT {$args['limit']} " : "";
        $group = isset($args['group']) ? " GROUP BY {$args['group']} " : "";
        $fields = isset($args['fields']) ? $args['fields'] : "*";
        $join = isset($args['joins']) ? implode(" ", $args['joins']) : "";
        $this->query = "SELECT {$fields} FROM {$this->table} {$join} {$where}  {$group} {$order} {$limit}";
       $this->execute(null);
       if($this->stmt->rowCount() > 0){
           if(isset($args['unique']) && $args['unique'] === true){
               return array($this->stmt->fetch(PDO::FETCH_ASSOC));;
           }
           return $this->stmt->fetchAll(PDO::FETCH_ASSOC);;
       }
       return [];
    }
    protected function countRegisters($where = null,$args = array()){
        $where   = !empty($where) ? " WHERE {$where} " : "";
        $group = isset($args['group']) ? " GROUP BY {$args['group']} " : "";
        $fields = isset($args['fields']) ? $args['fields'] : "*";
        $join = isset($args['joins']) ? implode(" ", $args['joins']) : "";
        $this->query = "SELECT {$fields} FROM {$this->table} {$join} {$where}  {$group}";
        $this->execute(null);
        return $this->stmt->rowCount();
    }
}