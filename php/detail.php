<?php 
	$conn = new mysqli("localhost","root","","qlmusic");
	if (!$conn){
	    echo("Connect failed.");
	}
    session_start();
    $id_song  = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
    if($id_song != ''){
        $sql = "select * from songs where id = $id_song limit 1";
        $result = mysqli_query($conn , $sql);
        if (mysqli_num_rows($result) > 0) {
            $song = mysqli_fetch_assoc($result);
        }
        $sql = "select name from singer where id = ". $song['singer_id'] ." limit 1";
        $atist_result = mysqli_query($conn , $sql);
        if (mysqli_num_rows($atist_result) > 0) {
            $atist = mysqli_fetch_assoc($atist_result);
        }
    }
    // print_r($atist); exit();
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
  <link rel="stylesheet" href="../css/player.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/index.js"></script>
  <!-- <script src="../js/jquery.js"></script> -->
  <script src="../js/jquery-1.7.2.min.js"></script>
  <script src="../js/jquery-ui-1.8.21.custom.min.js"></script>
  <script src="../js/playerMp3.js"></script>
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
            <li>
              <a href="#">
                <span class="glyphicon glyphicon-log-in"></span> Login</a>
            </li>
            <li>
              <a href="#">
                <span class="glyphicon glyphicon-log-out"></span> Logout</a>
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
        </div>      
       -->
      </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="containerMP3">
                <div class="player">
                    <div class="pl"></div>
                    <marquee class="title" width = "115px" behavior = "alternate" scrollamount = "1" ></marquee>
                    <div class="artist"></div>
                    <div class="cover"></div>
                    <div class="controls">
                        <div class="rew"></div>
                        <div class="play"></div>
                        <div class="pause"></div>
                        <div class="fwd"></div>
                    </div>
                    <div class="volume"></div>
                    <div class="tracker"></div>
                    <div class="tracker-default"></div>
                </div>						
                <ul id = "addList" class="playlist hidden">
                </ul>
            </div>
        
            <div class ="containerMP3" style = "display:none">
                <ul class="playlist">
                    <li audiourl = <?= $song['link'] ?>
                    cover=<?= $song['image'] ?> artist=<?= $atist['name'] ?>><?= $song['name'] ?></li>
                </ul>	
            </div>
        </div>
      <div class="col-sm-4">
          <div id="containerTop5">						
              <ul class="listTop5">	
                <li><p style="color:blue">1 - </p><a class="baihat baihat-1"  href = "#"></a>
                  <span>Khởi My</span>
                  <div>
                    <a href = "#">Người Yêu Cũ</a>							
                  </div>	
                </li>
                <li><p style="color:green">2 - </p><a class="baihat baihat-2"  href = "#"></a>
                  <span>Hoàng Tôn</span>
                  <div>
                    <a href = "#">Yêu Em Rất Nhiều</a>							
                  </div>	
                </li>
                <li><p style="color:red">3 - </p><a class="baihat baihat-3"  href = "#"></a>
                  <span>Như Hexi</span>
                  <div>
                    <a href = "#">Xóa Đi Quá Khứ</a>							
                  </div>	
                </li>
                <li><p style="color:gray">4 - </p><a class="baihat baihat-4"  href = "#"></a>
                  <span>NIT,Tăng Duy Tân</span>
                  <div>
                    <a href = "#">Vô Duyên</a>							
                  </div>	
                </li>
                <li><p style="color:black">5 - </p><a class="baihat baihat-5"  href = "#"></a>
                  <span>Isaac</span>
                  <div>
                    <a href = "#">Tôi Đã Quên Thật Rồi</a>					
                  </div>	
                </li>
              </ul>			
            </div>
      </div>
    </div>
    <hr>
  </div>

  <div class="container text-center">
    <h2 class="title1">
      <strong>Nghe Gì Hôm Nay</strong>
    </h2>
    <br>
    <div class="row">

      <div class="col-sm-6">
        <div class="col-sm-6">
          <img src="../image/rap.jpg" width="100%" alt="Image">
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
        <strong>ALBUM HOT</strong>
      </h3>
      <br>
      <div class="row">
        <div class="col-sm-2">
          <img src="../image/img5.jpg" class="img-responsive" style="width:100%" alt="Image">
          <p class="text1">Ngưng Thả Yêu Thương(Single)-</p>
          <p>Trịnh Đình Quang</p>

        </div>
        <div class="col-sm-2">
          <img src="../image/img6.jpg" class="img-responsive" style="width:100%" alt="Image">
          <p class="text1">Anh Đang Ở Đâu Đấy Anh(Single)-</p>
          <p>Hương Giang idol</p>
        </div>
        <div class="col-sm-2">
          <img src="../image/img7.jpg" class="img-responsive" style="width:100%" alt="Image">
          <p class="text1">Người Anh Đã Từng(Single)-</p>Nam Cường
        </div>
        <div class="col-sm-2">
          <img src="../image/img8.jpg" class="img-responsive" style="width:100%" alt="Image">
          <p class="text1">Hôn Anh(Single)-</p>
          <p>Min</p>
        </div>
        <div class="col-sm-2">
          <img src="../image/img10.jpg" class="img-responsive" style="width:100%" alt="Image">
          <p class="text1">Marry & Happy(Repackage)-</p>
          <p>Twice</p>
        </div>
        <div class="col-sm-2">
          <img src="../image/img11.jpg" class="img-responsive" style="width:100%" alt="Image">
          <p class="text1">I Should Say(Single)</p>-
          <p>Espresso</p>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-2">
        <img src="../image/img12.jpg" class="img-responsive" style="width:100%" alt="Image">
        <p class="text1">The Garden Of Words OST</p>
        <p>Kashiwa Daisuke</p>
      </div>
      <div class="col-sm-2">
        <img src="../image/img13.jpg" class="img-responsive" style="width:100%" alt="Image">
        <p class="text1">Present(Mini Album)-</p>
        <p>Dia</p>
      </div>
      <div class="col-sm-2">
        <img src="../image/img14.jpg" class="img-responsive" style="width:100%" alt="Image">
        <p class="text1">Người Yêu Cũ(Single)-</p>
        <p>Khởi My</p>
      </div>
      <div class="col-sm-2">
        <img src="../image/img15.jpg" class="img-responsive" style="width:100%" alt="Image">
        <p class="text1">Em Gái Mưa(Single)-</p>
        <p>Hương Tràm</p>
      </div>
      <div class="col-sm-2">
        <img src="../image/img16.jpg" class="img-responsive" style="width:100%" alt="Image">
        <p class="text1">Gấu Ở Đâu Khi Gió Đông Về</p>
        <p>Cao Tùng Anh(Single)</p>
      </div>
      <div class="col-sm-2">
        <img src="../image/img17.jpg" class="img-responsive" style="width:100%" alt="Image">
        <p class="text1">Từ Khi Gặp Em(Single)-</p>
        <p>Sỹ Tuệ</p>
      </div>
    </div>
  </div>
  <br>
  <div class="container text-center">
    <h3 class="title3">
      <strong>VIDEO HOT</strong>
    </h3>
    <br>
    <div class="row">
      <div class="col-sm-2">
        <a href="./Question1.html">
          <img src="../image/img18.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p class="text1">Sai Người Sai Thời Điểm</p>
        <p>Thanh Hưng</p>
      </div>
      <div class="col-sm-2">

        <a href="./Question2.html">
          <img src="../image/img19.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p class="text1">Anh Không Đòi Quà(Single)-</p>
        <p>Onlyc,Karik</p>
      </div>
      <div class="col-sm-2">
        <a href="./Question3.html">
          <img src="../image/img20.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p class="text1">SOLO(Single)</p>
        <p>Jennie</p>
      </div>
      <div class="col-sm-2">
        <a href="./Question4.html">
          <img src="../image/img21.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p class="text1">Cô Gái M52-</p>
        <p>Huyr, Tùng Viu</p>
      </div>
      <div class="col-sm-2">
        <a href="./Question5.html">
          <img src="../image/img22.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p>Em Sẽ Là Cô Dâu(Single)-</p>
        <p>Minh Vương</p>
      </div>
      <div class="col-sm-2">
        <a href="./Question6.html">
          <img src="../image/img23.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p class="text1">Đóa Hoa Hồng(Queen)-</p>
        <p>Chi Pu</p>
      </div>
    </div>

    <!-- // -->
    <div class="row">
      <div class="col-sm-2">
        <a href="./Question7.html">
          <img src="../image/img24.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p class="text1">Nơi con tim yên bình(Single)</p>
        <p>Gil Lê</p>
      </div>
      <div class="col-sm-2">
        <a href="./Question8.html">
          <img src="../image/img25.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p class="text1">Anh Có Tài Mà-</p>
        <p>Xuân Nghị</p>
      </div>
      <div class="col-sm-2">
        <a href="./Question9.html">
          <img src="../image/img26.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p class="text1">Vô Tình-</p>
        <p>Xesi,Hoaprox </p>
      </div>
      <div class="col-sm-2">
        <a href="./Question10.html">
          <img src="../image/img27.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p class="text1">Ngày Mai Em Đi-</p>
        <p>Touliver,Lê Hiếu,Soo Bin Hoàng Sơn</p>
      </div>
      <div class="col-sm-2">
        <a href="./Question11.html">
          <img src="../image/img28.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p>Không Thể Nói(Hoa Thiên Cốt OSt)-</p>
        <p>Hoắc Kiến Hoa, Triệu Lệ Dĩnh</p>
      </div>
      <div class="col-sm-2">
        <a href="./Question12.html">
          <img src="../image/img29.jpg" class="img-responsive" style="width:100%" alt="Image">
        </a>
        <p class="text1">Anh Đang Ở Đâu Đấy Anh-</p>
        <p>Hương Giang idol</p>
      </div>
    </div>
  </div>
  <br>
  <footer class="container-fluid text-center">
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
    </div>
    
  </footer>
</body>

</html>