<?php
// HTML上部表示
function show_top($heading="宮島") {
    echo <<<miyajima_table
    <html>
        <head>
        <title>みやじま</title>
        </head>
        <body>
        <h1>{$heading}</h1>
miyajima_table;
    }
// HTML下部表示
function show_bottom($return_top = false) {
    if($return_top == true) {
        echo <<<BACK_TOP
            <a href="index.php">一覧に戻る</a>
            BACK_TOP;
    }
    echo <<<BOTTOM
     </body>
 </html>
BOTTOM;
}
// 入力フォームの表示
function show_input() {
    $error = get_error();
    show_edit_input_common("", "" , "" , -1, "", "create", "登録");
}
//  削除フォームの表示
function show_delete($member) {
    if ($member != null) {
        show_miyajima_table($member);
    }
    $error = "";
    $error = get_error();
    echo <<<DELETE
        <form action="post_data.php" method="post">
            <p>この情報を削除しますか？</P>
            <p>{$error}</p>
            <input type="hidden" name="id" value="{$member["id"]}"/>
            <input type="hidden" name="data" value="delete"/>
            <input type="submit" value="削除">
        </form>
DELETE;
}
// 更新フォームの表示
function show_update($id, $name, $relationship, $age, $old_id) {
    show_edit_input_common($id, $name, $relationship, $age, $old_id, "update", "更新");
}
// 挿入フォーム・更新フォームの表示
function show_edit_input_common($id, $name, $relationshop, $age, $old_id, $data, $button) {
    $error = "";
    $error = get_error();
    // フォームの上部を表示
    echo <<<INPUT_TOP
    <form action = "post_data.php" method="post">
    <p>宮島ナンバー</p>
    <input type="text" name="id" placeholder="例）1" value="{$id}">
    <p>名前</p>
    <input type="text" name="name" placeholder="例）みやじま" value="{$name}">
    <p>続柄</p>
    <input type="text" name="relationship" placeholder="例）子" value="{$relationshop}">
    <p>年齢</p>
    <select name="$age">
INPUT_TOP;
// optionタグの表示（選択でselected）
for ($i = 1;$i <=100; $i++) {
    echo "<option value=\"{$i}\"";
    if ($i == $age) {
        echo "selected";
    }
    echo ">" ;
    echo $i;
    echo "</option>";
}
// フォーム下部を表示
echo <<<INPUT_BOTTOM
    </select>
    <p>{$error}</p>
    <input type = "hidden" name="old_id" value="{$old_id}">
    <input type = "hidden" name="data" value="{$data}">
    <input type = "submit" value="{$button}">
</form>
INPUT_BOTTOM;
}
// 一覧を表示
function show_miyajima_table_list($member){
echo <<<TABLE_TOP
<table border="1" style="border-collapse:collapse">
<tr>
    <th>宮島ナンバー</th><th width="100px">名前</th><th>続柄</th><th>年齢</th>
</tr>
TABLE_TOP;
foreach ($member as $loop) {
// ヒアドキュメントで表示
echo <<<END
        <tr align="center">
            <td>{$loop["id"]}</td>
            <td><a href= "miyajima_edit.php?id={$loop["id"]}">{$loop["name"]}</a></td>
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
// 特定の情報を表示 
function show_miyajima_table($member){
    echo <<<MIYAJIMA
    <table border="1" style="border-collapse:collapse">
        <tr>
            <th>宮島ナンバー</th><th width="100px">名前</th><th>続柄</th><th>年齢</th>
        </tr>
        <tr align="center">
            <td>{$member["id"]}</td>
            <td>{$member["name"]}</td>
            <td>{$member["relationship"]}</td>
            <td>{$member["age"]}</td>
        </tr>
    </table>
    <br>
MIYAJIMA;
}
// 編集画面の操作一覧
function show_operations($id) {
    echo <<<OPERATIONS
    <a href="miyajima_update.php?id={$id}">情報の更新</a>
    <a href="miyajima_delete.php?id={$id}">情報の削除</a>
    <br>
    <br>
    OPERATIONS;
}

?>