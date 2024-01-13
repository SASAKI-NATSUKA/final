<?php require 'db-connect.php'; ?>
<h1>グループ</h1>
<?php
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->query('select * from Pokemon LEFT JOIN Gr ON Pokemon.gr_Id = Gr.grId');

echo '<form action="select2.php" method="post">';
foreach ($sql as $row) {
    $grId=$row['grId'];
    $gr_name=$row['gr_name'];
    echo '<input type="hidden" name="grId" value="', $grId, '">';
    echo '<input type="hidden" name="gr_name" value="', $gr_name, '">';
}


$pdo=new PDO($connect, USER, PASS);
//ここからプルダウン
            $sql = 'select * from Gr';
            $data = "";

            if ($stmt = $pdo->query($sql)) {
            foreach($stmt as $type_data_val){
                $data .= "<option value='". $type_data_val['grId'];
                $data .= "'>". $type_data_val['gr_name']. "</option>";
            }
            }
        
            echo '<select name="grId">';

            echo $data;
            echo '</select>';
            echo '　<button type="submit" >決定</button>';

            echo '</form>';

?>
<br>
<a href="menu.php">メニューに戻る</a>
