<?php

namespace Leomarqz\Encuestas\Model;

use PDO;
use PDOException;

class Database
{
    private string $host;
    private string $db;
    private string $user;
    private string $password;
    private string $charset;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->db = 'encuestas';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';
    }


    public function connect()
    {
        $pdo = null;
        try {
            $urlConnection = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            );
            $pdo = new PDO($urlConnection, $this->user, $this->password, $options);
        } catch (PDOException $ex) {
            print_r('Error en connecion: --> ' . $ex->getMessage());
        }
        return $pdo;
    }


}

?>