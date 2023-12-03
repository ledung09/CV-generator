<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/74bc185944.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./styles/global.css" />
  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="z-index: 2000;">
    <div class="container">
      <a class="navbar-brand me-4" href="./index.php">
        <div class="d-flex flex-column gap-1 align-items-center">
          <i class="fa-regular fa-file-code"></i>
          <p style="font-size: 8px;">CVgens</p>
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="./index.php?page=manageCVs">Manage CVs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.php?page=createCV">Create CV</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Generate CV</a>
          </li>
        </ul>
        <?php 
          if (isset($_SESSION['user_id'])) {
        ?>
        <div class="d-flex align-items-center gap-3 my-sm-0 mt-2 mb-1">
          <div class="navbar-brand m-0" href="#">
            <img src="./image/avatar.jpg" alt="Logo" style="width:40px;" class="rounded-pill">
          </div>
          <button class="btn btn-danger btn-sm" onclick="window.location.href='/pages/auth/signout.php'">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </button>
        </div>

        <?php
          } else {
        ?>
        <div class="d-flex align-items-center gap-3 my-sm-0 mt-2 mb-1">
          <button class="btn btn-primary btn-sm" onclick="window.location.href='/index.php?page=login'">Login</button>
          <button class="btn btn-warning btn-sm"
            onclick="window.location.href='/index.php?page=register'">Register</button>
        </div>
        <?php
          }
          ?>
      </div>
    </div>
  </nav>
  <?php
    if ($_SERVER['REQUEST_URI'] === '/index.php' || $_SERVER['REQUEST_URI'] === '/index.php?page=login') {
  ?>

  <script>
  var xhttpNews = new XMLHttpRequest();

  xhttpNews.onreadystatechange = function() {
    if (xhttpNews.readyState == 4 && xhttpNews.status == 200) {
      // Parse the JSON response
      var res = xhttpNews.responseText
      console.log(res);
    }
  };

  xhttpNews.open("GET",
    "https://newsapi.org/v2/everything?q=jobs&from=2023-12-02&sortBy=publishedAt&apiKey=c6f5c93717154916acebbe9030635488",
    true);
  xhttpNews.send();
  </script>

  <main class="container mt-4">
    <div class="row">
      <div class="col-md">
        <div class="px-2 cursor-pointer" onclick="window.location.href=''">
          <div class="w-100 d-flex justify-content-center mb-3">
            <img
              src="data:image/png;base64,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"
              alt="" style="max-height: 150px;">
          </div>
          <h5 class="text-center my-2">Dyson solía ser un fabricante de electrodomésticos de alta gama</h5>
          <p style="text-align: justify;">Tres anécdotas para arrancar este artículo.\n\nUna. Cuando Dyson lanzó la
            primera versión
            de su
            secador de
            pelo, uno de los medios que se hicieron eco del lanzamiento fue El Confidencial a través del blog</p>
          <p class="text-end my-2"><em><strong>@authorname</strong></em></p>
        </div>
      </div>
      <div class="col-md">aa</div>
      <div class="col-md">aa</div>
    </div>
  </main>
  <?php
    }
  ?>
  <?php 
    // state: -1 - initial, 0 - create, 1 - view/update
    $state = -1;
    $id = -1;
    
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      if ($page == 'createCV') {
        $state = 0;
        include "./pages/cv/cv.php";
      } else if ($page == 'reviewCV') {
        if (isset($_GET['id'])) $id = $_GET['id'];
        $state = 1;
        include "./pages/cv/cv.php";
      } else if ($page == 'manageCVs') {
        include "./pages/manage/manage.php";
      } else if ($page == 'login') {
        ?>
  <script>
  window.location.href = '/pages/auth/signin.php';
  </script>
  <?php
      } else if ($page == 'register') {
        ?>
  <script>
  window.location.href = '/pages/auth/register.php';
  </script>
  <?php

      } else if ($page == 'home') {
        ?>
  <script>
  window.location.href = '/index.php';
  </script>
  <?php

      } else {
        include "./pages/error/error404.php";
      }
    } 
  ?>


</body>

</html>