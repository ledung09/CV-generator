<!DOCTYPE html>
<html lang="en">

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
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="./index.php">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="./index.php?page=addcv">Add CV</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Link</a>
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
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      if ($page == 'addcv') {
        include "./pages/cv/cv.php";
      }
    }
  ?>


</body>

</html>