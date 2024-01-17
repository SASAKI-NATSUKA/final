<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">

    <title>Document</title>
</head>
<body>
<div class="bg-full">

    <h1>ポケモン登録画面</h1>
    <a href="menu.php">メニューに戻る</a>
    <br>
    <br>
    <form action="insert-output.php" method="post">

        <tr><th>　　　　　　　　　　　</th><th></th><th>　　　　　　　　　　　なければ入力</th></tr>

        <br>
        グループ:　
        <?php
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
            ?>       
            　　
                <input type="text" id="gr_name" name="gr_name" >
                <!-- <input type="hidden" name="gr" id="" value="0">
                <input type="checkbox" name="gr" id="" value="1"> -->
                <br>
                <br>
                番　　号:
                <input type="text" name="id">
                　　名　　前:
                <input type="text" name="name">　　
                <br>
                分　　類:
                <input type="text" name="bunrui">
                　　写　　真:
                <input type="text" name="jpg">.jpg
                <br>
                <br>
                <table id="table" align="center">
                    <tr>
                    <td>
                    タイプ1:
                    <br>
                    <?php
                    //ここからプルダウン
                                $sql2 = 'select * from Type';
                                $data = "";

                                if ($stmt = $pdo->query($sql2)) {
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
                    <td>
                    タイプ2:
                    <br>
                    <?php
                    //ここからプルダウン
                                $sql2 = 'select * from Type';
                                $data = "";

                                if ($stmt = $pdo->query($sql2)) {
                                foreach($stmt as $type_data_val){
                                    $data .= "<option value='". $type_data_val['typeId'];
                                    $data .= "'>". $type_data_val['type_name']. "</option>";
                                }
                                }
                            
                                echo '<select name="type2">';

                                echo $data;
                                echo '</select>';
                    ?>         
                </td>
            </tr>
        </table>
        <br>
        <br>
                <input type="submit" id="insert" name="insert" value="登録">
                </form>
        </div>
                
        </body>
        </html>