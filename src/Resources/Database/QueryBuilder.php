<?php
namespace App\Resources\Database;

use App\Model\Entity\User;
use \PDO;
use \PDOStatement;
use \Exception;

/**
 * Class QueryBuilder
 * @package App\Resources\Database
 * @method QueryBuilder table   (string $table)
 * @method QueryBuilder join    (string $join)
 * @method QueryBuilder fields  (array $fields)
 * @method QueryBuilder where   (array $where)
 * @method QueryBuilder order   (array $order)
 * @method QueryBuilder group   (array $group)
 * @method QueryBuilder having  (array $having)
 * @method QueryBuilder limit   (array $join)
 * @method QueryBuilder class   (string $class)
 */
class QueryBuilder
{
    /**
     * @var array
     */
    private $clausules = ['class' => 'stdClass'];
    /**
     * @var \PDO
     */
    private $conn;

    /**
     * @param array $options
     */
    public function __construct(){
        $this->conn = Database::open();
    }

    /**
     * @param $name
     * @param $arguments
     * @return $this
     */
    public function __call($name, $arguments)
    {
        $clausule = $arguments[0];
        if (count($arguments) > 1){
            $clausule = $arguments;
        }

        $this->clausules[strtolower($name)] = $clausule;
        return $this;
    }

    /**
     * @param array $values
     * @return string
     */
    public function insert($values)
    {
        //recupera o nome da table
        //ou deixa uma marcação para mostrar que falteou informar esse campo

        $table = isset($htis->clausules['table']) ? $this->clausules['table'] : '<table>';

        //recupera o array dos campos
        //ou deixa uma marcação para mostrar que faltou informar esse campo
        $_fields = isset($htis->clausules['fields']) ? $this->clausules['fields'] : '<fields>';
        $fields = implode(', ', $_fields);

        //cria uma lista de róyolos para usar "prepared statement"
        $_placeholders = array_map(function (){
            return '?';
        }, $_fields);
        $placeholders = implode(', ', $_placeholders);

        $command = [];
        $command[] = 'INSERT INTO';
        $command[] = $table;
        $command[] = '(' . $fields . ')';
        $command[] = 'VALUES';
        $command[] = '(' . $placeholders . ')';

        //INSERT INTO {tbale} ({fields}) VALUES ({values});
        //junta com o comando
        $sql = implode(' ', $command);

        return $this->executeInsert($sql, $values);
    }

