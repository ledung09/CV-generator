<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../../global.css">
</head>

<body>
  <main class="row h-100 w-100">
    <div class="col-md bg-black d-md-block d-none"></div>
    <div class="col-md d-flex justify-content-center align-items-center">
      <form action="/action_page.php" class="w-50">
        <h3 class="text-center">Signin to your account</h3>
        <p class="text-secondary text-center">Please signin to continue</p>
        <div class="mb-3 mt-3">
          <label for="username" class="form-label">Username:</label>
          <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <div class="form-check mb-3">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
      </form>
    </div>
  </main>
</body>

</html>