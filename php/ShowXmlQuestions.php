<!DOCTYPE html>
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
		$assessmentItems = simplexml_load_file('../xml/Questions.xml');
		echo "<table >
			<tr>
              <th>Egilea</th>
              <th>Galdera</th>
              <th>Erantzun zuzena</th></tr>";
		foreach ($assessmentItems->xpath('//assessmentItem') as $assessmentItem) {
		echo '<tr>
              <td>'.$assessmentItem['author'].'</td> 
              <td>'.$assessmentItem->itemBody->p.'</td>
              <td>'.$assessmentItem->correctResponse->response.'</td>
			</tr>';
		}
		echo "</table>";
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>