    /**
     * @param array $values
     * @return array
     */
    public function select($values = []) {
        //recupera o nome da table
        //ou deixa uma marcação para mostrar que faltou informar esse campo
        $table = isset($this->clausules['table']) ? $this->clausules['table'] : '<table>';

        //recupera o array doc campos
        //ou deixa uma marcação para mostrar que faltou informar esse campo
        $fields = '*';
        if(isset($this->clausules['fields'])){
            $_fields = $this->clausules['fields'];
            $fields = implode(', ', $_fields);
        }

        $join = isset($this->clausules['join']) ? $this->clausules['join'] : '';

        $command = [];
        $command[] = 'SELECT ';
        $command[] = $fields;
        $command[] = ' FROM ';
        $command[] = $table;

        if($join) {
            $command[] = $join;
        }

        $clausules = [
            'where' => [
                'instruction' => 'WHERE',
                'separator' => ' ',
            ],
            'group' => [
                'instruction' => 'GROUP BY',
                'separator' => ', ',
            ],
            'order' => [
                'instruction' => 'ORDER BY',
                'separator' => ', ',
            ],
            'having' => [
                'instruction' => 'HAVING',
                'separator' => ' AND ',
            ],
            'limit' => [
                'instruction' => 'LIMIT',
                'separator' => ', ',
            ],
        ];

        foreach($clausules as $key => $clausule) {
            if(isset($this->clausules[$key])) {
                $value = $this->clausules[$key];
                if(is_array($value)) {
                    $value = implode($clausule['separator'], $this->clausules[$key]);
                }
                $command[] = $clausule['instruction'] . ' ' . $value;
            }
        }

        //SELECT {fields} FROM <JOIN> {table} <WHERE> <GROUP> <ORDER> <HAVING> <LIMIT>;
        //junta o comando
        $sql = implode(' ', $command);;

        return $this->executeSelect($sql, $values, $this->clausules['class']);
    }
    /**
     * @param $values
     * @param $filters
     * @return int
     */
    public function update($values, $filters = [])
    {
        // recupera o nome da tabela
        // ou deixa uma marcação para mostrar que faltou informar esse campo
        $table = isset($this->clausules['table']) ? $this->clausules['table'] : '<table>';
        $join = isset($this->clausules['join']) ? $this->clausules['join'] : '';
        // recupera o array dos campos
        // ou deixa uma marcação para mostrar que faltou informar esse campo
        $_fields = isset($this->clausules['fields']) ? $this->clausules['fields'] : '<fields>';
        $sets = $_fields;
        if (is_array($_fields)) {
            $sets = implode(', ', array_map(function($value) {
                return $value . ' = ?';
            }, $_fields));
        }
        $command = [];
        $command[] = 'UPDATE';
        $command[] = $table;
        if ($join) {
            $command[] = $join;
        }
        $command[] = 'SET';
        $command[] = $sets;
        $clausules = [
            'where' => [
                'instruction' => 'WHERE',
                'separator' => ' ',
            ]
        ];
        foreach($clausules as $key => $clausule) {
            if (isset($this->clausules[$key])) {
                $value = $this->clausules[$key];
                if (is_array($value)) {
                    $value = implode($clausule['separator'], $this->clausules[$key]);
                }
                $command[] = $clausule['instruction'] . ' ' . $value;
            }
        }
        // UPDATE {table} SET {set} <WHERE>
        // junta o comando
        $sql = implode(' ', $command);
        return $this->executeUpdate($sql, array_merge($values, $filters));
    }
    /**
     * @param $filters
     * @return int
     */
    public function delete($filters)
    {
        // recupera o nome da tabela
        // ou deixa uma marcação para mostrar que faltou informar esse campo
        $table = isset($this->clausules['table']) ? $this->clausules['table'] : '<table>';
        $join = isset($this->clausules['join']) ? $this->clausules['join'] : '';
        $command = [];
        $command[] = 'DELETE FROM';
        $command[] = $table;
        if ($join) {
            $command[] = $join;
        }
        $clausules = [
            'where' => [
                'instruction' => 'WHERE',
                'separator' => ' ',
            ]
        ];
        foreach($clausules as $key => $clausule) {
            if (isset($this->clausules[$key])) {
                $value = $this->clausules[$key];
                if (is_array($value)) {
                    $value = implode($clausule['separator'], $this->clausules[$key]);
                }
                $command[] = $clausule['instruction'] . ' ' . $value;
            }
        }
        // DELETE FROM {table} <JOIN> <USING> <WHERE>
        // junta o comando
        $sql = implode(' ', $command);
        return $this->executeDelete($sql, $filters);
    }

    /**
     * @param $sql
     * @return bool|PDOStatement
     */
    private function statement($sql){
        return $this->conn->prepare($sql);
    }

    /**
     * @param $sql
     * @param $values
     * @return string|null
     */
    private function executeInsert($sql, $values)
    {
        $statement = $this->statement($sql);
        if($statement && $statement->execute(array_values($values))){
            return $this->conn->lastInsertId();
        }
        return null;
    }

    /**
     * @param $sql
     * @param $values
     * @param string $class
     * @return array|null
     */
    private function executeSelect($sql, $values, $class = 'stdClass')
    {
        $statement = $this->statement($sql);
        if($statement && $statement->execute(array_values($values))){
            return $statement->fetchAll(PDO::FETCH_CLASS, $class);
        }
        return null;
    }

    /**
     * @param $sql
     * @param $values
     * @return int|null
     */
    private function executeUpdate($sql, $values)
    {
        return $this->execute($sql, $values);
    }
    /**
     * @param $sql
     * @param $values
     * @return int
     */
    private function executeDelete($sql, $values)
    {
        return $this->execute($sql, $values);
    }

    /**
     * @param string $sql
     * @param array $values
     * @return int|null
     */
    private function execute(string $sql, array $values){
        $statement = $this->statement($sql);
        if ($statement && $statement->execute(array_values($values))) {
            return $statement->rowCount();
        }
        return null;
    }
}