<?php
namespace db;

use PDO;

class DataSource
{
    private $conn;
    private $sqlResult;
    public $lastInsertId;
    public const CLS = 'cls';

    public function __construct($host = DB_HOST, $port = DB_PORT, $dbName = DB_NAME, $username = DB_USER, $password = DB_PASSWORD)
    {
        $dsn = "mysql:host={$host};port={$port};dbname={$dbName};";
        $this->conn = new PDO($dsn, $username, $password);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public function select($sql = "", $params = [], $type = '', $cls = '')
    {
        $stmt = $this->executeSql($sql, $params);

        if ($type === static::CLS) {
            return $stmt->fetchAll(PDO::FETCH_CLASS, $cls);
        } else {
            return $stmt->fetchAll();
        }
    }

    public function execute($sql = "", $params = [], $set_lastInsertId = '')
    {
        $this->executeSql($sql, $params, $set_lastInsertId);
        return  $this->sqlResult;
    }

    public function selectOne($sql = "", $params = [], $type = '', $cls = '')
    {
        $result = $this->select($sql, $params, $type, $cls);
        return count($result) > 0 ? $result[0] : false;
    }

    public function begin()
    {
        $this->conn->beginTransaction();
    }

    public function commit()
    {
        $this->conn->commit();
    }

    public function rollback()
    {
        $this->conn->rollback();
    }

    private function executeSql($sql, $params, $set_lastInsertId = null)
    {
        $stmt = $this->conn->prepare($sql);
        $this->sqlResult = $stmt->execute($params);
        if ($set_lastInsertId) {
            $this->lastInsertId = $this->conn->lastInsertId();
        }

        return $stmt;
    }

    public function get_lastInsertId()
    {
        return $this->lastInsertId;
    }
}
