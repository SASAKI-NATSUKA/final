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
    <h1>グループを選択してください。</h1>

<?php
$pdo=new PDO($connect, USER, PASS);

echo '<form action="delete-input.php" method="post">';
//ここからプルダウン
            $sql = 'select distinct gr_name from Gr';
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
<a href="group-delete-input.php">グループ削除はこちら</a>
<br>
<a href="menu.php">メニューに戻る</a>

        </div>
        </body>
        </html>
