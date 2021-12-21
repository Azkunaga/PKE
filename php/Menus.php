<div id='page-wrap'>

<nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block d-xl-block py-4" id="header" style="background-color: #CDCDD3; z-index:1;">
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hizkuntza
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Euskara <img src="../images/euskara.png" height="10"></a></li>
                <li><a class="dropdown-item" href="#">Gaztelania <img src="../images/español.png" height="10"></a></li>
                <li><a class="dropdown-item" href="#">Ingelesa <img src="../images/ingles.png" height="10"></a></li>
              </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-center">
            <li><a href="Layout.php"><h1 style="color:black">QUIZ</h1></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            include '../php/DbConfig.php';

            if(isset($_SESSION['email'])){
          $erabemail=$_SESSION['email'];
          //$img=$_GET['img'];
          $esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
          $sql= "SELECT * FROM User WHERE email = '$erabemail'";
          $ema= mysqli_query($esteka, $sql);
          $row= $ema->fetch_assoc(); //mysqli_fetch_array($ema, MYSQLI_ASSOC);
          if($row['image'] != null){
            echo '<li><a href="Profila.php"><img src=data:image/jpg;charset=utf8;base64,'. base64_encode($row['image']).' height="50" style="border-radius: 50%;"/></a></li>';
          }
          else {
            echo '<li><i class="bi bi-person-circle"></i></li>';
          }
        }else {?>
          <li><a class="btn btn-outline-secondary" href="LogIn.php" role="button">Login/Register</a></li>
        <?php
        }
        ?>
        </ul>
    </div>  
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-primary" style="z-index:0">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand d-lg-none" id="izenburua" href="#">Quiz Jokoa</a>
    <div class="offcanvas offcanvas-start-lg bg-primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header d-flex d-lg-none">
        <?php

        if(isset($_SESSION['email'])){
          $erabemail=$_SESSION['email'];
          //$img=$_GET['img'];
        	$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
        	$sql= "SELECT * FROM User WHERE email = '$erabemail'";
        	$ema= mysqli_query($esteka, $sql);
        	$row= $ema->fetch_assoc(); //mysqli_fetch_array($ema, MYSQLI_ASSOC);
          //echo $row['image'];
          ?>
          <div class="row">
            <h3><?php echo $row["deitura"] ?></h3>
            <p><?php echo $row["email"] ?></p>
          </div>
          <?php
        	if($row['image'] != null){
        		echo '<img src=data:image/jpg;charset=utf8;base64,'. base64_encode($row['image']).' height="50" /><br>';
        	}
          else {
            echo '<i class="bi bi-person-circle"></i>';
          }
        }else {?>
          <a class="btn btn-dark" href="LogIn.php" role="button">Login/Register</a>
          <i class="bi bi-person-circle"></i>
        <?php
        }
        ?>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body p-lg-0">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light active" href="Layout.php" aria-current="page">Quiz Jokoa</a>
          </li>
          <?php
          if(isset($_SESSION['email'])){
            echo '<li class="nav-item"><a class="nav-link text-light" href="QuestionFormWithImage.php">Galdera Sortu</a></li>';
            echo '<li class="nav-item"><a class="nav-link text-light" href="ShowQuestionsWithImage.php">Galderak Ikusi</a></li>';
          }
          ?>
          <li class="nav-item">
            <a class="nav-link text-light" href="Credits.php">Kredituak</a>
          </li>
          <?php
            if(isset($_SESSION['email'])){
              echo '<li class="nav-item"><a class="nav-link text-light" href="Logout.php">Logout</a></li>';
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
</div>

