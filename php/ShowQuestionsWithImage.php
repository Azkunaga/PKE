<!DOCTYPE html>
<?php include 'Segurtasuna.php'?>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
		<?php
		$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
		$sql= "SELECT * FROM Question";
		$ema= mysqli_query($esteka, $sql);
		echo "<table >
			<tr>
              <th>Id</th>
              <th>Email</th>
              <th>Galdera</th>
              <th>Zuzena</th>
              <th>Okerra1</th>
              <th>Okerra2</th>
              <th>Okerra3</th>
              <th>Zailtasuna</th>
              <th>Gaia</th>
              <th>Irudia</th></tr>";
		while ( $row= mysqli_fetch_array($ema, MYSQLI_ASSOC)) {
		echo '<tr>
              <td>'.$row['id'].'</td>
              <td>'.$row['email'].'</td>
              <td>'. $row['galdera'] .'</td>
              <td>'.$row['zuzena'].'</td>
              <td>'.$row['okerra1'].'</td>
              <td>'.$row['okerra2'].'</td>
              <td>'.$row['okerra3'].'</td>
              <td>'.$row['zailtasuna'].'</td>
              <td>'.$row['gaia'].'</td>
              <td><img src="data:image/jpg;charset=utf8;base64,'.base64_encode($row['image']).'" height="50"/> </td>
          </tr>';
		}
		echo "</table>";

		mysqli_free_result($ema);
		mysqli_close($esteka);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
