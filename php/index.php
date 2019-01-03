<?php 
  $conn=new mysqli("localhost","root","","qlmusic");
  if (!$conn){
    echo("Connect failed.");
  }
  session_start();
  $check  = ($_SESSION != null) ? true : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Website Music</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text" href="..xampp/htdocs/music/css/style.css"/> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/index.js"></script>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img style="position: absolute; top:0%;" src="../image/logo.jpg" width="50px" height="50px" />
        </a>
      </div>
      <nav id = "fixNav">	
      <div class="collapse navbar-collapse" id="myNavbar">
          <div id = "menuBar">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="#">
              <b>Trang Chủ</b>
            </a>
          </li>
          <li>
            <a href="#"><b>Album</b></a>
							<ul class="sub-menu">
								<li><a href="#">Nhạc Việt</a></li>
								<li><a href="#">Nhạc Âu Mỹ</a></li>
								<li><a href="#">Nhạc Hàn</a></li>
							</ul>
						
          </li>
          <li>
              <a href="#"><b>Chủ Đề</b></a>
							<ul class="sub-menu">
								<li><a href="#">Nhạc Hot</a></li>
								<li><a href="#">EDM</a></li>
								<li><a href="#">K-POP</a></li>
							</ul>
          </li>
          <li>
            <a href="#">
              <b>Nghệ Sĩ</b>
            </a>
            <ul class="sub-menu">
								<li><a href="#">Chi Pu</a></li>
								<li><a href="#">Khắc Việt</a></li>
								<li><a href="#">Kay Trần</a></li>
							</ul>
          </li>
          <li>
            <a href="#">
              <b>Top 100</b>
            </a>
            <ul class="sub-menu">
								<li><a href="#">Nhạc Việt</a></li>
								<li><a href="#">Nhạc Âu Mỹ</a></li>
								<li><a href="#">Nhạc Hàn</a></li>
							</ul>
          </li>
          <li>
            <a href="#">
              <b>Video</b>
              <ul class="sub-menu">
                  <li><a href="#">Nhạc Việt</a></li>
                  <li><a href="#">Nhạc Âu Mỹ</a></li>
                  <li><a href="#">Nhạc Hàn</a></li>
                </ul>
            </a>
          </li>
          <li>
            <nav class="navbar navbar-light bg-light" style="min-height: 0px; margin-bottom:0px">
              <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </nav>
          </li>
          <ul class="nav navbar-nav navbar-right">
  
            <li style = "display : <?php if($check) echo 'none'; else echo 'block'?>;">
            <a href="../php/login.php">
                <span class="glyphicon glyphicon-log-in" ></span> Login</a>
            </li>           
            <li style = "display : <?php if($check) echo 'none'; else echo 'block'?>;">
              <a href="../php/Register.php" >
                <span class="glyphicon glyphicon-log-out"></span> Register</a>
            </li>

            <li style = "display : <?php if($check) echo 'block'; else echo 'none'?>;" >
              <a href="#">
              <span class="" ></span> <?php if($check) echo $_SESSION["nickname"]?></a>
            </li>
            <li style = "display : <?php if($check) echo 'block'; else echo 'none'?>;">
              <a href="../php/logout.php">
                <span class="glyphicon glyphicon-log-out"></span> LogOut</a>
            </li>
          </ul>
        </ul>

        <!-- <div id="sug" class="section-search">
        <form action="/tim-kiem/bai-hat.html" method="get" class="search">
            <input type="text" name="q" placeholder="Nhập nội dung cần tìm" class="input-txt" autocomplete="off">
            <span class="input-btn">
                <button type="submit"class="zicon btn hide-text">Tìm kiếm</button>
            </span>
        </form>
        <div id="sugResultAll" class="none">                    
            <div style="float: right;margin: 0px 10px;line-height: 30px;">
            </div>
            <div style="clear: both;"></div>
        </div>       -->
      
      </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="../image/kpop.jpg" alt="Image" style="height: 300px">
              <div class="carousel-caption">
              </div>
            </div>

            <div class="item">
              <img src="../image/img1.jpg" alt="Image" style="height: 300px">
              <div class="carousel-caption">
              </div>
            </div>

            <div class="item">
              <img src="../image/img2.jpg" alt="Image" style="height: 300px">
              <div class="carousel-caption">
              </div>
            </div>

            <div class="item">
              <img src="../image/ctn.jpg" alt="Image" style="height: 300px">
              <div class="carousel-caption">
              </div>
            </div>

            <div class="item">
              <img src="../image/img3.jpg" alt="Image" style="height: 300px">
              <div class="carousel-caption">
              </div>
            </div>

            <div class="item">
              <img src="../image/img4.jpeg" alt="Image" style="height: 300px">
              <div class="carousel-caption">
              </div>
            </div>
          </div>


          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="col-sm-4">
          <h2 class="titleT">
                <strong>Top 5 Bài Hát Mới Nhất </strong>
            </h2>
        
        <div id="containerTop5">						
              <ul class="listTop5">
              <?php
                mysqli_set_charset($conn,"utf8");
                $result = mysqli_query($conn,'SELECT * FROM songs ORDER BY id DESC LIMIT 0,5');

                while($row_result = mysqli_fetch_array($result)) {
                  echo '<span>';
                  echo '<img class="img-responsive" style="width:80px" alt="Image" src=';
                  echo $row_result['image'];
                  echo '>' ; 
                  echo'<p class="text1"><a href= detail.php?id=';
                  echo  $row_result['id'];
                  echo '> ';
                  echo $row_result['name'];
                  echo '</a></p>
                  </span>';
              } 
            ?>       
      </div>
        </div>
  </div>

  <div class="container text-center">
    <h2 class="title1">
      <strong>Nghe Gì Hôm Nay</strong>
    </h2>
    <br>
    <div class="row">

      <div class="col-sm-6">
        <div class="col-sm-6">
          <a href="../php/detail.php">
            <img src="../image/rap.jpg" width="100%" alt="Image">
          </a>
        
      </div>
        <div class="col-sm-6">
          <img src="../image/Luadoi.jpg" width="100%" alt="Image">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="col-sm-6">
          <img src="../image/lamlo.jpg" width="100%" alt="Image">
        </div>
        <div class="col-sm-6">
          <img src="../image/vct.jpg" width="100%" alt="Image">
        </div>
      </div>
    </div>

    <div class="container text-center">
      <h3 class="title2">
        <strong>SONG HOT</strong>
      </h3>
      <br>
      <div class="row">
      <?php
      mysqli_set_charset($conn,"utf8");
      $result = mysqli_query($conn,'SELECT * FROM songs ORDER BY listen DESC LIMIT 0,12');

          while($row_result = mysqli_fetch_array($result)) {
            $i = 0;
            $sql = "select name from singer where id = ". $row_result['singer_id'] ." limit 1";
            $atist_result = mysqli_query($conn , $sql);
            if (mysqli_num_rows($atist_result) > 0) {
                $atist = mysqli_fetch_assoc($atist_result);
            }
            echo '<div class="col-sm-2">';
            echo '<img class="img-responsive" style="width:100px; margin: auto;" alt="Image" src=';
            echo $row_result['image'];
            echo '>' ; 
            echo'<p class="text1"><a href= detail.php?id=';
            echo  $row_result['id'];
            echo '> ';
            echo $row_result['name'];
            echo '</a></p>';
                        
            echo'<p>';
            echo $atist['name'];
            echo '</p>
            </div>';
            // if($i == 6) echo '</div></div><div class="row">';
            // $i++;
          } 
          ?>
          </div>
        </div>  
   <!-- ----------------------------------------- -->
  <br>
  <div class="container text-center">
    <h3 class="title3">
      <strong>VIDEO HOT</strong>
    </h3>
    <br>
    <div class="row">
    <?php
      mysqli_set_charset($conn,"utf8");
      $result = mysqli_query($conn,'SELECT * FROM video ORDER BY views DESC LIMIT 0,12');
      while($row_result = mysqli_fetch_array($result)) {
        echo '<div class="col-sm-2">';
        echo '<img class="img-responsive" style="width:100px" alt="Image" src=';
        echo $row_result['imagevd'];
        echo '>' ; 
        echo'<p class="text1"><a href= ';
        echo  $row_result['linkvd'];
        echo '> ';
        echo $row_result['namevd'];
        echo '</a></p>
        </div>';
        
      } 
      ?>
      </div>
    </div>  
  <br>
  <footer class="container text-center">
    <div id="image">
      <img src="../image/vananh.jpg" / width="100px" height="100px">
    </div>
    <div id="LienHe">
      <div id="text">
        <p>
          <span class="glyphicon glyphicon-phone"></span>
          <strong>Liên Hệ:</strong>0399363810</p>
        <p>
          <span class="glyphicon glyphicon-envelope"></span>
          <strong>Gmail:</strong>Anhntv62@gmail.com</p>
        <p>
          <span class="glyphicon glyphicon-map-marker"></span>
          <strong>Lớp:</strong>58TH2</p>
        <p>
          <span class="glyphicon glyphicon-map-marker"></span>
          <strong>Khoa:</strong>Công Nghệ Thông Tin.</p>
      </div>
    </div>
    
   
  </footer>
  </body>
</html>