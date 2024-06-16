<!DOCTYPE html>
<html lang="en">

<head>
  <title>My Bookings</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
  <?php
  include 'includes/header.php';
  include 'includes/config.php';
  ?>

  <div class="py-5">
    <h1 class="text-3xl font-bold text-center">Booking Saya</h1>

    <?php
    $user_email = $_SESSION['user_email'];

    $sql = "SELECT cars.car_id, cars.image1, cars.car_make, cars.car_model, cars.rate, hire.hire_id, hire.status, hire.start_date, hire.end_date, hire.total_amount, hire.time 
            FROM cars 
            JOIN hire ON cars.car_id = hire.car_id
            JOIN users ON users.email = hire.user_email
            WHERE users.email = '$user_email'
            ORDER BY hire_id DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      ?>
      <div class="flex flex-row flex-wrap justify-center items-center w-full h-auto">
        <?php
        while ($row = $result->fetch_assoc()) {
          $start_timestamp = strtotime($row['start_date']);
          $end_timestamp = strtotime($row['end_date']);
          $total_days = ($end_timestamp - $start_timestamp) / (60 * 60 * 24) + 1;

          $amount_due = 0;
          if ($row['status'] == 'Approved') {
            $today_date = strtotime(date('Y-m-d'));
            $actual_usage = ($today_date - $start_timestamp) / (60 * 60 * 24) + 1;
            $amount_due = ($actual_usage * $row['rate']) - $row['total_amount'];
          }
          ?>
          <div
            class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
            <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
              <img class="object-cover" src="<?php echo $row['image1']; ?>" alt="Car Image">
            </a>
            <div class="mt-4 px-5 pb-5">
              <a href="car_booking.php?car_id=<?php echo $row['car_id']; ?>">
                <h5 class="text-xl tracking-tight text-slate-900"><?php echo $row['car_make'] . ' ' . $row['car_model']; ?>
                </h5>
              </a>
              <div class="mt-2 mb-5 flex items-center justify-between">
                <p>
                  <span class="text-3xl font-bold text-slate-900">Rp
                    <?php echo number_format($row['total_amount']); ?></span>
                </p>
              </div>
              <p><strong>Tanggal mulai:</strong> <?php echo date('d/m/Y', strtotime($row['start_date'])); ?></p>
                <p><strong>Tanggal selesai:</strong> <?php echo date('d/m/Y', strtotime($row['end_date'])); ?></p>
                <p><strong>Durasi:</strong> <?php echo $total_days; ?> Hari</p>
                <p class="mb-5"><strong>Waktu Pemesanan:</strong> <?php echo date('d/m/Y H:i', strtotime($row['time'])); ?></p>
              <?php
              switch ($row['status']) {
                case 'Approved':
                  if ($start_timestamp <= $today_date) {
                    ?>
                    <a href="return_booking.php?hire_id=<?php echo $row['hire_id']; ?>&amount=<?php echo $amount_due; ?>"
                      class="flex items-center justify-center rounded-md bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                      Refund
                    </a>
                    <?php
                  } else {
                    ?>
                    <a href="cancel_booking.php?hire_id=<?php echo $row['hire_id']; ?>&amount=<?php echo $row['total_amount']; ?>"
                      class="flex items-center justify-center rounded-md bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                      Cancel
                    </a>
                    <?php
                  }
                  break;
                case 'Pending':
                  ?>
                  <div class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white">
                    <span class="text-sm text-white w-full rounded-lg">Menunggu Konfirmasi...</span>
                  </div>
                  <?php
                  break;
                case 'Cancelled':
                  ?>
                  <div class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white">
                    <span class="text-sm text-white w-full rounded-lg">Dibatalkan</span>
                  </div>
                  <?php
                  break;
                default:
                  ?>
                  <div class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white">
                    <span class="text-sm text-white w-full rounded-lg">Berhasil Refund</span>
                  </div>
                <?php
              }
              ?>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
      <?php
    } else {
      echo "<p>No bookings found.</p>";
    }

    $conn->close();
    ?>

  </div>

  <?php include 'includes/footer.php'; ?>
</body>

</html>