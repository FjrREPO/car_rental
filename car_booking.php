<!DOCTYPE html>
<html lang="en">

<head>
  <title>Detail Mobil</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>


<body>
  <?php
  include 'includes/config.php';
  include 'includes/header.php';

  $car_id = $_REQUEST['car_id'];

  if (!isset($_SESSION['user_email'])) {
    echo '<script>window.location.href = "signin.php";</script>';
  }

  $sql = "SELECT * FROM cars WHERE car_id = $car_id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  } else {
    echo "Car details not found";
  }
  ?>

  <div class="py-10 w-full h-full">
    <div class="text-3xl font-bold text-center py-5"><?php echo $row['car_make']; ?> <?php echo $row['car_model']; ?>
    </div>
    <div class="grid gap-4">
      <div class="w-full flex justify-center">
        <img id="mainImage" class="h-auto max-w-[95%] sm:max-w-[600px] sm:w-[600px] rounded-lg"
          src="<?php echo $row['image1']; ?>" alt="">
      </div>
      <div class="w-full flex justify-center">
        <div class="grid grid-cols-5 gap-4 max-w-[95%] sm:max-w-[600px]">
          <div>
            <img onclick="changeImage('<?php echo $row['image1']; ?>')"
              class="h-auto max-w-full rounded-lg cursor-pointer" src="<?php echo $row['image1']; ?>" alt="">
          </div>
          <div>
            <img onclick="changeImage('<?php echo $row['image2']; ?>')"
              class="h-auto max-w-full rounded-lg cursor-pointer" src="<?php echo $row['image2']; ?>" alt="">
          </div>
          <div>
            <img onclick="changeImage('<?php echo $row['image3']; ?>')"
              class="h-auto max-w-full rounded-lg cursor-pointer" src="<?php echo $row['image3']; ?>" alt="">
          </div>
          <div>
            <img onclick="changeImage('<?php echo $row['image4']; ?>')"
              class="h-auto max-w-full rounded-lg cursor-pointer" src="<?php echo $row['image4']; ?>" alt="">
          </div>
          <div>
            <img onclick="changeImage('<?php echo $row['image5']; ?>')"
              class="h-auto max-w-full rounded-lg cursor-pointer" src="<?php echo $row['image5']; ?>" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="w-full flex justify-center">
      <div class="w-[95%] sm:max-w-[600px] pt-5 px-5 sm:px-0 flex flex-col">
        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
          <p class="text-base leading-4 text-gray-800">Kapasitas</p>
          <div class="flex items-center justify-center">
            <p class="text-sm leading-none text-gray-600"><?php echo $row['capacity']; ?> orang</p>
            <img class="block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2dark.svg"
              alt="next">
          </div>
        </div>
        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
          <p class="text-base leading-4 text-gray-800">Stok</p>
          <div class="flex items-center justify-center">
            <p class="text-sm leading-none text-gray-600 mr-3">Sisa <?php echo $row['availability']; ?></p>
            <img class="block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2dark.svg"
              alt="next">
          </div>
        </div>
        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
          <p class="text-base leading-4 text-gray-800">Harga</p>
          <div class="flex items-center justify-center">
            <p class="text-sm leading-none text-gray-600 mr-3">
              <?php echo 'Rp ' . number_format($row['rate']) . ' / Hari'; ?>
            </p>
            <img class="block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2dark.svg"
              alt="next">
          </div>
        </div>

        <form method="POST" class="py-4 border-b border-gray-200">
          <h3 class="mb-5 text-lg font-medium text-gray-900 text-center pt-10">Pilih metode pembayaran</h3>
          <ul class="grid w-full gap-6 md:grid-cols-2">
            <li>
              <input type="radio" id="payment-bri" name="payment_method" value="bri" class="hidden peer" required>
              <label for="payment-bri"
                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                <div class="block">
                  <div class="w-full text-lg font-semibold">BRI</div>
                  <div class="w-full">1234-5678-9012-3456</div>
                </div>
                <img class="w-20 h-auto rounded-lg"
                  src="https://i0.wp.com/umsu.ac.id/berita/wp-content/uploads/2023/09/Cara-dan-Syarat-Membuka-Rekening-BRI-2023.jpg?fit=1920%2C1080&ssl=1"
                  alt="">
              </label>
            </li>
            <li>
              <input type="radio" id="payment-bni" name="payment_method" value="bni" class="hidden peer" required>
              <label for="payment-bni"
                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                <div class="block">
                  <div class="w-full text-lg font-semibold">BNI</div>
                  <div class="w-full">1234-5678-9012-3456</div>
                </div>
                <img class="w-20 h-auto rounded-lg bg-white py-3 px-2"
                  src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/1280px-BNI_logo.svg.png"
                  alt="">
              </label>
            </li>
            <li>
              <input type="radio" id="payment-bca" name="payment_method" value="bca" class="hidden peer" required>
              <label for="payment-bca"
                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                <div class="block">
                  <div class="w-full text-lg font-semibold">BCA</div>
                  <div class="w-full">1234-5678-9012-3456</div>
                </div>
                <img class="w-20 h-auto rounded-lg bg-white py-3 px-2"
                  src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/2560px-Bank_Central_Asia.svg.png"
                  alt="">
              </label>
            </li>
          </ul>
          <div class="flex items-center py-5">
            <div class="relative w-full">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
              </div>
              <input name="start-date" type="date" id="start-date" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                placeholder="Pilih tanggal kapan digunakan">
            </div>
            <span class="mx-4 text-gray-500">sampai</span>
            <div class="relative w-full">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
              </div>
              <input name="end-date" type="date" id="end-date" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                placeholder="Pilih tanggal selesai digunakan">
            </div>
          </div>

          <button type="submit"
            class="focus:outline-none focus:ring-2 duration-200 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none rounded-lg">
            Pesan mobil ini!
          </button>
        </form>
        <div>
          <p class="text-base leading-4 mt-7 text-gray-600">Nama mobil: <?php echo $row['car_make']; ?></p>
          <p class="text-base leading-4 mt-2 text-gray-600">Model mobil: <?php echo $row['car_model']; ?></p>
          <p class="text-base leading-4 mt-2 text-gray-600">Tahun terbit mobil: <?php echo $row['year']; ?></p>
          <p class="text-base leading-4 mt-2 text-gray-600">Penumpang: <?php echo $row['capacity']; ?> orang</p>
          <p class="text-base leading-4 mt-2 text-gray-600">Transmisi: <?php echo $row['transmission']; ?></p>
          <p class="text-base leading-4 mt-2 text-gray-600">Plat: <?php echo $row['license_plate']; ?></p>
          <p class="text-base leading-4 mt-2 text-gray-600">Bahan bakar: <?php echo $row['fuel_type']; ?></p>
          <p class="text-base leading-4 mt-2 text-gray-600">Kilometer: <?php echo $row['mileage']; ?></p>
          <p class="text-base leading-4 mt-2 text-gray-600">Lokasi: <?php echo $row['car_location']; ?></p>
        </div>
      </div>
    </div>
    <script>
      function changeImage(newSrc) {
        document.getElementById('mainImage').src = newSrc;
      }
    </script>
  </div>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_method = htmlspecialchars($_POST['payment_method'], ENT_QUOTES, 'UTF-8');
    $start_date = htmlspecialchars($_POST['start-date'], ENT_QUOTES, 'UTF-8');
    $end_date = htmlspecialchars($_POST['end-date'], ENT_QUOTES, 'UTF-8');

    if (!$payment_method || !$start_date || !$end_date) {
      echo "<script>alert('Isi semua data!');</script>";
      exit;
    }

    $start_timestamp = strtotime($start_date);
    $end_timestamp = strtotime($end_date);
    $today_timestamp = strtotime(date("Y-m-d"));

    if ($payment_method == '') {
      echo "<script>alert('Pilih metode pembayaran!');</script>";
      exit;
    }

    if ($start_timestamp < $today_timestamp || $end_timestamp <= $today_timestamp || $start_timestamp > $end_timestamp || $start_date == $end_date) {
      echo "<script>alert('Tanggal harus sesuai!');</script>";
      exit;
    }

    $days = ($end_timestamp - $start_timestamp) / (60 * 60 * 24) + 1;
    $total_amount = $days * $row['rate'];

    $user_email = $_SESSION['user_email'];
    $query = "SELECT user_id FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();
    $user_id = $rows['user_id'];
    $stmt->close();

    $sql_insert = "INSERT INTO hire (car_id, user_id, start_date, end_date, total_amount, payment_method, user_email, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("iississ", $car_id, $user_id, $start_date, $end_date, $total_amount, $payment_method, $user_email);
    if ($stmt->execute()) {
      $hire_id = $stmt->insert_id;

      $sql_insert_transaction = "INSERT INTO transaction (hire_id, amount, payment_method, status) VALUES (?, ?, ?, 'Car Booked')";
      $stmt_trans = $conn->prepare($sql_insert_transaction);
      $stmt_trans->bind_param("iis", $hire_id, $total_amount, $payment_method);
      if ($stmt_trans->execute()) {
        echo "<script>alert('Booking Placed Successfully! Wait for Admin Approval..'); window.location = 'booking_details.php';</script>";
      } else {
        echo "Error inserting into transaction table: " . $stmt_trans->error;
      }
      $stmt_trans->close();
    } else {
      echo "Error inserting into hire table: " . $stmt->error;
    }
    $stmt->close();
  }

  $conn->close();
  ?>
  ?>

</body>

</html>