<?php
class Database {
    /**
     * @var mysqli
     */
    private mysqli $connection;

    public function __construct() {
        $configFile = '..' . DIRECTORY_SEPARATOR . '.conf';
        $config = parse_ini_file($configFile);                                  //парсит файл и возвращает асоц массив
        $this->connection = new mysqli(
            $config['DB_HOST'],
            $config['DB_USER'],
            $config['DB_PASS'],
            $config['DB_NAME']
        );
        if ($this->connection->connect_error) {                                 //проверка на ошибку
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
    /**
     * @param string $sql
     * @return mixed
     */
    public function query(string $sql) {
        return $this->connection->query($sql);                                  //выполняет запрос
    }
    /**
     * @param string $value
     * @return string
     */
    public function escape(string $value): string {
        return $this->connection->real_escape_string($value);                   //экранирует спец символы
    }
}