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
      <a class="navbar-brand" href="./index.php">Logo</a>
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
        <a class="navbar-brand" href="#">
          <img src="./image/avatar.jpg" alt="Logo" style="width:40px;" class="rounded-pill">
        </a>

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
      } else {
        include "./pages/error/error404.php";
      }
    } 
  ?>


</body>

</html>