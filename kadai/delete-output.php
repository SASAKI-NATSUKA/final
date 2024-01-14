<link rel="stylesheet" href="../css/frame.css">

<?php require 'db-connect.php'; ?>

<?php
echo '<div class="bg-full">';

    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from Pokemon where id=?');
    if($sql->execute([$_POST['id']])){
        $gr_name=$_POST['gr_name'];
        echo '削除に成功しました。';
    }else {
        $grId=$_POST['grId'];
        echo '削除に失敗しました。';
    }
    echo '<hr>';



    echo '<form action="delete-input.php" method="post">';
    echo '<input type="hidden" name="gr_name" value="', $gr_name, '">';
    echo '<button type="submit">削除一覧画面に戻る</button>';
        echo '</form>';

?>
        <a href="menu.php">メニューに戻る</a>
</div>