<?php require 'db-connect.php'; ?>
<?php
                    $pdo=new PDO($connect, USER, PASS);
                    $sql=$pdo->prepare('select * from Pokemon LEFT JOIN Gr ON Pokemon.gr_Id = Gr.grId where id=?');
                    $sql->execute([$_POST['id']]);
                    echo '<table>';
                    foreach ($sql as $row) {
                        echo '<tr>';
                        echo '<form action="update-output.php" method="post">';
                        echo '<td> <img alt="image" src="../img/', $row['jpg'], '.jpg" height="120" width=120">'; 
                        echo '</td>';
                        echo '<td>グループ名　';
                        echo '<input type="hidden" name="gr_name" value="', $row['gr_name'], '">';
                        echo $row['gr_name'];
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

                        $data = "";

                        if ($stmt = $pdo->query($sql)) {
                            foreach($stmt as $type_data_val){
                                $data .= "<option value='". $type_data_val['typeId'];
                                $data .= "'>". $type_data_val['type_name']. "</option>";
                            }
                            }
    
                            
                        
                            echo '<select name="type2">';
    
                            echo '　',$data;
                            echo '</select>';
                        }

                        echo '<input type="submit" value="更新" />';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                        echo "\n";
                    echo '</table>';
                    ?>