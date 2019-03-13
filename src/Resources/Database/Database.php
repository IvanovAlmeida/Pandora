<?php
namespace App\Resources\Database;

class Database
{
    /**
     * @var \PDO
     */
    protected static $db;

    /**
     * Database constructor.
     */
    private function __construct()
    {
        $dbConfig = include_once __DIR__ . '/../AppConfig.php';

        $host   = $dbConfig['database']['host'];
        $dbname = $dbConfig['database']['dbname'];
        $user   = $dbConfig['database']['user'];
        $pass   = $dbConfig['database']['pass'];
        $driver = $dbConfig['database']['driver'];

        try{
            switch($driver){
                case 'pgsql':
                    self::$db = new \PDO("pgsql:dbname={$dbname};user={$user}; password={$pass};host=$host");
                    break;
                case 'mysql':
                    self::$db = new \PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
                    break;
                case 'sqlite':
                    self::$db = new \PDO("sqlite:{$dbname}");
                    break;
                case 'ibase':
                    self::$db = new \PDO("firebird:dbname={$dbname}", $user, $pass);
                    break;
                case 'oci8':
                    self::$db = new \PDO("oci:dbname={$dbname}", $user, $pass);
                    break;
                case 'mssql':
                    self::$db = new \PDO("mssql:host={$host},1433;dbname={$dbname}", $user, $pass);
                    break;
            }
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e){
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    /**
     * @return \PDO
     */
    public static function open(){
        if(!self::$db){
            new Database();
        }
        return self::$db;
    }
}