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
          <button class="btn btn-warning btn-sm">Register</button>
        </div>
        <?php
          }
          ?>
      </div>
    </div>
  </nav>

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
        header('Location: ./pages/auth/signin.php');
        exit;
      } else {
        include "./pages/error/error404.php";
      }
    } 
  ?>


</body>

</html>