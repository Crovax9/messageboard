<?php
session_start();
    // MySQLサーバ接続に必要な値を変数に代入
    $username = 'root';
    $password = '';

    // PDO のインスタンスを生成して、MySQLサーバに接続
    $database = new PDO('mysql:host=localhost;dbname=messageboard;charset=UTF8;', $username, $password);

    // フォームから書籍タイトルが送信されていればデータベースに保存する

    if($_POST['submit_add_message'])
    {
        if ($_POST['title']) {
            $sql = 'INSERT INTO board (title, message) VALUES(:title, :message)';
            $statement = $database->prepare($sql);
            $statement->bindParam(':title', $_POST['title']);
            $statement->bindParam(':message', $_POST['message']);
            $statement->execute();
            $statement = null;
        }
    }
    else if($_POST['submit_modify_message'])
    {
    
        $sql = 'UPDATE board SET title = :title, message = :message WHERE id = :id';
        $statement = $database->prepare($sql);
        $statement->bindParam(':id', $_POST['id']);
        $statement->bindParam(':title', $_POST['title']);
        $statement->bindParam(':message', $_POST['message']);
        $statement->execute();
        $statement = null;
    }
    if($_GET['title'])
    {
        $sql = 'DELETE FROM board WHERE id=:id';
        $statement = $database->prepare($sql);
        $statement->bindParam(':id', $_GET['title']);
        $statement->execute();
        $statement = null;
    }
    
    // 実行するSQLを作成
    $sql = 'SELECT * FROM board ORDER BY created_at DESC';
    // SQL を実行する直前のステートメントを取得する
    $statement = $database->query($sql);
    // ステートメントから SQL を実行し、レコードを取得する
    $records = $statement->fetchAll();

    // ステートメントを破棄する
    $statement = null;
    // MySQLを使った処理が終わると、接続は不要なので切断する
    $database = null;
    
    $_SESSION["record"] = $records;

    Header("Location:https://76e077fb831b49a59dcb90031718cd8f.vfs.cloud9.us-east-2.amazonaws.com/messageBoard/messageboard.php"); 
?>

