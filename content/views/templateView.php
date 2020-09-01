<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $data['options']['title']; ?></title>
  <link rel="stylesheet" type="text/css" href="/content/static/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/bistro-icons.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/settings.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/navigation.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/owl.transitions.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/jquery.fancybox.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/zerogrid.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/style.css">
  <link rel="stylesheet" type="text/css" href="/content/static/css/loader.css">
  <link rel="shortcut icon" href="/content/static/images/favicon.png">

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

  <!--Loader-->
  <div class="loader">
    <div class="cssload-container">
      <div class="cssload-circle"></div>
      <div class="cssload-circle"></div>
    </div>
  </div>

  <!--Topbar-->
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="pull-left hidden-xs"><?php echo $data['options']['tagline']; ?></p>
          <p class="pull-right"><i class="fa fa-phone"></i>Заказать доставку еды <?php echo $data['options']['contactphone']; ?></p>
        </div>
      </div>
    </div>
  </div>

  <!--Header-->
  <header id="main-navigation">
    <div id="navigation" data-spy="affix" data-offset-top="20">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav class="navbar navbar-default">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#fixed-collapse-navbar" aria-expanded="false">
                  <span class="icon-bar top-bar"></span> <span class="icon-bar middle-bar"></span> <span class="icon-bar bottom-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/content/static/images/logo.png" alt="logo" class="img-responsive"></a>
              </div>

              <div id="fixed-collapse-navbar" class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">
                  <?php
                  for ($i = 0; $i < count($data['navigate']); $i++) {
                    $title = $data['navigate'][$i]['title'];
                    $href = $data['navigate'][$i]['href'];
                    if ($data['navigate'][$i]['childs'] == null) {
                      echo "<li><a href='$href'>$title</a></li>";
                    } else {
                      echo
                        '<li class="dropdown">
                        <a href="' . $href . '" class="dropdown-toggle" data-toggle="dropdown">' . $title . '</a>
                        <ul class="dropdown-menu">';
                      for ($j = 0; $j < count($data['navigate'][$i]['childs']); $j++) {
                        $chTilte = $data['navigate'][$i]['childs'][$j]['title'];
                        $chHref = $data['navigate'][$i]['childs'][$j]['href'];
                        echo "<li><a href='$chHref'>$chTilte</a></li>";
                      }
                      echo '</ul>
                      </li>';
                    }
                  }
                  ?>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--Header-->
  <?php
  if (isset($data['succsess'])) {
    echo "<div class='row'><div class='col-md-6'><div class='alert alert-success' role='alert'>" . $data['succsess'] . "</div></div></div>";
  }
  if (isset($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
  }
  ?>
  <?php require_once $contentView; ?>
  <!--Footer-->
  <footer class="padding-top bg_black">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 footer_column">
          <h4 class="heading">Почему Мы?</h4>
          <hr class="half_space">
          <p class="half_space">Ответ очень прост. Для нас сдоровый, сытый и удовлетворенный клиент - это стандарт нашей работы</p>
          <!-- <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.</p> -->
        </div>
        <div class="col-md-4 col-sm-6 footer_column">
          <h4 class="heading">Рассылка новостей</h4>
          <hr class="half_space">
          <p class="icon"><i class="icon-dollar"></i>Зарегистрируйтесь, укажите свой адресс электронной почты, и мы отправим Вам свежие новости</p>
          <div id="result1" class="text-center"></div>

          <form action="/subscribe" method="get" class="newsletter">
            <div class="form-group">
              <input type="email" placeholder="E-mail Address" required name="email" class="form-control" />
            </div>
            <div class="form-group">
              <input type="submit" class="btn-submit button3" value="Подписаться" />
            </div>
          </form>
        </div>
        <div class="col-md-4 col-sm-6 footer_column">
          <h4 class="heading">Контактная информация</h4>
          <hr class="half_space">
          <p>Контактные данные ношего заведения</p>
          <p class="address"><i class="icon-location"></i><?php echo $data['options']['adress']; ?></p>
          <p class="address"><i class="fa fa-phone"></i><?php echo $data['options']['contactphone']; ?></p>
          <p class="address"><i class="icon-dollar"></i><a href="mailto:hello@website.com"><?php echo $data['options']['email']; ?></a></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="copyright clearfix">
            <p>Разработчик &copy; <?php echo $data['options']['author'];?></p>
            <!-- <ul class="social_icon">
              <li><a href="#" class="facebook"><i class="icon-facebook5"></i></a></li>
              <li><a href="#" class="twitter"><i class="icon-twitter4"></i></a></li>
              <li><a href="#" class="google"><i class="icon-google"></i></a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" id="back-top"><i class="fa fa-angle-up fa-2x"></i></a>

  <script src="/content/static/js/jquery-2.2.3.js" type="text/javascript"></script>
  <script src="/content/static/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/content/static/js/jquery.themepunch.tools.min.js"></script>
  <script src="/content/static/js/jquery.themepunch.revolution.min.js"></script>
  <script src="/content/static/js/revolution.extension.layeranimation.min.js"></script>
  <script src="/content/static/js/revolution.extension.navigation.min.js"></script>
  <script src="/content/static/js/revolution.extension.parallax.min.js"></script>
  <script src="/content/static/js/revolution.extension.slideanims.min.js"></script>
  <script src="/content/static/js/revolution.extension.video.min.js"></script>
  <script src="/content/static/js/slider.js" type="text/javascript"></script>
  <script src="/content/static/js/owl.carousel.min.js" type="text/javascript"></script>
  <script src="/content/static/js/jquery.parallax-1.1.3.js"></script>
  <script src="/content/static/js/jquery.mixitup.min.js"></script>
  <script src="/content/static/js/jquery-countTo.js"></script>
  <script src="/content/static/js/jquery.appear.js"></script>
  <script src="/content/static/js/jquery.fancybox.js"></script>
  <script src="/content/static/js/functions.js" type="text/javascript"></script>

</body>

</html>