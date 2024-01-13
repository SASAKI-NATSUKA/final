<?php require 'db-connect.php'; ?>
<?php
    $pdo = new PDO($connect,USER,PASS);
    if (empty($_POST['name'])) {
        echo '名前を入力してください。';
    
    }else if(empty($_POST['id'])){
         echo 'IDを入力してください。';
         
    } else if(empty($_POST['bunrui'])){
        echo '分類を記入してください';

    } else if(empty($_POST['type1'])){
        echo 'タイプを選択してください';

    } else if(empty($_POST['gr_name'])){
        echo 'グループを入力してください';

    }else if(empty($_POST['jpg'])){
         echo '商品画像を入力してください。';

    }else if(isset($_POST['type2'])){
        $sql = $pdo->prepare('insert into Gr (gr_name) value (?)');
        $gr_name=$_POST['gr_name'];
        $sql->execute([$gr_name]);

        $sql = $pdo->prepare('insert into Pokemon (id,name,bunrui,type1_id,type2_id, jpg) value (?,?,?,?,?,?)');
        $gr_name=$_POST['gr_name'];
        $id=$_POST['id'];
        $name=$_POST['name'];
        $bunrui=$_POST['bunrui'];
        $type1=$_POST['type1'];
        $jpg=$_POST['jpg'];
        $sql->execute([$id,$name,$bunrui,$type1,$_POST['type2'],$jpg]);
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
