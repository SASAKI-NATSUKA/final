<!DOCTYPE html>
<html lang="ja">
<div class="bg-full">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">
    <title>final</title>
</head>

    
    <h1>pokemon手持ち管理</h1>
    <table id="table" align="center">
    <tr>
    <td><form action="select1.php" method="post">
        <input type="submit" name="select" value="一覧">
    </form>
    </td>
    <td>
    <form action="insert-input.php" method="post">
        <input type="submit" name="insert" value="追加">
    </form>
    </td>
    <td>
    <form action="update.php" method="post">
        <input type="submit" name="update" value="更新"></a>
    </form>
    </td>
    <td>
    <form action="delete.php" method="post">
        <input type="submit" name="delete" value="削除"></a>
    </form>
    </td>
</tr>
</div>
</body>
</html>