<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"></script>
</head>

<body>
  <?php
  include 'menu.php';
  ?>
  <section class="w-full h-full py-5">
    <main>
      <h1 class="text-3xl font-bold text-center">Dashboard</h1>

      <div class="w-full h-full">

        <div class="flexflex-col w-full h-full">

          <?php
          include '../includes/config.php';

          $totalRequestsSql = "SELECT COUNT(*) as totalRequests FROM hire";
          $totalRequestsResult = $conn->query($totalRequestsSql);
          $totalRequestsRow = $totalRequestsResult->fetch_assoc();
          $totalRequests = $totalRequestsRow['totalRequests'];

          $completedRequestsSql = "SELECT COUNT(*) as completedRequests FROM hire WHERE status = 'Returned'";
          $completedRequestsResult = $conn->query($completedRequestsSql);
          $completedRequestsRow = $completedRequestsResult->fetch_assoc();
          $completedRequests = $completedRequestsRow['completedRequests'];

          $pendingRequestsSql = "SELECT COUNT(*) as pendingRequests FROM hire WHERE status IN ('Pending', 'Approved')";
          $pendingRequestsResult = $conn->query($pendingRequestsSql);
          $pendingRequestsRow = $pendingRequestsResult->fetch_assoc();
          $pendingRequests = $pendingRequestsRow['pendingRequests'];

          $deniedRequestsSql = "SELECT COUNT(*) as deniedRequests FROM hire WHERE status = 'Denied'";
          $deniedRequestsResult = $conn->query($deniedRequestsSql);
          $deniedRequestsRow = $deniedRequestsResult->fetch_assoc();
          $deniedRequests = $deniedRequestsRow['deniedRequests'];

          $canceledRequestsSql = "SELECT COUNT(*) as canceledRequests FROM hire WHERE status = 'Cancelled'";
          $canceledRequestsResult = $conn->query($canceledRequestsSql);
          $canceledRequestsRow = $canceledRequestsResult->fetch_assoc();
          $canceledRequests = $canceledRequestsRow['canceledRequests'];


          $totalIncomeSql = "SELECT SUM(amount) as totalBalance FROM transaction WHERE admin_id = 1";
          $totalIncomeResult = $conn->query($totalIncomeSql);
          $totalIncomeRow = $totalIncomeResult->fetch_assoc();
          $totalIncome = $totalIncomeRow['totalBalance'];

          $totalCarsSql = "SELECT COUNT(*) as totalCars FROM cars";
          $totalCarsResult = $conn->query($totalCarsSql);
          $totalCarsRow = $totalCarsResult->fetch_assoc();
          $totalCars = $totalCarsRow['totalCars'];

          $totalMessagesSql = "SELECT COUNT(*) as totalMessages FROM messages";
          $totalMessagesResult = $conn->query($totalMessagesSql);
          $totalMessagesRow = $totalMessagesResult->fetch_assoc();
          $totalMessages = $totalMessagesRow['totalMessages'];

          $totalUsersSql = "SELECT COUNT(*) as totalUsers FROM users";
          $totalUsersResult = $conn->query($totalUsersSql);
          $totalUsersRow = $totalUsersResult->fetch_assoc();
          $totalUsers = $totalUsersRow['totalUsers'];
          ?>

          <section class="text-gray-700 body-font max-w-[1600px]">
            <div class="px-5 py-10">
              <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 md:w-1/5 sm:w-1/2 lg:w-1/6 w-full">
                  <div
                    class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" class="text-blue-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                      <path d="M8 17l4 4 4-4m-4-5v9"></path>
                      <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
                    </svg>
                    <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $totalRequests; ?></h2>
                    <p class="leading-relaxed">Total Pesanan</p>
                  </div>
                </div>
                <div class="p-4 md:w-1/5 sm:w-1/2 lg:w-1/6 w-full">
                  <div
                    class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" class="text-blue-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                      <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                      <circle cx="9" cy="7" r="4"></circle>
                      <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                    </svg>
                    <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $completedRequests; ?></h2>
                    <p class="leading-relaxed">Pesanan Sukses</p>
                  </div>
                </div>
                <div class="p-4 md:w-1/5 sm:w-1/2 lg:w-1/6 w-full">
                  <div
                    class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" class="text-blue-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                      <path d="M3 18v-6a9 9 0 0118 0v6"></path>
                      <path
                        d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z">
                      </path>
                    </svg>
                    <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $pendingRequests; ?></h2>
                    <p class="leading-relaxed">Menunggu Konfirmasi</p>
                  </div>
                </div>
                <div class="p-4 md:w-1/5 sm:w-1/2 lg:w-1/6 w-full">
                  <div
                    class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" class="text-blue-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                      <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $deniedRequests; ?></h2>
                    <p class="leading-relaxed">Pesanan Ditolak</p>
                  </div>
                </div>
                <div class="p-4 md:w-1/5 sm:w-1/2 lg:w-1/6 w-full">
                  <div
                    class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" class="text-blue-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                      <path
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                      </path>
                    </svg>
                    <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $canceledRequests; ?></h2>
                    <p class="leading-relaxed">Pesanan Dibatalkan</p>
                  </div>
                </div>
                <div class="p-4 md:w-1/5 sm:w-1/2 lg:w-1/6 w-full">
                  <div
                    class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" class="text-blue-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                      <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                      </path>
                      <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $totalRequests; ?></h2>
                    <p class="leading-relaxed">Total Pesanan</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <div class="flex w-full h-auto justify-center items-center mb-10">
            <a href="client_requests.php"><button
                class="w-fit px-10 py-4 rounded-lg shadow-lg hover:scale-105 duration-300 bg-blue-500 text-white">Selengkapnya</button></a>
          </div>

          <div class="w-full h-auto flex flex-row flex-wrap gap-5 justify-center items-center">
            <div class="max-w-[250px] bg-white shadow-xl rounded-lg text-gray-900">
              <div class="rounded-t-lg h-32 overflow-hidden">
                <img class="object-cover object-top w-full"
                  src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'
                  alt='Mountain'>
              </div>
              <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                <img class="object-cover object-center h-32 bg-white"
                  src='https://cdn-icons-png.freepik.com/512/3258/3258491.png' alt='Income'>
              </div>
              <div class="text-center mt-2">
                <h2 class="font-semibold"><?php echo 'Rp ' . number_format($totalIncome); ?></h2>
                <p class="text-gray-500">Total pemasukan</p>
              </div>
              <div class="p-4 border-t mx-8 mt-2">
                <a href="transaction.php"
                  class="w-full block mx-auto rounded-lg text-center bg-blue-500 hover:shadow-lg font-semibold text-white px-6 py-2">Selengkapnya</a>
              </div>
            </div>
            <div class="max-w-[250px] bg-white shadow-xl rounded-lg text-gray-900">
              <div class="rounded-t-lg h-32 overflow-hidden">
                <img class="object-cover object-top w-full"
                  src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'
                  alt='Mountain'>
              </div>
              <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                <img class="object-cover object-center h-32 bg-white"
                  src='https://cdn-icons-png.flaticon.com/512/10473/10473321.png' alt='Car'>
              </div>
              <div class="text-center mt-2">
                <h2 class="font-semibold"><?php echo $totalCars; ?></h2>
                <p class="text-gray-500">Total Mobil</p>
              </div>
              <div class="p-4 border-t mx-8 mt-2">
                <a href="cars_list.php"
                  class="w-full block mx-auto rounded-lg text-center bg-blue-500 hover:shadow-lg font-semibold text-white px-6 py-2">Selengkapnya</a>
              </div>
            </div>
            <div class="max-w-[250px] bg-white shadow-xl rounded-lg text-gray-900">
              <div class="rounded-t-lg h-32 overflow-hidden">
                <img class="object-cover object-top w-full"
                  src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'
                  alt='Mountain'>
              </div>
              <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                <img class="object-cover object-center h-32 bg-white"
                  src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGXcjIrmD6QLRZNfsguQngvxeIiLJMiqe5Lg&s'
                  alt='Inbox'>
              </div>
              <div class="text-center mt-2">
                <h2 class="font-semibold"><?php echo $totalCars; ?></h2>
                <p class="text-gray-500">Total Inbox</p>
              </div>
              <div class="p-4 border-t mx-8 mt-2">
                <a href="message.php"
                  class="w-full block mx-auto rounded-lg text-center bg-blue-500 hover:shadow-lg font-semibold text-white px-6 py-2">Selengkapnya</a>
              </div>
            </div>
            <div class="max-w-[250px] bg-white shadow-xl rounded-lg text-gray-900">
              <div class="rounded-t-lg h-32 overflow-hidden">
                <img class="object-cover object-top w-full"
                  src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'
                  alt='Mountain'>
              </div>
              <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                <img class="object-cover object-center h-32 bg-white"
                  src='https://uxwing.com/wp-content/themes/uxwing/download/peoples-avatars/man-user-circle-icon.png'
                  alt='User'>
              </div>
              <div class="text-center mt-2">
                <h2 class="font-semibold"><?php echo $totalUsers; ?></h2>
                <p class="text-gray-500">Total Pengguna</p>
              </div>
              <div class="p-4 border-t mx-8 mt-2">
                <a href="users.php"
                  class="w-full block mx-auto rounded-lg text-center bg-blue-500 hover:shadow-lg font-semibold text-white px-6 py-2">Selengkapnya</a>
              </div>
            </div>

          </div>

        </div>
    </main>
  </section>
</body>

</html>