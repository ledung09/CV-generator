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
    <div class="col-md d-flex justify-content-center align-items-center">
      <form action="./register_processing.php" method="post" class="w-50">
        <h2 class="text-center mb-4">Register new account</h2>
        <div class="mb-3 mt-3">
          <label for="username" class="form-label">Username:</label>
          <input type="username" class="form-control" id="username" placeholder="Enter username" name="username"
            required value="<?php if (isset($_SESSION['reg_fail'])) echo $_SESSION['reg_fail'];?>">
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="toast show w-100 mb-3">
          <div class="toast-header">
            <strong class="me-auto" style="font-size: 13px;">Username requirement</strong>
          </div>
          <div class="toast-body">
            <ul class="list-style-circle mb-0" style="font-size: 13px;">
              <li>From 4 - 50 characters</li>
              <li>Only contain ASCII character.</li>
            </ul>
          </div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"
            required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="toast show w-100 mb-3">
          <div class="toast-header">
            <strong class="me-auto" style="font-size: 13px;">Password requirement</strong>
          </div>
          <div class="toast-body">
            <ul class="list-style-circle mb-0" style="font-size: 13px;">
              <li>From 6 - 50 characters</li>
              <li>Only contain ASCII character.</li>
            </ul>
          </div>
        </div>
        <!-- <div class="form-check mb-3">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div> -->
        <?php 
        if (isset($_SESSION['reg_fail'])) {
        ?>
        <div class="alert alert-danger alert-dismissible mt-4">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Warning!</strong> Register unsuccessful.
        </div>
        <?php
        }
        ?>
        <button type="submit" class="btn btn-primary w-100 mt-4 disabled" id='login-submit'>Register</button>
        <p class="text-center my-4" style="font-size: 15px;">Already have an account? <u class="text-primary"><a
              href="/pages/auth/signin.php" class="text-primary">Signin</a></u> instead!</p>
      </form>
    </div>
    <div class="col-md bg-black d-md-flex d-none d-flex align-items-center">
      <img class="w-100" src="https://i.ytimg.com/vi/XyB8GuwWMIs/maxresdefault.jpg" alt="">
    </div>
  </main>

  <script>
  var usernameList = []

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Parse the JSON response
      usernameList = JSON.parse(xhr.responseText);
    }
  };

  xhr.open("GET", "../../db/getuser.php", true);
  xhr.send();

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
    else if (usrInp.length < 4) invalidFeeedback(username, 0, 'Minimum 4 characters!')
    else if (usrInp.length > 50) invalidFeeedback(username, 0, 'Maximum 50 characters!')
    else if (!asciiRegex.test(usrInp)) invalidFeeedback(username, 0, 'Only allow ASCII chacter!')
    else if (usernameList.includes(usrInp)) invalidFeeedback(username, 0, 'Username choosen, pick another one!')


    if (passInp.length == 0) invalidFeeedback(password, 1, 'Do not leave empty!')
    else if (passInp.length < 6) invalidFeeedback(password, 1, 'Minimum 6 characters!')
    else if (passInp.length > 50) invalidFeeedback(password, 1, 'Maximum 50 characters!')
    else if (!asciiRegex.test(passInp)) invalidFeeedback(password, 1, 'Only allow ASCII chacter!')
  }

  username.addEventListener('keyup', validateLoginInput)
  password.addEventListener('keyup', validateLoginInput)
  </script>
</body>

</html>

<?php
if (isset($_SESSION['reg_fail'])) unset($_SESSION['reg_fail']);
?>