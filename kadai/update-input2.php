<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame2.css">

    <title>Pokemon Data</title>
</head>
<body>
    <div class="bg-full">
    


<?php

                    $pdo=new PDO($connect, USER, PASS);
                    $sql=$pdo->prepare('SELECT Pokemon.id, Pokemon.name, Pokemon.bunrui, Pokemon.jpg, Pokemon.type1_id, Pokemon.type2_id, Type.type_name AS type1_name, Type2.type_name AS type2_name, Gr.grId, Gr.gr_name
                    FROM Pokemon
                    LEFT JOIN Type ON Pokemon.type1_id = Type.typeId
                    LEFT JOIN Type AS Type2 ON Pokemon.type2_id = Type2.typeId
                    LEFT JOIN Gr ON Pokemon.gr_Id = Gr.grId where id=?');
                    
                    $sql->execute([$_POST['id']]);
                    echo '<table id="table" align="center" border="1">';
                    echo '<tr>';
                    echo '<th>写真</th>';
                    echo '<th>グループ</th>';
                    echo '<th>ID</th>';
                    echo '<th>名前</th>';
                    echo '<th>分類</th>';
                    echo '<th>画像パス</th>';
                    echo '<th>Type 1</th>';
                    echo '<th>Type 2</th>';
                    echo '</tr>';
                    foreach ($sql as $row) {
                        $gr_name=$row['gr_name'];
                        echo '<tr>';
                        echo '<form action="update-output.php" method="post">';
                        echo '<td> <img alt="image" src="../img/', $row['jpg'], '.jpg" height="120" width=120">'; 
                        echo '</td>';
                        echo '<td>';

                        $sql2 = 'select distinct gr_name from Gr';
                        $data = "";

                        $data .= "<option value='". $row['gr_name']; 
                        $data .= "'>". $row['gr_name']. "</option>";
                        
                        if ($stmt = $pdo->query($sql2)) {
                        foreach($stmt as $type_data_val){
                            $data .= "<option value='". $type_data_val['gr_name'];
                            $data .= "'>". $type_data_val['gr_name']. "</option>";
                        }
                        }

                        echo '<select name="gr_name">';

                        echo $data;
                       
                        echo '<input type="hidden" name="grId" value="', $row['grId'], '">';
                        // echo $row['gr_name'];
                        echo '</select>';
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="hidden" name="id" value="', $row['id'], '">';
                        echo '　NO.　',$row['id'];
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="text" name="name" value="', $row['name'], '">';
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="text" name="bunrui" value="', $row['bunrui'], '">';
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="text" name="jpg" value="', $row['jpg'], '">';
                        echo '.jpg</td> ';
                        echo '　';
                        
                        echo '<td>';
                        //ここからプルダウン
                        $sql3 = 'select * from Type';
                        $data = "";

                        $data .= "<option value='". $row['type1_id']; 
                        $data .= "'>". $row['type1_name']. "</option>";
                        
                        if ($stmt = $pdo->query($sql3)) {
                        foreach($stmt as $type_data_val){
                            $data .= "<option value='". $type_data_val['typeId'];
                            $data .= "'>". $type_data_val['type_name']. "</option>";
                        }
                        }

                        
                        
                        echo '<select name="type1">';

                        echo $data;
                        echo '</select>';
                        echo '</td>';
                        echo '<td>';

                        $sql3 = 'select * from Type';
                        $data = "";

                        $data .= "<option value='". $row['type2_id']; 
                        $data .= "'>". $row['type2_name']. "</option>";
                        
                        if ($stmt = $pdo->query($sql3)) {
                        foreach($stmt as $type_data_val){
                            $data .= "<option value='". $type_data_val['typeId'];
                            $data .= "'>". $type_data_val['type_name']. "</option>";
                        }
                        }

                        
                    
                        echo '<select name="type2">';

                        echo $data;
                        echo '</select>';

                      
                        echo '<br>';
                        echo '</td>';
                   
                        echo '</tr>';
                    }
                        echo '</table>';
                        echo '<br>';
                        echo '<input type="submit" value="更新" />';
                        echo '</form>';

                        echo "\n";
                        echo '<form action="update-input.php" method="post">';
                        echo '<input type="hidden" name="gr_name" value="', $gr_name, '">';
                        echo '<br>';
                        echo '<button type="submit">更新一覧画面に戻る</button>';
                        echo '<br>';
                        echo '<br>';
                        echo '</form>';
                    ?>
                    </div>

