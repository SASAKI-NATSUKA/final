<?php require 'db-connect.php'; ?>
<?php
                    $pdo=new PDO($connect, USER, PASS);
                    $sql=$pdo->prepare('select * from Pokemon where id=?');
                    $sql->execute([$_POST['id']]);
                    echo '<table>';
                    foreach ($sql as $row) {
                        echo '<tr>';
                        echo '<form action="update-output.php" method="post">';
                        echo '<td>';
                        echo '<input type="hidden" name="id" value="', $row['id'], '">';
                        echo 'NO.　',$row['id'];
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="text" name="name" value="', $row['name'], '">';
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="text" name="bunrui" value="', $row['bunrui'], '">';
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="text" name="type1" value="', $row['type1'], '">';
                        echo '</td> ';
                        echo '<td>';
                        echo '<input type="text" name="type2" value="', $row['type2'], '">';
                        echo '</td> ';
                        echo '<td><input type="submit" value="更新"></td>';
                        echo '</form>';
                        echo '</tr>';
                        echo "\n";
                    }
                    echo '</table>';
                    ?>