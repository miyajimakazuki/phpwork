<?php
    class DBManager {
        // データベースアクセス情報
        private $access_info;
        private $user;
        private $password;
        private $db = null;
        // コンストラクタ
        function __construct() {
            $this -> access_info = "mysql:host = localhost; dbname = miyajma";
            $this -> user = "root";
            $this -> password = "root";
            var_dump($user);
        }
    
    // データベースへの接続
    private function connect(){
        $this->db = new PDO($this->access_info, $this->user, $this->password);
    } 
    // データベースの接続解除
    private function disconnect(){
    $this->db= null;
    }
    // 一覧の取得
    function get_allmiyajima_tables() {
        try {
            $this -> connect();
            $stmt = $this->db->prepare("SELECT * FROM miyajima_table ORDER BY id;");
            $res = $stmt->execute();
            if($res) {
                $member = $stmt->fetchAll();
                $this->disconnect();
                return $member;
            }
            }catch(PDOException $e) {
                $this->disconnect();
                return null;
            }
            $this->disconnect();
            return null;
        }
// 特定の人
        function get_miyajima_table($id) {
            try {
                $this->connect();
                $stmt = $this->db->prepare("SELECT * FROM miyajima_table WHERE id = ?;");
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $res = $stmt-> execute();
                if($res) {
                    $member = $stmt->fetchAll();
                $this->disconnect();
                if (count ($member) == 0) {   
                
                return null;
                }
                return $member[0];
            }
        } catch(PDOException $e) {
            $this->disconnect();
            return null;
        }
        $this->disconnect();
        return null;
    }
    // idで指定した情報があるか調べる
    function if_id_exists($id) {
        if($this->get_miyajima_table($id) != null) {
            return true;
        }
        return false;
    }
    // 全情報を挿入
    function insert_miyajima_table($id, $name, $relatiionship, $age) {
        try {
            $this->connect();
            $stmt = $this->db->prepare("INSERT INTO miyajima_table VALUES (?, ?, ?. ?);");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->bindParam(2, $name, PDO::PARAM_STR);
            $stmt->bindParam(3, $relatiionship, PDO::PARAM_STR);
            $stmt->bindParam(4, $age, PDO::PARAM_INT);
            $res = $stmt->execute();
            $this->disconnect();
            return true;
        }catch(PDOException $e) {
            $this->disconnect();
            return false;
        }
        $this->disconnect();
        return false;
    }
    //情報の削除
    function delete_miyajima_tabe($id) {
        try {
            $this->connect();
            $stmt = $this->db->prepare("DELETE FROM student WHERE id = ?;");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $res = $stmt->execute();
            $this->disconnect();
            return true;
        }catch(PDOException $e) {
            $this->disconnect();
            return false;
        }
    }

    // 情報の更新
    function update__miyajima_table($id, $name, $relatiionship, $age, $old_id) {
        try {
            $this->connect();
            $stmt = $this->db->prepare("UPDATE student SET id = ?, neme = ?, 
            relationship = ?, age = ? WHERE id = ? ;");
             $stmt->bindParam(1, $id, PDO::PARAM_INT);
             $stmt->bindParam(2, $name, PDO::PARAM_STR);
             $stmt->bindParam(3, $relatiionship, PDO::PARAM_STR);
             $stmt->bindParam(4, $age, PDO::PARAM_INT);
             $stmt->bindParam(5, $old_id, PDO::PARAM_INT);
             $res = $stmt->execute();
             return true;
        }catch(PDOException $e) {
            $this->disconnect();
            return false;
        }
        $this->disconnect();
        return false;
    }
}

?>