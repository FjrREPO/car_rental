<!DOCTYPE html>
<html lang="en">

<head>
  <title>Transaksi</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <?php include 'menu.php'; ?>

  <main class="w-full h-full p-5">
    <section class="admin-table">
      <h2 class="text-2xl font-semibold mb-4">Transaksi</h2>

      <div class="overflow-hidden border border-gray-200 bg-white shadow-md rounded-lg">
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-900 uppercase bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3">Id</th>
                <th scope="col" class="px-6 py-3">Id Peminjaman</th>
                <th scope="col" class="px-6 py-3">Nama Pengguna</th>
                <th scope="col" class="px-6 py-3">Nama Mobil</th>
                <th scope="col" class="px-6 py-3">Total</th>
                <th scope="col" class="px-6 py-3">Metode Bayar</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Waktu</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <?php
              include '../includes/config.php';
              $select = "SELECT
                            transaction.transaction_id,
                            transaction.hire_id,
                            transaction.amount,
                            transaction.payment_method,
                            transaction.timestamp,
                            transaction.status,
                            users.user_name,
                            cars.car_make,
                            cars.car_model
                          FROM transaction
                          JOIN hire ON transaction.hire_id = hire.hire_id
                          JOIN users ON hire.user_id = users.user_id
                          JOIN cars ON hire.car_id = cars.car_id
                          ORDER BY transaction_id DESC";

              $result = $conn->query($select);
              while ($row = $result->fetch_assoc()) {
                $formatted_amount = "Rp " . number_format(abs($row['amount']));
                if ($row['amount'] < 0) {
                  $formatted_amount = "-" . $formatted_amount;
                }
                ?>
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 text-gray-600"><?php echo $row['transaction_id'] ?></td>
                  <td class="px-6 py-4 text-gray-600"><?php echo $row['hire_id'] ?></td>
                  <td class="px-6 py-4 text-gray-600"><?php echo $row['user_name'] ?></td>
                  <td class="px-6 py-4 text-gray-600"><?php echo $row['car_make'] ?>   <?php echo $row['car_model'] ?></td>
                  <td class="px-6 py-4 text-gray-600"><?php echo $formatted_amount ?></td>
                  <td class="px-6 py-4 text-gray-600"><?php echo $row['payment_method'] ?></td>
                  <td class="px-6 py-4 text-gray-600"><?php echo $row['status'] ?></td>
                  <td class="px-6 py-4 text-gray-600"><?php echo date('d/m/Y H:i', strtotime($row['timestamp'])) ?></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
</body>

</html>