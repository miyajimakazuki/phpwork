?<?php
    require_once("common.php");
    $old_id = $_GET["id"];
    $member = $dbm->get_miyajima_table($old_id);
    $id = $member["id"];
    $name = $member["name"];
    $relationship = $member["relationship"];
    $age = $member["age"];
    show_top("情報更新");
    // show_edit_input_common($id, $name, $relationshop, $age, $old_id, $data, $button);
    show_bottom(true);
    // var_dump($dbm); // 配列の内容を表示
?>
