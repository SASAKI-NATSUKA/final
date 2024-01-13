<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="menu.php">メニューに戻る</a>
    <br>
    <form action="insert-output.php" method="post">
        グループ:
        <input type="text" name="gr_name">
        番　　号:
        <input type="text" name="id">
        <br>
        名　　前:
        <input type="text" name="name">
        <br>
        分　　類:
        <input type="text" name="bunrui">
        <br>
        写　　真:
        <input type="text" name="jpg">.jpg
        <br>
        <br>
        <table align="left">
            <tr>
            <td>
            タイプ1:
            <br>
            <?php
                    $pdo=new PDO($connect, USER, PASS);
            //ここからプルダウン
                        $sql = 'select * from Type';
                        $data = "";

                        if ($stmt = $pdo->query($sql)) {
                        foreach($stmt as $type_data_val){
                            $data .= "<option value='". $type_data_val['typeId'];
                            $data .= "'>". $type_data_val['type_name']. "</option>";
                        }
                        }
                    
                        echo '<select name="type1">';

                        echo $data;
                        echo '</select>';
            ?>         
            </td>
            </tr>
        </table>
        <table >
            <tr>
            <td>
            タイプ2:
            <br>
            <?php
            //ここからプルダウン
                        $sql = 'select * from Type';
                        $data = "";

                        if ($stmt = $pdo->query($sql)) {
                        foreach($stmt as $type_data_val){
                            $data .= "<option value='". $type_data_val['typeId'];
                            $data .= "'>". $type_data_val['type_name']. "</option>";
                        }
                        }
                    
                        echo '<select name="type2">';

                        echo $data;
                        echo '</select>';
            ?>         
            <br>
            <br>
        </td>
    </tr>
</table>
<br>
        <input type="submit" name="insert" value="登録">
        </form>
        
</body>
</html>