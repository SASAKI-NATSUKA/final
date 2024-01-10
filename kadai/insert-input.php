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
        <input type="text" name="gr">
        番　　号:
        <input type="text" name="id">
        <br>
        名　　前:
        <input type="text" name="name">
        <br>
        分　　類:
        <input type="text" name="bunrui">
        <br>
        <br>
        <table align="left">
            <tr>
            <td>
            タイプ1:
            <br>
            <input type="checkbox" name="type1" value="ほのお">ほのお
            <br>
            <input type="checkbox" name="type1" value="みず">みず
            <br>
            <input type="checkbox" name="type1" value="くさ">くさ
            <br>
            <input type="checkbox" name="type1" value="でんき">でんき
            <br>
            <input type="checkbox" name="type1" value="こおり">こおり
            <br>
            <input type="checkbox" name="type1" value="かくとう">かくとう
            <br>
            <input type="checkbox" name="type1" value="どく">どく
            <br>
            <input type="checkbox" name="type1" value="じめん">じめん
            <br>
            <input type="checkbox" name="type1" value="ひこう">ひこう
            <br>
            <input type="checkbox" name="type1" value="エスパー">エスパー
            <br>
            <input type="checkbox" name="type1" value="むし">むし
            <br>
            <input type="checkbox" name="type1" value="ゴースト">ゴースト
            <br>
            <input type="checkbox" name="type1" value="ドラゴン">ドラゴン
            <br>
            <input type="checkbox" name="type1" value="あく">あく
            <br>
            <input type="checkbox" name="type1" value="はがね">はがね
            <br>
            <input type="checkbox" name="type1" value="フェアリー">フェアリー
            <br>
            <br>
            </td>
            </tr>
        </table>
        <table >
            <tr>
            <td>
            タイプ2:
            <br>
            <input type="checkbox" name="type2" value="ほのお">ほのお
            <br>
            <input type="checkbox" name="type2" value="みず">みず
            <br>
            <input type="checkbox" name="type2" value="くさ">くさ
            <br>
            <input type="checkbox" name="type2" value="でんき">でんき
            <br>
            <input type="checkbox" name="type2" value="こおり">こおり
            <br>
            <input type="checkbox" name="type2" value="かくとう">かくとう
            <br>
            <input type="checkbox" name="type2" value="どく">どく
            <br>
            <input type="checkbox" name="type2" value="じめん">じめん
            <br>
            <input type="checkbox" name="type2" value="ひこう">ひこう
            <br>
            <input type="checkbox" name="type2" value="エスパー">エスパー
            <br>
            <input type="checkbox" name="type2" value="むし">むし
            <br>
            <input type="checkbox" name="type2" value="ゴースト">ゴースト
            <br>
            <input type="checkbox" name="type2" value="ドラゴン">ドラゴン
            <br>
            <input type="checkbox" name="type2" value="あく">あく
            <br>
            <input type="checkbox" name="type2" value="はがね">はがね
            <br>
            <input type="checkbox" name="type2" value="フェアリー">フェアリー
            <br>
        </td>
    </tr>
</table>
<br>
        <input type="submit" name="insert" value="登録">
        </form>
        
</body>
</html>