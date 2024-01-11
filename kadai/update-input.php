<?php require 'db-connect.php'; ?>
<?php
echo '<table>';
$pdo=new PDO($connect, USER, PASS);
foreach($pdo->query('select * from Pokemon') as $row) {
    echo '<tr>';
    echo '<td>グループ名　', $row['grId'], '</td>';
    echo '<td>NO.　', $row['id'], '</td>';
    echo '<td>　', $row['name'], '</td>';
    echo '<td>　', $row['bunrui'], '</td>';
    echo '<td>　', $row['type1'], '</td>';
    echo '<td>　', $row['type2'], '</td>';
    echo '<td><form action="update-input2.php" method="post">'; 
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="hidden" name="name" value="', $row['name'], '">';
    echo '<input type="hidden" name="bunrui" value="', $row['bunrui'], '">';
    echo '<input type="hidden" name="type1" value="', $row['type1'], '">';
    echo '<input type="hidden" name="type2" value="', $row['type2'], '">';
    echo '<input type="hidden" name="type2" value="', $row['grId'], '">';
    echo '<button type="submit" >更新</button></td>';
    echo '</form>';
    echo '</tr>';
    echo "\n";
}

    echo "</table>";
?>
<a href="menu.php">メニューに戻る</a>
   

