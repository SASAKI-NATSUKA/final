<?php require 'db-connect.php'; ?>

<?php

    $pdo=new PDO($connect, USER, PASS);
    $id=$_POST['id'];
    $name=$_POST['name'];
    $bunrui=$_POST['bunrui'];
    $type1=$_POST['type1'];
    $type2=$_POST['type2'];
    $gr_name=$_POST['gr_name'];
    $jpg=$_POST['jpg'];

    $sql=$pdo->prepare('update Pokemon LEFT JOIN Type as t1 ON Pokemon.type1_id = t1.typeId JOIN Type as t2 ON Pokemon.type2_id = t2.typeId 
                        set name=?,bunrui=?, type1_id=?, type2_id=?, jpg=?
                        where id=?');

    if (empty($name)) {
        echo '商品名を入力してください。';
    
    // }else
    // if(empty($_POST['text'])){
    //     echo '商品説明を入力してください。';

    } else if(empty($bunrui)){
        echo '分類を記入してください';

    } else if(empty($type1)){
        echo 'タイプを選択してください';
    
    // }else
    // if(empty($_POST['pass'])){
    //     echo '商品画像パスを入力してください。';
    }else if ( $sql->execute([htmlspecialchars($name), ($bunrui), ($type1),($type2), ($id), ($jpg)])){
        echo '更新に成功しました。';
    }else {
        echo '更新に失敗しました。';
    }
    
?>
        <hr>
        <table>
<?php
// $sql=$pdo->prepare('select * from Pokemon where id=?');
// $sql->execute([$_POST['id']]);

// foreach ($sql as $row) {
//     echo '<tr>';
//     echo '<td>', $row['id'], '</td>';
//     echo '<td>', $row['name'], '</td>';
//     echo '<td>', $row['bunrui'], '</td>';
//     echo '<td>', $row['type'], '</td>';
//     echo '</tr>';
//     echo "\n";
// }

        echo '</table>';
        echo '<form action="update-input2.php" method="post">';
        echo '<input type="hidden" name="id" value="', $id, '">';
        echo '<button type="submit">戻る</button>';
        echo '</form>';

        echo '<form action="update-input.php" method="post">';
        echo '<input type="hidden" name="gr_name" value="', $gr_name, '">';
        echo '<button type="submit">更新一覧画面に戻る</button>';
        echo '</form>';
        ?>
        </div>
        <br>
        <link rel="stylesheet" href="../css/frame.css">
        <a href="menu.php">メニューに戻る</a>

</body>
</html>

