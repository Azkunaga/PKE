<div id='page-wrap'>
<header class='main' id='h1'>

</header>
<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand text-light" href="#">Quiz Jokoa</a>
      <?php
      if(isset($_SESSION['email'])){ ?>
        <a class="nav-link text-light" href="QuestionFormWithImage.php">Galdera Sortu</a>
        <a class="nav-link text-light" href="ShowQuestionsWithImage.php">Galdera Ikusi</a>
      <?php } ?>
      <a class="nav-link text-light" href="Credits.php">Kredituak</a>
    <div class="offcanvas offcanvas-start bg-primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <?php
        include '../php/DbConfig.php';

        if(isset($_SESSION['email'])){
          $erabemail=$_SESSION['email'];
          //$img=$_GET['img'];
        	$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
        	$sql= "SELECT * FROM User WHERE email = '$erabemail'";
        	$ema= mysqli_query($esteka, $sql);
        	$row= $ema->fetch_assoc(); //mysqli_fetch_array($ema, MYSQLI_ASSOC);
          echo $row['image'];
          ?>
          <div class="row">
            <h3><?php echo $row["deitura"] ?></h3>
            <p><?php echo $row["email"] ?></p>
          </div>
          <?php
        	if(isset($row['image'])){
        		echo '<img src=data:image/jpg;charset=utf8;base64,'. base64_encode($row['image']).' height="50"/><br>';
        	}
        }else {?>
          <a class="btn btn-dark" href="LogIn.php" role="button">Login/Register</a>
          <i class="bi bi-person-circle"></i>
        	<!-- echo ('<img src="../images/Anonymous.png" height="50"/><br>');
          echo "Anonymous ";
          echo "<span class='right'><a href='SignUp.php'>Erregistratu</a></span>";
          echo " ";
          echo "<span class='right'><a href='LogIn.php'>Login</a></span>";-->
        <?php
        }
        ?>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" href="Layout.php" aria-current="page">Quiz Jokoa</a>
          </li>
          <?php
          if(isset($_SESSION['email'])){
            echo '<li class="nav-item"><a class="nav-link" href="QuestionFormWithImage.php">Galdera Sortu</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="ShowQuestionsWithImage.php">Galderak Ikusi</a></li>';
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="Credits.php">Kredituak</a>
          </li>
          <?php
            if(isset($_SESSION['email'])){ 
              echo '<li class="nav-item"><a class="nav-link" href="Logout.php">Logout</a></li>';
            }
          ?>
        </ul>
      </div>
    </div>
    <!--<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <li class="nav-item">
        <a class="nav-link" href="Layout.php" aria-current="page">Quiz Jokoa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Credits.php">Kredituak</a>
      </li>
    </ul>-->
  </div>
</nav>
