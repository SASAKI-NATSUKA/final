<link rel="stylesheet" href="../css/frame.css">
<?php require 'db-connect.php'; ?>
<?php
    echo '<div class="bg-full">';
    $pdo = new PDO($connect,USER,PASS);

    if (empty($_POST['name'])) {
        echo '名前を入力してください。';
    
    }else if(empty($_POST['id'])){
         echo 'IDを入力してください。';
         
    } else if(empty($_POST['bunrui'])){
        echo '分類を記入してください';

    } else if(empty($_POST['type1'])){
        echo 'タイプを選択してください';

     } else if(!(isset($_POST['gr_name']))){
        echo 'グループまたは、チェックボックスを入力してください';
    

    }else if(empty($_POST['jpg'])){
         echo '商品画像を入力してください。';

    }else if(strlen($_POST['gr_name']) > 0){
        $grId=$_POST['grId'];
        $id=$_POST['id'];
        $name=$_POST['name'];
        $bunrui=$_POST['bunrui'];
        $type1=$_POST['type1'];
        $type2=$_POST['type2'];
        $jpg=$_POST['jpg'];
        // $group = $_POST['gr'];
    
        $sql = $pdo->prepare('insert into Gr (gr_name) value (?)');
        $gr_name=$_POST['gr_name'];
        $sql->execute([$gr_name]);

        $sql2=$pdo->prepare('select  grId from Gr where gr_name=?');
        $sql2->execute([$gr_name]);
        foreach ($sql2 as $row){
            $grId=$row['grId'];
        }


        $sql3 = $pdo->prepare('insert into Pokemon (id,name,bunrui,type1_id,type2_id,gr_Id, jpg) value (?,?,?,?,?,?,?)');
        $sql3->execute([$id,$name,$bunrui,$type1,$type2,$grId,$jpg]);
         echo '追加に成功しました。';

    }else if(strlen($_POST['gr_name']) <= 0 ){
        $grId=$_POST['grId'];
        $id=$_POST['id'];
        $name=$_POST['name'];
        $bunrui=$_POST['bunrui'];
        $type1=$_POST['type1'];
        $type2=$_POST['type2'];
        $jpg=$_POST['jpg'];
    
        $sql = $pdo->prepare('insert into Pokemon (id,name,bunrui,type1_id,type2_id, gr_Id, jpg) value (?,?,?,?,?,?,?)');
      
        $sql->execute([$id,$name,$bunrui,$type1,$type2,$grId,$jpg]);
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
            </div>
        
</body>
</html>
