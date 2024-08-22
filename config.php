 <?php
    $host = 'alfama_web_db';
    $port = 3306;
    $dbname = 'alfama';
    $username = "root";
    $password = "password";

    try {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
