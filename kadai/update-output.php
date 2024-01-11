<?php require 'db-connect.php'; ?>

<?php
    $pdo=new PDO($connect, USER, PASS);
    $id=$_POST['id'];
    $name=$_POST['name'];
    $bunrui=$_POST['bunrui'];
    $type1=$_POST['type1'];
    $gr=$_POST['gr'];

    $sql=$pdo->prepare('update Pokemon set name=?,bunrui=?, type1=?, grId=? where id=?');

    if (empty($name)) {
        echo '商品名を入力してください。';
    
    // }else
    // if(empty($_POST['text'])){
    //     echo '商品説明を入力してください。';

    } else if (!preg_match('/[0-9]+/', $id)) {
        echo '番号を整数で入力してください。';

    } else if(empty($bunrui)){
        echo '分類を記入してください';

    } else if(empty($type1)){
        echo 'タイプを選択してください';
    
    // }else
    // if(empty($_POST['pass'])){
    //     echo '商品画像パスを入力してください。';
    }else if(isset($_POST['type2'])){
        $sql=$pdo->prepare('update Pokemon set name=?,bunrui=?, type1=?, type2=?,grId=? where id=?');
        $sql->execute([htmlspecialchars($name), ($bunrui), ($type1),($_POST['type2']), ($gr), ($id)]);
        echo '更新に成功しました。';
    }else if (enpty($_POST['type2'])){
        $sql->execute([htmlspecialchars($name), ($bunrui), ($type), ($gr),($id)]);
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
        echo '<input type="hidden" name="id" value="', $_POST['id'], '">';
        echo '<button type="submit">戻る</button>';
        echo '</form>'
        ?>

        <form action="update-input.php" method="post">
        <button type="submit">更新一覧画面に戻る</button>
        </form>
        </div>
        <a href="menu.php">メニューに戻る</a>
</body>
</html>

