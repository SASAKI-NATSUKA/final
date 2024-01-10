<?php require 'db-connect.php'; ?>
<?php
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->prepare('insert into Pokemon (id,name,bunrui,type1,gr) value (?,?,?,?)');
    if (empty($_POST['name'])) {
        echo '商品名を入力してください。';
    
    }else if(empty($_POST['id'])){
         echo 'IDを入力してください。';

    // } else if (!preg_match('/[0-9]+/', $id)) {
    //     echo '整数で入力してください。';

    } else if(empty($_POST['bunrui'])){
        echo '分類を記入してください';

    } else if(empty($_POST['type1'])){
        echo 'タイプを選択してください';
    
    // }else
    // if(empty($_POST['pass'])){
    //     echo '商品画像パスを入力してください。';
    }else if(isset($_POST['type2'])){
        $sql = $pdo->prepare('insert into Pokemon (id,name,bunrui,type1,type2,gr) value (?,?,?,?,?)');
        $sql->execute([$id,$name,$bunrui,$type1,$_POST['type2']]);
        echo '追加に成功しました。';
    }else if(empty($_POST['type2'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $bunrui=$_POST['bunrui'];
        $type1=$_POST['type1'];
        $gr=$_POST['gr'];
        $sql->execute([$id,$name,$bunrui,$type1$gr,]);
        echo '追加に成功しました。';

    }else {
        echo '追加に失敗しました';
    }
    echo '<hr>';
?>
  <form action="insert-input.php" method="post">
        <button type="submit">追加一覧画面に戻る</button>
        </form>
        <a href="menu.php">メニューに戻る</a>
