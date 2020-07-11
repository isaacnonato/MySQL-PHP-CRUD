<?php

class DB {

    protected static $host = "localhost";
    protected static $db = "db_isaac";
    protected static $user = "isaac";
    protected static $pass = "MaragaiaDrausio";
    protected static $charset = "utf8mb4";

    protected static $cont = null;

    public function __construct()
    {
        die("Init construction not allowed!");
    }

    public static function connect(): PDO
    {
        if (null == self::$cont) {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
            try {
                self::$cont = new PDO($dsn, self::$user, self::$pass);
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect() {
        self::$cont = null;
    }
}
