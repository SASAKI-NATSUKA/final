<?php require 'db-connect.php'; ?>

<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from Pokemon where id=?');
    if($sql->execute([$_POST['id']])){
        echo '削除に成功しました。';
    }else {
        echo '削除に失敗しました。';
    }
    echo '<hr>';


?>
        <form action="delete-input.php" method="post">
        <button type="submit">削除一覧画面に戻る</button>
        </form>
        <a href="menu.php">メニューに戻る</a>
