<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../../styles/global.css">
</head>

<body>
  <main class="row h-100 w-100">
    <div class="col-md bg-black d-md-flex d-none">
      <img class="hw-100" style="object-fit: contain;"
        src="https://png.pngtree.com/thumb_back/fh260/background/20191014/pngtree-watercolor-black-white-brush-background-image_319313.jpg"
        alt="" srcset="">
    </div>
    <div class="col-md d-flex justify-content-center align-items-center">
      <form action="./signin_processing.php" method="post" class="w-50">
        <h2 class="text-center">Signin to your account</h2>
        <p class="text-secondary text-center mt-3 mb-4">Please signin to continue</p>
        <div class="mb-3 mt-3">
          <label for="username" class="form-label">Username:</label>
          <input type="username" class="form-control" id="username" placeholder="Enter username" name="username"
            required value="<?php if (isset($_SESSION['login_fail'])) echo $_SESSION['login_fail'];?>">
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"
            required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <!-- <div class="form-check mb-3">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div> -->
        <?php 
        if (isset($_SESSION['login_fail'])) {
        ?>
        <div class="alert alert-danger alert-dismissible mt-4">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Warning!</strong> Wrong username or password.
        </div>
        <?php
        }
        ?>
        <button type="submit" class="btn btn-primary w-100 mt-4 disabled" id='login-submit'>Signin</button>
        <p class="text-center my-4" style="font-size: 15px;">Don't have account yet? <u class="text-primary"><a
              href="/pages/auth/register.php" class="text-primary">Register</a></u> instead!</p>
      </form>
    </div>
  </main>

  <script>
  // Validate user input
  const username = document.getElementById('username')
  const password = document.getElementById('password')

  function invalidFeeedback(inp_item, warning_id, warning_text) {
    inp_item.classList.remove('is-valid')
    inp_item.classList.add('is-invalid')
    document.getElementsByClassName('invalid-feedback')[warning_id].textContent = warning_text;
    document.getElementById('login-submit').classList.add('disabled')
  }

  function validateLoginInput() {
    const asciiRegex = /^[\x00-\x7F]+$/;
    var usrInp = username.value;
    var passInp = password.value;

    username.classList.remove('is-invalid')
    username.classList.add('is-valid')

    password.classList.remove('is-invalid')
    password.classList.add('is-valid')

    document.getElementById('login-submit').classList.remove('disabled')


    if (usrInp.length == 0) invalidFeeedback(username, 0, 'Do not leave empty!')
    else if (usrInp.length > 50) invalidFeeedback(username, 0, 'Maximum 50 characters!')
    else if (!asciiRegex.test(usrInp)) invalidFeeedback(username, 0, 'Only allow ASCII chacter!')

    if (passInp.length == 0) invalidFeeedback(password, 1, 'Do not leave empty!')
    else if (passInp.length > 50) invalidFeeedback(password, 1, 'Maximum 50 characters!')
    else if (!asciiRegex.test(passInp)) invalidFeeedback(password, 1, 'Only allow ASCII chacter!')
  }

  username.addEventListener('keyup', validateLoginInput)
  password.addEventListener('keyup', validateLoginInput)
  </script>
</body>

</html>

<?php
if (isset($_SESSION['login_fail'])) unset($_SESSION['login_fail']);
?>