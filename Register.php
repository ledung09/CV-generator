<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
        }

        .registration-container {
            max-width: 400px; /* Set a maximum width for the container */
            margin: auto; /* Center the container horizontally */
            margin-top: 100px; /* Add some top margin for better spacing */
        }

        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        }
    </style>
</head>
<body>

<div class="container registration-container">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-4">User Registration</h2>
            <form method="post" action="register_action.php">
                <!-- Input fields for registration -->
                <?php
                    // Check for error parameter in the URL
                    if (isset($_GET['error']) && $_GET['error'] === 'username_exists') {
                        echo '<div class="alert alert-danger" role="alert">Username has already been used. Please choose a different username.</div>';
                    }
                    ?>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js CDN (for optional Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
