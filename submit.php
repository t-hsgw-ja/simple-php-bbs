<?php
include('define.php');


$db_type = DB;
$db_host = DB_HOST;
$db_name = DB_NAME;
$db_user = DB_USER;
$db_pass = DB_PASS;
$dsn = $db_type . ":dbname=" . $db_name . ";host=" . $db_host;

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);

    if ($pdo == null) {
        header('Location: /');
        exit();
    } else {
        if (count($_POST) > 0) {
            var_dump($_POST);
            print('<br>');
        }
        if (strlen($_POST['name']) > 0 || strlen($_POST['content']) > 0) {
            if (strlen($_POST['name']) > 0) {
                $name = htmlspecialchars($_POST['name']);
            } else {
                $name = null;
            }
            if (strlen($_POST['content']) > 0) {
                $content = htmlspecialchars($_POST['content']);
            } else {
                $content = null;
            }

            $sql = 'INSERT into posts (name, content) values (?, ?)';
            $stmt = $pdo->prepare($sql);
            $flag = $stmt->execute(array($name, $content));

            if ($flag) {
                header('Location: /');
                exit();
            } else {
                print('データの追加に失敗しました<br>');
            }
        } else {
            print('データの追加に失敗しました<br>');
        }
    }
} catch (PDOException $e) {
    print('Error:' . $e->getMessage());
    die();
    // header('Location: /');
    // exit();
}

// close database
$pdo = null;

?>