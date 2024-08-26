<?php
    function check_input($id, $name, $relationship, $age, &$error) {
        $error = "";
    // 空欄がないか確認　
    if($id === "" or $name === "" or $relationship === "" or $age === "") {
        $error = "入力されていない値があります";
        return false;
    }
    return true;
    }
?>
