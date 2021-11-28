<?php
include('define.php');
date_default_timezone_set('Asia/Tokyo');

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
        $sql = 'SELECT * FROM posts ORDER BY created_at DESC';
        $stmt = $pdo->prepare($sql);
        $res = $stmt->execute();

        if ($res) {
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // echo '<pre>';
            // var_dump($rows);
            // echo '</pre>';
            foreach ($rows as $row) {
                $html = '';
                $html .= '<article id="post-' . $row['id'] . '" class="post">';
                if ($row['name'] !== null) {
                    $html .=    '<p class="post__author">投稿者：' . $row['name'] . '</p>';
                }
                $html .=    '<div class="post__content">' . nl2br($row['content']) . '</div>';
                $formed_date = strtotime($row['created_at']);
                $html .=    '<p class="tar"><time class="post__date">投稿日時：' . date('Y.m.d H時i分', $formed_date) . '</time></p>';
                $html .= '</article>';
                echo $html;
            }
            // $html = '';
            // $html .= '<article id="post-' . $rows['id'] . '">';
            // $html .= '<p class="author">' . $rows['name'] . '</p>';
            // $html .= '<div class="content">' . $rows['content'] . '</div>';
            // $html .= '<p><time>' . $rows['created_at'] . '</time></p>';
            // $html .= '</article>';
            // echo $html;
        } else {
            print('データの読込に失敗しました<br>');
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