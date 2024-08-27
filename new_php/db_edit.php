<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>かんたんデータベース操作</title>
    </head>
    <body>
        <header>
            <h1>編集モード</h1>
        </header>
        <!-- DBに関する処理はここでは行わないこと -->
         <main>

<?php
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DSN', 'mysql:host=localhost; dbname=miyajma; charset=utf8');

function db_connect(){
    $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
    return $dbh;
    $all = $dbh->get_miyajima_table($old_id);
    $id = $all["id"];
    $name = $all["name"];
    $relationship = $all["relationship"];
    $age = $all["age"];
}


try {
    // データベースに接続
    $dbh = db_connect();

    //例外処理を投げるようにする（throw）
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // データベースから値を取ってきたり、 データを挿入したりする処理 
    $statement = $dbh->query('SELECT * FROM miyajima_table');      // 例

    $res = $statement ->execute();

    if ($res) {
        $all = $statement ->fetchAll();
    

// HTML下部表示
function show_bottom($return_top = false) {
    if($return_top == true) {
        echo <<<BACK_TOP
            <a href="db_connect.php">宮島に戻る</a>
            BACK_TOP;
    }
    echo <<<BOTTOM
     </body>
 </html>
BOTTOM;
}
function show_miyajima_table($all){
    var_dump($all);
    echo <<<MIYAJIMA
    <table border="1" style="border-collapse:collapse">
        <tr>
            <th>宮島ナンバー</th><th width="100px">名前</th><th>続柄</th><th>年齢</th>
        </tr>
        <tr align="center">
            <td>{$all}</td>
            <td>{$all["name"]}</td>
            <td>{$all["relationship"]}</td>
            <td>{$all["age"]}</td>
        </tr>
    </table>
    <br>
MIYAJIMA;
}

    // require_once ("common.php");
    $id = $_GET["id"];
    // $all = $dbm->get_miyajima_table($id);
    show_miyajima_table($all);
    // show_operations($id);
    show_bottom(true);

    // $statement = null;
    // $dbh = null;
            }
        }

        catch (PDOException $e) {
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        // エラー内容は本番環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
        exit($e->getMessage()); 
        echo "データベース接続失敗<br>";
        echo $e->getMessage();
    }
?>