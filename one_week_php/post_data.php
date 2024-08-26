<?php
    require_once("common.php");
    if (isset($_POST["data"])) {
        // ポストで送られたデータ取得
        if(isset($_POST["id"])) {
            $id = $_POST["id"];
        }
        if(isset($_POST["name"])) {
            $id = $_POST["name"];
        }
        if(isset($_POST["relationship"])) {
            $id = $_POST["relationship"];
        }
        if(isset($_POST["age"])) {
            $id = $_POST["age"];
        }
        // データ挿入処理
        if ($_POST["data"]=="create") {
            if (check_input($id, $name, $relationship, $age, $error) == false) {
                header("Location: miyajima_input.php?error={$error}");
                exit();
            }
            if ($dbm->if_id_exists($id) == true) {
                $error = "すでに使用されているIDです";
                header("Location: miyajima_input.php?error={$error}");
                exit();
            }
            if ($dbm->insert_miyajima_table($id, $name, $relationship, $age) == false) {
                $error = "DBエラー";
                header("Location: miyajima_input.php?error={$error}");
                exit();
            }
            header("Location: index.php");
            exit();
        //データ更新処理 
        }else if ($_POST["data"] == "update") {
            if (check_input($id, $name, $relationship, $age, $error) == false) {
                $error = "DBエラー";
                header("Location: miyajima_update.php?error={$error}&id={$old_id}");
                exit();
            }
            if($dbm->if_id_exists($id) == true and $id != $old_id) {
                $error = "すでに使用されているIDです";
                header("Location: miyajima_update.php?error={$error}&id=($ild_id)");
                exit();
            }
            $dbm->update_miyajima_table($id, $name, $relationship, $age, $old_id);
            header("Location: index.php");
            exit();
        // データ削除処理
        } else if ($_POST["data"]  == "delete") {
            $id = $_POST["id"];
            echo $id. "<br>";
            if ($dbm->delete_miyajima_table($id) == false) {
                $error = "DBエラー";
                header("Location: miyajma_delete.php?error={$error}&id={$id}");
                exit();
            }
            header("Location: index.php");
            exit();
        } else{
            header("Location: index.php");
            exit();
        }
    }
?>