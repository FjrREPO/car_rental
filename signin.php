<?php
session_start();
include 'includes/config.php'; // Include any other necessary files

// Rest of your login logic
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card_title">
                <h1>Login</h1>
                <span>Not have an account? <a href="user_signup.php">Sign Up</a></span>
            </div>
            <div class="form">
                <form method="post">
                    <input type="email" name="email" placeholder="Email" id="email" />
                    <input type="password" name="password" id="password" placeholder="Password" required />
                    <button type="submit" name="login" class="submit-btn">Login</button>
                </form>
                <?php
                if (isset($_POST['login'])) {
                    $email = htmlspecialchars($_POST['email']);
                    $password = $_POST['password'];
                    $hashedPassword = md5($password);

                    // Admin login
                    $stmt_admin = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
                    $stmt_admin->bind_param("ss", $email, $hashedPassword);
                    $stmt_admin->execute();
                    $result_admin = $stmt_admin->get_result();

                    // User login
                    $stmt_user = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
                    $stmt_user->bind_param("ss", $email, $hashedPassword);
                    $stmt_user->execute();
                    $result_user = $stmt_user->get_result();

                    if ($result_admin->num_rows > 0) {
                        $_SESSION['admin_email'] = $email;
                        header("Location: admin/index.php");
                        exit();
                    } else if ($result_user->num_rows > 0) {
                        $_SESSION['user_email'] = $email;
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "Invalid email or password";
                    }

                    $stmt_admin->close();
                    $stmt_user->close();
                    $conn->close();
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
