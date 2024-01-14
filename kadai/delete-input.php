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


echo '<table>';

try {
    // データベースに接続
    $pdo=new PDO($connect, USER, PASS);
 
    // エラーモードを例外に設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // Pokemon テーブルと Type テーブルをLEFT JOINしてデータを取得
    $query = $pdo->prepare("SELECT Pokemon.ID, Pokemon.name, Pokemon.bunrui, Pokemon.jpg, Pokemon.type1_id, Pokemon.type2_id, Type.type_name AS type1_name, Type2.type_name AS type2_name, Gr.grId, Gr.gr_name
                            FROM Pokemon
                            LEFT JOIN Type ON Pokemon.type1_id = Type.typeId
                            LEFT JOIN Type AS Type2 ON Pokemon.type2_id = Type2.typeId
                            LEFT JOIN Gr ON Pokemon.gr_Id = Gr.grId where gr_name=?" );
    $query->execute([$_POST['gr_name']]);
   
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
 
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
 
?>
 

 <?php
    echo '<h2>グループ',$_POST['gr_name'],'</h2>';
    ?>
    <table id="table" align="center" border="1">
        <tr>
            <th>写真</th>
            <th>グループ</th>
            <th>ID</th>
            <th>名前</th>
            <th>分類</th>
            <th>Type 1</th>
            <th>Type 2</th>
          
        </tr>
        <?php foreach ($result as $row): ?>
            <tr>
            <form action="delete-output.php" method="post">
                <?php echo '<td> <img alt="image" src="../img/', $row['jpg'], '.jpg" height="120" width=120">';?> 
                <td><?php echo $row['gr_name']; ?></td>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['bunrui']; ?></td>
                <td><?php echo $row['type1_name']; ?></td>
                <td><?php echo $row['type2_name']; ?></td>
                <td><button type="submit" >削除</button></td>
                <?php
                echo '<input type="hidden" name="id" value="', $row['ID'], '">';
                echo '<input type="hidden" name="name" value="', $row['name'], '">';
                echo '<input type="hidden" name="bunrui" value="', $row['bunrui'], '">';
                echo '<input type="hidden" name="type1" value="', $row['type1_id'], '">';
                echo '<input type="hidden" name="type2" value="', $row['type2_id'], '">';
                echo '<input type="hidden" name="gr_name" value="', $row['gr_name'], '">';
                echo '</form>';
                echo "\n";
                
        ?>
                        </tr>
        <?php endforeach; ?>

    </table>

    <link rel="stylesheet" href="../css/frame.css">

    <a href="delete.php">戻る</a>
   <br>
   
<a href="menu.php">メニューに戻る</a>
   

