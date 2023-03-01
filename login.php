<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login: Employee Management System</title>
</head>

<body>
    <?php
    session_start();
    include('navbar.php');
    include('logging_inc.php');
   
    ?>
    <div class="container">

        <?php
        if ($_SESSION['error_login']) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                <strong>Error:</strong> Please check your typing and try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        unset($_SESSION['error_login']);
        ?>


        <div class="row mt-4">
            <div class="col-4 offset-4">
                <form action="login_process.php" method="POST">
                    <h3 class="text-center">Please login</h3>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input name="email" type="email" id="email1" class="form-control" placeholder="Please type your username" />
                        <label class="form-label" for="email1">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input name="password" type="password" id="password2" class="form-control" placeholder="Please type your password" />
                        <label class="form-label" for="password2">Password</label>
                    </div>


                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary  w-100 mb-4">Sign in</button>
                    <div class="text-center">
                        <p>Not a member? <a href="register.php">Register</a></p>

                </form>
            </div>
        </div>
    </div> <!-- close container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
