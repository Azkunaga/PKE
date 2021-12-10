<div id='page-wrap'>
<header class='main' id='h1'>

  <?php
  include '../php/DbConfig.php';

  if(isset($_SESSION['email'])){
    $erabemail=$_SESSION['email'];
    //$img=$_GET['img'];
	$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
	$sql= "SELECT * FROM User WHERE email = '$erabemail'";
	$ema= mysqli_query($esteka, $sql);
	$row= $ema->fetch_assoc(); //mysqli_fetch_array($ema, MYSQLI_ASSOC);
	if(isset($row['image'])){
		echo ('<img src=data:image/jpg;charset=utf8;base64,'. base64_encode($row['image']).' height="50"/><br>');
	}
    echo "$erabemail <span class='right'><a href='Logout.php'>Logout</a></span>";
  }else {
  	echo ('<img src="../images/Anonymous.png" height="50"/><br>');
    echo "Anonymous ";
    echo "<span class='right'><a href='SignUp.php'>Erregistratu</a></span>";
    echo " ";
    echo "<span class='right'><a href='LogIn.php'>Login</a></span>";
  }
  ?>

</header>

<nav class='main' id='n1' role='navigation'>
  <?php
  echo "<span><a href='Layout.php'>Hasiera</a></span>";
  //echo "<span><a href='QuestionFormWithImage.php'>Sortu galderak</a></span>";
  echo "<span><a href='Credits.php'>Kredituak</a></span>";

  if(isset($_SESSION['email'])){
    if ($_SESSION['erabMota']=="ikaslea"){
      echo "<span><a href='HandlingQuizesAjax.php'>Kudeatu galderak</a></span>";
    }else if($_SESSION['email']=="admin@ehu.es"){
      echo "<span><a href='HandlingAccounts.php'>Kudeatu erabiltzaileak</a></span>";
    }else if($_SESSION['erabMota']=="irakaslea") {
      echo "<span><a href='HandlingQuizesAjax.php'>Kudeatu galderak</a></span>";
      echo "<span><a href='IsVip.php'>VIPa al da?</a></span>";
      echo "<span><a href='AddVip.php'>VIPa gehitu</a></span>";
      echo "<span><a href='DeleteVip.php'>VIPa ezabatu</a></span>";
      echo "<span><a href='ShowVips.php'>VIP zerrenda</a></span>";
    }
  }

  ?>
</nav>
