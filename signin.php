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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#"
                class="flex items-center mb-6 text-2xl font-semibold text-gray-300 bg-slate-900 px-10 py-5 rounded-lg">
                <img class="w-20 h-auto mr-2"
                    src="https://res.cloudinary.com/dutlw7bko/image/upload/v1718443581/project-orang/logo_hd1xuk.png"
                    alt="logo">
                Sewa.In
            </a>
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Sign in
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="post">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="login"
                            class="w-full text-white bg-blue-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                            in</button>
                        <p class="text-sm font-light text-gray-500">
                            Belum punya akun? <a href="signup.php"
                                class="font-medium text-blue-500 hover:underline">Sign up</a>
                        </p>
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
    </section>
</body>

</html>