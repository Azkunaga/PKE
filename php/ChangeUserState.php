<?php
	include 'DbConfig.php';
	$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
	if ($_POST['egoera']=="aktibo") {
		$egoera='blokeatuta';
	}else{
		$egoera='aktibo';
	}
	$email=$_POST['eposta'];
	$sql = " UPDATE User SET egoera = '$egoera' WHERE email='$email' ";
	$ema = mysqli_query($esteka, $sql);
	$sql1 = "SELECT * FROM User";
	$ema1= mysqli_query($esteka, $sql1);
	while ( $row= mysqli_fetch_array($ema1, MYSQLI_ASSOC)) {
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
	mysqli_close($esteka);
?>