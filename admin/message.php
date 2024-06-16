<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script type="text/javascript">
    function sureToApprove(id) {
      if (confirm("Are you sure you want to delete this message?")) {
        window.location.href = 'delete_msg.php?id=' + id;
      }
    }
  </script>
</head>
<body>
  <?php include 'menu.php'; ?>
  <main class="w-full h-full p-5">
    <section class="admin-table">
      <h2 class="text-2xl font-bold mb-4">Inbox</h2>
      
      <div class="table-card relative overflow-x-auto px-5 py-5 shadow-md sm:rounded-lg">
        <?php
          include '../includes/config.php';
          $select = "SELECT * FROM messages ORDER BY message_id DESC";
          $result = $conn->query($select);
        ?>
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-900 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">Nama</th>
              <th scope="col" class="px-6 py-3">Email</th>
              <th scope="col" class="px-6 py-3">Pesan</th>
              <th scope="col" class="px-6 py-3">Waktu</th>
              <th scope="col" class="px-3 py-3 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr class="bg-white border-b">
              <td class="px-6 py-4"><?php echo htmlspecialchars($row['name']); ?></td>
              <td class="px-6 py-4"><?php echo htmlspecialchars($row['email']); ?></td>
              <td class="px-6 py-4"><?php echo htmlspecialchars($row['message']); ?></td>
              <td class="px-6 py-4"><?php echo date('d/m/Y H:i', strtotime($row['time'])); ?></td>
              <td class="px-3 py-4 text-center">
                <a href="javascript:sureToApprove(<?php echo $row['message_id']; ?>)" class="font-medium text-red-600 hover:underline">Delete</a>
                <a href="mailto:<?php echo htmlspecialchars($row['email']); ?>" class="font-medium text-blue-600 hover:underline ml-2">Reply</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>
</body>
</html>
