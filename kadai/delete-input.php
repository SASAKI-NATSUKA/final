<?php require 'db-connect.php'; ?>
<?php
echo '<table>';
$pdo=new PDO($connect, USER, PASS);
foreach($pdo->query('select * from Pokemon') as $row) {
    echo '<tr>';
    echo '<td>NO.', $row['id'], '</td>';
    echo '<td>　', $row['name'], '</td>';
    echo '<td>　', $row['bunrui'], '</td>';
    echo '<td>　', $row['type1'], '</td>';
    echo '<td>　', $row['type2'], '</td>';
    echo '<td><form action="delete-output.php" method="post">'; 
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="submit" value="削除">';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    echo "\n";
}
    echo "</table>";
?>
<a href="menu.php">メニューに戻る</a>
   

