<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hire Requests</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function sureToApprove(id) {
      if (confirm('Are you sure you want to Approve this request?')) {
        window.location.href = 'approve.php?id=' + id;
      }
    }

    function sureToDeny(id) {
      if (confirm('Are you sure you want to Deny this request?')) {
        window.location.href = 'deny.php?id=' + id;
      }
    }
  </script>
</head>
<body>
  <?php include 'menu.php'; ?>

  <?php
  include '../includes/config.php';

  $sql = "SELECT
            cars.car_make,
            cars.car_model,
            users.user_name,
            hire.start_date,
            hire.end_date,
            hire.time,
            hire.total_amount,
            hire.status,
            hire.hire_id
          FROM hire
          JOIN cars ON hire.car_id = cars.car_id
          JOIN users ON hire.user_id = users.user_id
          ORDER BY hire.hire_id DESC";

  $result = $conn->query($sql);
  ?>

  <div class="relative overflow-x-auto px-5 py-5 shadow-md sm:rounded-lg">
    <div class="flex flex-row justify-between w-full h-auto items-center mb-4">
      <span class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
        Client Requests
      </span>
    </div>
    <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-900 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3">Id Peminjaman</th>
          <th scope="col" class="px-6 py-3">Nama Peminjam</th>
          <th scope="col" class="px-6 py-3">Nama Mobil</th>
          <th scope="col" class="px-6 py-3">Periode</th>
          <th scope="col" class="px-6 py-3">Waktu</th>
          <th scope="col" class="px-6 py-3">Total</th>
          <th scope="col" class="px-6 py-3">Status</th>
          <th scope="col" class="px-3 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr class="bg-white border-b">
          <td class="px-6 py-4"><?php echo htmlspecialchars($row['hire_id']); ?></td>
          <td class="px-6 py-4"><?php echo htmlspecialchars($row['user_name']); ?></td>
          <td class="px-6 py-4"><?php echo htmlspecialchars($row['car_make'] . ' ' . $row['car_model']); ?></td>
          <td class="px-6 py-4"><?php echo date('d/m/Y', strtotime($row['start_date'])) . ' - ' . date('d/m/Y', strtotime($row['end_date'])); ?></td>
          <td class="px-6 py-4"><?php echo date('d/m/Y H:i', strtotime($row['time'])); ?></td>
          <td class="px-6 py-4"><?php echo '&#8377;' . number_format($row['total_amount']); ?></td>
          <td class="px-6 py-4"><?php echo htmlspecialchars($row['status']); ?></td>
          <td class="px-6 py-4 text-center">
            <a href="javascript:sureToDeny(<?php echo $row['hire_id']; ?>)" class="font-medium text-red-600 hover:underline">Tolak</a>
            <a href="javascript:sureToApprove(<?php echo $row['hire_id']; ?>)" class="font-medium text-blue-600 hover:underline ml-2">Terima</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
