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

<div class="bg-full">
<h1>グループ削除</h1>
<br>
<font color="red">⚠削除したいグループの中のポケモンを削除してから行ってください⚠</font></p>

<?php
$pdo=new PDO($connect, USER, PASS);
echo '<form action="group-delete-output.php" method="post">';
//ここからプルダウン
            $sql = 'select gr_name from Gr';
            $data = "";

            if ($stmt = $pdo->query($sql)) {
            foreach($stmt as $gr_data_val){
                $data .= "<option value='". $gr_data_val['gr_name'];
                $data .= "'>". $gr_data_val['gr_name']. "</option>";
            }
            }
        
            echo '<select name="gr_name">';

            echo $data;
            echo '</select>';
            echo '　<button type="submit" >決定</button>';

            echo '</form>';

?>
    
<br>
<br>
<a href="delete.php">削除画面に戻る</a>
<br>
<a href="menu.php">メニューに戻る</a>
<link rel="stylesheet" href="../css/frame.css">

        </div>
        </body>
        </html>
