<?php
class Database {
    private static $pdo = null;

    public static function getConnection() {
        if (self::$pdo == null) {
            $host = getenv('DB_HOST') ?: 'db.rxxrpqnskeetxgfinbbb.supabase.co';
            $port = getenv('DB_PORT') ?: '5432';
            $dbname = getenv('DB_NAME') ?: 'postgres';
            $user = getenv('DB_USER') ?: 'postgres';
            $password = getenv('DB_PASS') ?: 'AlejandroObando23.';

            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

            try {
                self::$pdo = new PDO($dsn, $user, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (PDOException $e) {
                die("Error de conexión a la base de datos: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
