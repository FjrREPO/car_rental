<?php
include 'includes/config.php';
include 'includes/header.php';

$car_id = $_REQUEST['car_id']; 

if (!isset($_SESSION['user_email'])) {
  echo '<script>window.location.href = "signin.php";</script>';
}

?>
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
        <img id="mainImage" class="h-auto max-w-[95%] sm:max-w-[600px] sm:w-[600px] rounded-lg" src="<?php echo $row['image1']; ?>"
          alt="">
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
            <img class="hidden dark:block"
              src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2dark.svg" alt="next">
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
    if (!isset($_SESSION['user_email'])) {
      header("Location: signin.php");
      exit();
    } else {
      $user_email = $_SESSION['user_email'];

      $query = "SELECT user_id FROM users WHERE email = '$user_email'";
      $result = $conn->query($query);
      $rows = $result->fetch_assoc();
      $user_id = $rows['user_id'];

      $start_date = $_POST['start-date'];
      $end_date = $_POST['end-date'];

      $today = date("Y-m-d");

      echo "Start Date: $start_date<br>";
      echo "End Date: $end_date<br>";
      echo "User Email: $user_email<br>";

      $start_timestamp = strtotime($start_date);
      $end_timestamp = strtotime($end_date);
      $today_timestamp = strtotime($today);

      if ($start_timestamp < $today_timestamp || $end_timestamp <= $today_timestamp || $start_timestamp > $end_timestamp || $start_date == $end_date) {
        echo "<script type='text/javascript'>
                    alert('Invalid date selection. Please choose valid dates.');
                    </script>";
      } else {
        $days = (strtotime($end_date) - strtotime($start_date)) / (60 * 60 * 24) + 1;
        $total_amount = $days * $row['rate'];

        $sql_insert = "INSERT INTO hire (car_id, user_id, start_date, end_date, total_amount, user_email, status)
                      VALUES ($car_id, $user_id, '$start_date', '$end_date', $total_amount, '$user_email', 'Pending')";

        if ($conn->query($sql_insert) === TRUE) {
          $hire_id = $conn->insert_id;

          $sql_insert_transaction = "INSERT INTO transaction (hire_id, amount, status) VALUES ($hire_id, $total_amount, 'Car Booked')";
          if ($conn->query($sql_insert_transaction) === TRUE) {
            echo "<script type='text/javascript'>
                      alert('Booking Placed Successfully! Wait for Admin Approval..');
                      window.location = ('booking_details.php');
                      </script>";
          } else {
            echo "Error inserting into transaction table: " . $stmt->error;
          }
        } else {
          echo "Error inserting into hire table: " . $stmt->error;
        }
      }
    }
  }

  $stmt->close();
  $conn->close();
  ?>

</body>

</html>