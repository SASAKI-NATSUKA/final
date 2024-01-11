<?php require 'db-connect.php'; ?>

<?php
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->query('select * from Pokemon');

foreach ($sql as $row) {
    $id=$row['id'];
    echo '<tr>';
    echo '<td>NO.', $id, ':</td>';
    echo '<td>　';
    echo '　<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
    echo '</td>';
    echo '<td>　',$row['bunrui'],'</td>';
    echo '<td>　',$row['type1'],'</td>';
    echo '<td>　',$row['type2'],'</td>';
    echo '</tr>';
    echo "<br>";
}
echo '</table>';



?>
<br>
<a href="menu.php">メニューに戻る</a>
