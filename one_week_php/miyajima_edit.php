<?php
    require_once ("common.php");
    $id = $_GET["id"];
    $member = $dbm->get_miyajima_table($id);
    show_top("選択情報");
    show_miyajima_table($member);
    show_operations($id);
    show_bottom(true);
?>