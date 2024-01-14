<?php require 'db-connect.php'; ?>

<?php
// $pdo=new PDO($connect, USER, PASS);

// $sql=$pdo->prepare('select * from Pokemon where grId=?');
// $sql->execute([$_POST['grId']]);
// foreach ($sql as $row) {
//     $id=$row['id'];
//     echo '<tr>';
//     echo '<td>NO.', $id, ':</td>';
//     echo '<td>　';
//     echo '　<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
//     echo '</td>';
//     echo '<td>　',$row['bunrui'],'</td>';
//     $sql2=$pdo->prepare('select * from Pokemon LEFT JOIN Type as t1 ON Pokemon.type1_id = t1.typeId JOIN Type as t2 ON Pokemon.type2_id = t2.typeId where id=?');
//     $sql2->execute([$row['id']]);
//     foreach ($sql2 as $row2) {
//     echo '<td>　',$row2['type'],'</td>';
//    }
//    $sql2=$pdo->prepare('select * from Pokemon LEFT JOIN Type as t1 ON Pokemon.type1_id = t1.typeId JOIN Type as t2 ON Pokemon.type2_id = t2.typeId where id=?');
//    $sql2->execute([$row['id']]);
//    foreach ($sql2 as $row2) {
//    echo '<td>　',$row2['type'],'</td>';
//   }
//     echo '</tr>';
//     echo "<br>";
// }
// echo '</table>';



?>

<?php

try {
    // データベースに接続
    $pdo=new PDO($connect, USER, PASS);
 
    // エラーモードを例外に設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // Pokemon テーブルと Type テーブルをLEFT JOINしてデータを取得
    $query = $pdo->prepare("SELECT Pokemon.ID, Pokemon.name, Pokemon.jpg, Pokemon.bunrui, Pokemon.type1_id, Pokemon.type2_id, Type.type_name AS type1_name, Type2.type_name AS type2_name, Gr.grId, Gr.gr_name
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
         echo '<h2>グループ',$_POST['gr_name'],'</h2>';
         ?>

    <table border="1">
        <tr>
            <th>写真</th>
            <th>ID</th>
            <th>Name</th>
            <th>Type 1</th>
            <th>Type 2</th>
        </tr>
        <?php foreach ($result as $row): ?>
            <tr>
                <td><?php echo'<img alt="image" src="../img/', $row['jpg'], '.jpg" height="120" width=120">'; ?></td>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['type1_name']; ?></td>
                <td><?php echo $row['type2_name']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
    <br>
    <a href="select1.php">戻る</a>
    <br>
    <a href="menu.php">メニューに戻る</a>

 
</body>
</html>
 
