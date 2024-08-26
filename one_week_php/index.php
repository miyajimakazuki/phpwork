<?php
    require_once("common.php");
    show_top();
    // リスト表示
    $member = $dbm->get_allmiyajima_tables();
    if ($member != null) {
        show_miyajima_table_list($member);
    }
    // var_dump($dbm);
    print_r($member);

    echo "<a href=\"miyajima_input.php\">新しい宮島情報の追加</a>";
    show_bottom();
?>