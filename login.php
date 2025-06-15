<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT admin_id, username, password, role FROM admins WHERE username = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $role);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so, start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["admin_id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["role"] = $role; // Store the role

                            // Redirect user based on role
                            switch ($role) {
                                case 'global_admin':
                                    header("location: global_admin.php");
                                    break;
                                case 'hod_admin':
                                    header("location: hod_admin.php");
                                    break;
                                case 'haa_admin':
                                    header("location: haa_admin.php");
                                    break;
                                case 'hsa_admin':
                                    header("location: hsa_admin.php");
                                    break;
                                case 'teacher_admin':
                                    header("location: teacher_admin.php");
                                    break;
                                case 'fa_admin':
                                    header("location: fa_admin.php");
                                    break;
                                default:
                                    header("location: index.php"); // Default redirect
                                    break;
                            }
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Something wrong!. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($con);
}
?>

<!-- Login Form -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="css/style.css" />
    <!--fav-icon-->
    <link rel="shortcut icon" href="images/favicon.png" />

</head>

<body>
    <section class="main" style="background-image: url(images/hero-bg.png); height: 100vh; display: flex; justify-content: center; align-items: center;">

        <nav>
            <a href="#" class="logo">
                <img src="images/logo.png" width="320px" />
            </a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn">
                <span class="nav-icon"></span>
            </label>
            <ul class="menu" style="border-radius: 5px;">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Departments</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">University-Info</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>

        <div class="container my-4" style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <div class="card mx-auto" style="width: 20rem;"><br>
                <img class="card-img-top mx-auto" src="images/admin-login.jpg" style="width: 60%;" alt="Card image cap">
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div><br>

                        <button type="submit" class="btn btn-warning"><i class="fa fa-lock">&nbsp;</i> Login</button> &nbsp; &nbsp;
                        <button type="reset" class="btn btn-danger"><i class="fa fa-repeat">&nbsp;</i> Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--footer section-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>