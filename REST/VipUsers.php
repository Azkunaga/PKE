<?php

// Datuak eskuratzeko konstanteak ...
DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "8080");
DEFINE("_USERNAME_", "T62");
DEFINE("_DATABASE_", "db_T62");
DEFINE("_PASSWORD_", "UgTEILXxwohJU");

require_once 'database.php';
$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];

    $cnx = Database::Konektatu();
    switch ($method) {
        case 'GET':
           	if(isset($_GET['id'])){
				$datuak = "";
				$email = $_GET['id'];
				$sql = "SELECT * FROM Vip WHERE eposta='$email'";
				echo $sql .' kontsulta exekutatzen dut <p>';
				$datuak = Database::GauzatuKontsulta($cnx, $sql);
				if (isset($datuak[0])){
					echo "<br><br><b>ZORIONAK ".$email." VIPa da </b><br><img src=../images/ok.gif>";
					break;
				}else {
					echo "<br><br><b>SENTITZEN DUT ".$email." EZ da VIPa</b><br><img src=../images/error.gif>";
					break;
				}
			}else{ 
				// Vipak zerrendatzeko zerbitzua (parametro gabeko GETa)
				$sql = "SELECT * FROM Vip";
				echo $sql .' kontsulta exekutatzen dut <p>';
				$datuak = Database::GauzatuKontsulta($cnx, $sql);
				if (isset($datuak[0])){
					foreach((array) $datuak as $datua){
						echo $datua.'<br>';
					}
				}
			}
			break;
        case 'POST':
            // VIPa gehitzeko
			$arguments = $_POST;
			$result = 0;
			$email= $arguments['eposta'];
			
			if(preg_match("/^[a-zA-Z0-9]+\@[a-z]+(\.[a-z]{2,}){1,2}$/", $email)){
				$sql = "INSERT INTO Vip VALUES('$email');";
				$num=Database::GauzatuEzKontsulta($cnx, $sql);
				if ($num==0){
					echo "BDan jada dago";
				}else {
					echo json_encode(array('inserted email' => $email));
				}
			}else{
				echo "Emaila ez du formatu egokia";
			}
			
			
			break;
        case 'PUT':
             // hau ez da inplementatu behar
        case 'DELETE':
			// VIP erabiltzailea ezabatzeko
			$arguments = $_REQUEST;
			$id=$arguments['id'];
			$sql = "DELETE FROM Vip WHERE eposta = '$id';";
			$result = Database::GauzatuEzKontsulta($cnx, $sql);
			if ($result == 0)
				{echo "Gakoa ez da existitzen: " . $id ;}
			else
				{echo json_encode(array('Row deleted' => $id));};
			break;
    
	}
    Database::Deskonektatu($cnx);
	
?>