<!DOCTYPE html>
<?php include 'SegurtasunaAdmin.php' ?>
<html>

<head>
    <?php include '../html/Head.html'?>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--<script type="text/javascript" src="../js/HandlingAccounts.js"></script>-->
</head>
<body>
    <script type="text/javascript">
        
    function changeState(eposta, egoera){
        $.ajax({
            url: '../php/ChangeUserState.php',
            type: 'POST',
            data: {
                'eposta': eposta,
                'egoera': egoera
            },
            cache: false,
            success: function(response) {
                $('#body').html(response);
                
            }
            
        });
    }

    function removeUser(eposta){
        $.ajax({
            url: '../php/RemoveUser.php',
            type: 'POST',
            data: {
                'eposta': eposta
            },
            cache: false,
            success: function(response) {
                $('#body').html(response);
            }
        });
    }
    </script>
    <?php include '../php/Menus.php' ?>
    <?php include '../php/DbConfig.php' ?>
    <section class="main" id="s1">
        <div>
            <table>
                <thead>
                    <tr>
                        <th>EPOSTA</th>
                        <th>GAKOA</th>
                        <th>EGOERA</th>
                        <th>IRUDIA</th>
                        <th>PERMUTATU</th>
                        <th>EZABATU</th>
                    </tr>
                </thead>
                <tbody id="body">
                    <?php
					$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
					$sql = "SELECT * FROM User";
					$ema= mysqli_query($esteka, $sql);
					while ( $row= mysqli_fetch_array($ema, MYSQLI_ASSOC)) {
                        if($row['email']!="admin@ehu.es"){
                            if ($row['egoera']=="aktibo") {
                                $onOff='ON';
                            }else{
                                $onOff='OFF';
                            }
                            echo '<tr>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['pasahitza'].'</td>
                                <td>'. $row['egoera'] .'</td>
                                <td><img src="data:image/jpg;charset=utf8;base64,'.base64_encode($row['image']).'" height="50"/> </td>
                                <td><input type="button" id="onOff" value='.$onOff.' onclick=changeState("'.$row['email'].'","'.$row['egoera'].'")></td>
                                <td><input type="button" id="remove" value="EZABATU" onclick=removeUser("'.$row['email'].'")></td></tr>';
                        }
					}
					?>
                </tbody>
            </table>
        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>