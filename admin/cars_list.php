<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cars List</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function sureToApprove(id) {
      if (confirm('Yakin ingin menghapus data ini?')) {
        document.getElementById('deleteForm-' + id).submit();
      }
    }
  </script>
</head>

<body>
  <?php include 'menu.php'; ?>
  <?php
  include '../includes/config.php';

  // Fetch available cars
  $select = $conn->prepare("SELECT * FROM cars WHERE availability = ? ORDER BY car_id DESC");
  $availability = 1;
  $select->bind_param("i", $availability);
  $select->execute();
  $result = $select->get_result();
  ?>
  <div class="relative overflow-x-auto px-5 py-5 shadow-md sm:rounded-lg">
    <div class="flex flex-row justify-between w-full h-auto items-center mb-4">
      <span class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
        Daftar Mobil
      </span>
      <a href="add_cars.php" class="px-6 py-2 bg-blue-500 shadow-md h-fit w-fit text-white rounded-lg">Tambah</a>
    </div>
    <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-900 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3">Nama</th>
          <th scope="col" class="px-6 py-3">Model</th>
          <th scope="col" class="px-6 py-3">Tahun</th>
          <th scope="col" class="px-6 py-3">Kilometer</th>
          <th scope="col" class="px-6 py-3">Transmisi</th>
          <th scope="col" class="px-6 py-3">Bahan Bakar</th>
          <th scope="col" class="px-6 py-3">Lokasi</th>
          <th scope="col" class="px-6 py-3">Plat</th>
          <th scope="col" class="px-6 py-3">Kapasitas</th>
          <th scope="col" class="px-6 py-3">Harga</th>
          <th scope="col" class="px-4 py-3">Edit</th>
          <th scope="col" class="px-4 py-3">Hapus</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr class="bg-white border-b">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
              <?php echo htmlspecialchars($row['car_make']); ?>
            </th>
            <td class="px-6 py-4 text-gray-600">
              <?php echo htmlspecialchars($row['car_model']); ?>
            </td>
            <td class="px-6 py-4 text-gray-600">
              <?php echo htmlspecialchars($row['year']); ?>
            </td>
            <td class="px-6 py-4 text-gray-600">
              <?php echo htmlspecialchars($row['mileage']); ?>
            </td>
            <td class="px-6 py-4 text-gray-600">
              <?php echo htmlspecialchars($row['transmission']); ?>
            </td>
            <td class="px-6 py-4 text-gray-600">
              <?php echo htmlspecialchars($row['fuel_type']); ?>
            </td>
            <td class="px-6 py-4 text-gray-600">
              <?php echo htmlspecialchars($row['car_location']); ?>
            </td>
            <td class="px-6 py-4 text-gray-600">
              <?php echo htmlspecialchars($row['license_plate']); ?>
            </td>
            <td class="px-6 py-4 text-gray-600">
              <?php echo htmlspecialchars($row['capacity']); ?>
            </td>
            <td class="px-6 py-4 text-gray-600">
              <?php echo 'Rp ' . number_format($row['rate']); ?>
            </td>
            <td class="px-6 py-4 text-center">
              <a href="edit_car.php?car_id=<?php echo $row['car_id']; ?>"
                class="font-medium text-blue-600 hover:underline">Edit</a>
            </td>
            <td class="px-6 py-4 text-center">
              <!-- Form for deletion -->
              <form id="deleteForm-<?php echo $row['car_id']; ?>" method="POST" action="delete_car.php"
                style="display: none;">
                <input type="hidden" name="car_id" value="<?php echo $row['car_id']; ?>">
              </form>
              <a href="javascript:sureToApprove(<?php echo $row['car_id']; ?>)"
                class="font-medium text-red-600 hover:underline">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>