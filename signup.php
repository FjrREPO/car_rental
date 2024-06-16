<!DOCTYPE html>
<html lang="en">

<head>
  <title>Create Account</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
  <section class="bg-gray-50">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#"
        class="flex items-center mb-6 text-2xl font-semibold text-gray-300 bg-slate-900 px-10 py-5 rounded-lg">
        <img class="w-20 h-auto mr-2"
          src="https://res.cloudinary.com/dutlw7bko/image/upload/v1718443581/project-orang/logo_hd1xuk.png" alt="logo">
        Sewa.In
      </a>
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
            Sign in
          </h1>
          <form class="space-y-4 md:space-y-6" method="post">
            <div>
              <label for="fname" class="block mb-2 text-sm font-medium text-gray-900">
                Nama lengkap</label>
              <input type="text" name="fname" id="fname"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Nama lengkap" required="">
            </div>
            <div>
              <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">
                Nomor telepon</label>
              <input type="tel" name="phone" id="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Nomor telepon" required="">
            </div>
            <div>
              <label for="license" class="block mb-2 text-sm font-medium text-gray-900">
                Nomor plat</label>
              <input type="tel" name="license" id="license"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Nomor plat" required="">
            </div>
            <div>
              <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Pilih jenis kelamin</label>
              <select id="gender" name="gender"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected disabled hidden class="text-gray-500">Pilih jenis kelamin</option>
                <option value="male">Pria</option>
                <option value="female">Wanita</option>
                <option value="other">Lainnya</option>
              </select>
            </div>
            <div>
              <label for="textfield" class="block mb-2 text-sm font-medium text-gray-900">
                Alamat</label>
              <input type="text" name="textfield" id="textfield"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="alamat" required="">
            </div>
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
            <button type="submit" name="save"
              class="w-full text-white bg-blue-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
              up</button>
            <p class="text-sm font-light text-gray-500">
              Sudah punya akun? <a href="signin.php" class="font-medium text-blue-500 hover:underline">Sign
                in</a>
            </p>
          </form>
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'includes/config.php';
            $user_name = $_POST['fname'];
            $phone = $_POST['phone'];
            $license = $_POST['license'];
            $gender = $_POST['gender'];
            $address = $_POST['textfield'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $duplicateEmail = "SELECT * FROM users WHERE email = '$email'";

            $sql = "INSERT INTO users (user_name, phone, license, gender, address, email, password)            
              VALUES ('$user_name', '$phone', '$license', '$gender', '$address', '$email', '$password')";

            $result = mysqli_query($conn, $duplicateEmail);
            if (mysqli_num_rows($result) > 0) {
              echo "<script type = \"text/javascript\">
                alert(\"Email Sudah Digunakan!\");
                window.location = (\"signup.php\")
                </script>";
            }
            if ($conn->query($sql) === TRUE) {
              echo "<script type = \"text/javascript\">
                alert(\"Sign Up Successful!\");
                window.location = (\"signin.php\")
                </script>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
          }
          ?>
        </div>
      </div>
    </div>
  </section>
</body>

</html>