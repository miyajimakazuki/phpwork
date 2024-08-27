
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>かんたんデータベース操作</title>
    </head>
    <body>
        <header>
            <h1>宮島のテーブル（miyajma/miyajima_table）</h1>
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
            }


            try {
                // データベースに接続
                $dbh = db_connect();

                //例外処理を投げるようにする（throw）
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // データベースから値を取ってきたり、 データを挿入したりする処理 
                $statement = $dbh->query('SELECT * FROM miyajima_table');      // 例
            
                $res = $statement ->execute();
                // $all = $statement->fetchAll();

                if ($res) {
                    $all = $statement ->fetchAll();
                    echo <<<TABLE_TOP
                    <table border="1" style="border-collapse:collapse">
                    <tr>
                        <th>宮島ナンバー</th><th width="100px">名前</th><th>続柄</th><th>年齢</th>
                    </tr>
                    TABLE_TOP;
                    foreach ($all as $loop) {
                    // ヒアドキュメントで表示
                    echo <<<END
                    <tr align="center">
                        <td>{$loop["id"]}</td>
                        <td><a href= "db_edit.php?id={$loop["id"]}">{$loop["name"]}</a></td>
                        <td>{$loop["relationship"]}</td>
                        <td>{$loop["age"]}</td>
                    </tr>
                    END;
                    }
            // テーブル下部分の表示
            echo <<<TABLE_BOTTOM
            </table>
            <br>
            TABLE_BOTTOM;
            
                }
                //データベース接続切断
            $statement = null;
            $dbh = null;
                }

             catch (PDOException $e) {
                header('Content-Type: text/plain; charset=UTF-8', true, 500);
                // エラー内容は本番環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
                exit($e->getMessage()); 
                echo "データベース接続失敗<br>";
                echo $e->getMessage();
            }

            ?>

        </main>
        <hooter>

        </hooter>
    </body>
</html>
