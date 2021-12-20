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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="Layout.php">Quiz Jokoa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Credits.php">Kredituak</a>
      </li>
      <?php
        if(isset($_SESSION['email'])){
            echo '<li class="nav-item"><a class="nav-link" href="QuestionFormWithImage.php">Galdera Sortu</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="ShowQuestionsWithImage.php">Galderak Ikusi</a></li>';
            //echo "<span><a href='QuestionFormWithImage.php'>Galdera Sortu</a></span>";
            //echo "<span><a href='ShowQuestionsWithImage.php'>Galderak Ikusi</a></span>";
        }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="SignUp.php">Erregistratu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="LogIn.php">Login</a>
      </li>
      <!--<li class="nav-item">
      <a class="nav-link" href="#">Disabled</a>
      </li>-->
     </ul>
    </div>
  </div>
</nav>
