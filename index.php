<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sewa.In</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
  <?php
  include 'includes/header.php';
  ?>
  <main>
    <section class="w-full h-svh" style="
      background: url('https://res.cloudinary.com/dutlw7bko/image/upload/v1718446179/project-orang/a489ff86c6cc2b817e36759eec53ca23_1_tqxpim.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      ">
      <div class="w-full h-full bg-black/50">
        <div class="flex justify-center items-center w-full h-full relative text-white">
          <div class="flex flex-col justify-center items-center">
            <h1 class="text-3xl font-bold text-center">Selamat Datang Di Sewa.In</h1>
            <span class="text-sm text-center">Di sini tempat rental terpercaya dan terjamin keamanannya, silahkan klik
              dibawah ini untuk selengkapnya</span>
            <a href="list_cars.php"
              class="px-10 py-4 bg-white rounded-lg mt-5 text-black font-semibold hover:scale-105 duration-300">Sewa
              sekarang</a>
          </div>
        </div>
      </div>
    </section>
    <section class="w-full h-full pt-5">
      <h1 class="text-3xl font-bold text-center">Daftar Mobil</h1>

      <?php
      include 'includes/config.php';
      $sql = "SELECT * FROM cars WHERE availability = 1 LIMIT 5";
      $result = $conn->query($sql);
      $conn->close();
      ?>
      <div class="p-1 flex flex-wrap items-center justify-center">
        <?php
        while ($row = $result->fetch_assoc()) {
          ?>
          <a class="flex-shrink-0 m-6 relative overflow-hidden bg-gray-700 rounded-lg max-w-xs shadow-lg transform duration-300 ease-in-out hover:scale-105"
            href="car_booking.php?car_id=<?php echo $row['car_id']; ?>">
            <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
              style="transform: scale(1.5); opacity: 0.1;">
              <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
              <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
            </svg>
            <div class="relative pt-4 px-10 flex items-center justify-center">
              <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
              </div>
              <div class="flex flex-col items-center justify-center">
                <div class="relative text-white px-2 pb-6">
                  <span class="block opacity-75 text-center -mb-1"><?php echo $row['car_model']; ?></span>
                  <div class="flex justify-center">
                    <span class="block font-semibold text-center text-xl"><?php echo $row['car_make']; ?></span>
                  </div>
                </div>
                <img class="relative w-40 rounded-lg" src="<?php echo $row['image1']; ?>" alt="">
              </div>
            </div>
            <div class="relative text-center items-center flex justify-center px-6 pb-6 mt-6">
              <span
                class="block bg-white text-center rounded-full text-gray-700 text-xs font-bold px-3 py-2 leading-none flex items-center"><?php echo 'Rp&nbsp' . number_format($row['rate']) . '/Hari'; ?></span>
            </div>
          </a>
          <?php
        }
        ?>
      </div>
      <div class="flex justify-center w-full mb-10">
        <a class="flex w-fit h-fit justify-center rounded-lg px-7 py-3 bg-gray-700 text-white cursor-pointer hover:scale-105 duration-300" href="list_cars.php">Lihat lainnya</a>
      </div>
    </section>
  </main>
  <?php
  include 'includes/footer.php';
  ?>
</body>

</html>