<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Админ панель - Управление вертолетом</title>

  <!-- Favicons -->
  <link href="/admin/static/img/favicon.png" rel="icon">
  <link href="/admin/static/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="/admin/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="/admin/static/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="/admin/static/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="/admin/static/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="/admin/static/css/style.css" rel="stylesheet">
  <link href="/admin/static/css/style-responsive.css" rel="stylesheet">
  <script src="/admin/static/lib/chart-master/Chart.js"></script>

</head>

<body>
<div class="container">

<?php
  if (isset($data['succsess'])) {
    echo "<div class='row'><div class='col-md-6'><div class='alert alert-success' role='alert'>" . $data['succsess'] . "</div></div></div>";
  }
  if (isset($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
  }
?>
</div>
    <?php require_once $contentView; ?>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="/admin/static/lib/jquery/jquery.min.js"></script>

  <script src="/admin/static/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="/admin/static/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="/admin/static/lib/jquery.scrollTo.min.js"></script>
  <script src="/admin/static/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="/admin/static/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="/admin/static/lib/common-scripts.js"></script>
  <script type="text/javascript" src="/admin/static/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="/admin/static/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="/admin/static/lib/sparkline-chart.js"></script>
</body>

</html>
