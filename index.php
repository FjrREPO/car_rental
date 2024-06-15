<!DOCTYPE html>
<html lang="en">

<head>
  <title>DirectDrive</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>

  <!--FONT AWESOME-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
  <?php
  include 'includes/header.php';
  ?>
  <main>
    <section class="product-list">
      <h2>Featured Products</h2>
      <div class="p-1 flex flex-wrap items-center justify-center">

        <div class="flex-shrink-0 m-6 relative overflow-hidden bg-orange-500 rounded-lg max-w-xs shadow-lg">
          <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
            style="transform: scale(1.5); opacity: 0.1;">
            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
          </svg>
          <div class="relative pt-10 px-10 flex items-center justify-center">
            <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
              style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
            </div>
            <img class="relative w-40"
              src="https://user-images.githubusercontent.com/2805249/64069899-8bdaa180-cc97-11e9-9b19-1a9e1a254c18.png"
              alt="">
          </div>
          <div class="relative text-white px-6 pb-6 mt-6">
            <span class="block opacity-75 -mb-1">Indoor</span>
            <div class="flex justify-between">
              <span class="block font-semibold text-xl">Peace Lily</span>
              <span
                class="block bg-white rounded-full text-orange-500 text-xs font-bold px-3 py-2 leading-none flex items-center">$36.00</span>
            </div>
          </div>
        </div>
      </div>
        <?php
        include 'includes/config.php';
        $sql = "SELECT * FROM cars WHERE availability = 1";
        $result = $conn->query($sql);
        $conn->close();
        ?>

        <ul>
          <?php
          while ($row = $result->fetch_assoc()) {
            ?>
            <li>
              <img src="<?php echo $row['image1']; ?>" alt="Car Image" />
              <h3><?php echo $row['car_make']; ?>   <?php echo $row['car_model']; ?></h3>

              <p>
                <?php echo '&#8377;' . number_format($row['rate']) . '/Day'; ?>
              </p>
              <a href="car_booking.php?car_id=<?php echo $row['car_id']; ?>"><button class="view-btn">View</button></a>
            </li>
            <?php
          }
          ?>
        </ul>
    </section>
  </main>
  <?php
  include 'includes/footer.php';
  ?>
</body>

</html>