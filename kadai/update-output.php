<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">

    <title>Pokemon Data</title>
</head>
<body>

<?php
echo '<div class="bg-full">';

try{
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
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);


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
    }else{
        $sql->execute([$name, $bunrui, $type1,$type2,$jpg, $id]);
        echo '更新に成功しました。';
        
    }

    }catch (PDOException $e) {
    die("Error: " . $e->getMessage());
    }
    

        echo '<hr>';



        echo '<form action="update-input2.php" method="post">';
        echo '<input type="hidden" name="id" value="', $id, '">';
        echo '<button type="submit">戻る</button>';
        echo '</form>';

        echo '<form action="update-input.php" method="post">';
        echo '<input type="hidden" name="gr_name" value="', $gr_name, '">';
        echo '<button type="submit">更新一覧画面に戻る</button>';
        echo '</form>';
        ?>

        <br>
        <a href="menu.php">メニューに戻る</a>
</div>
