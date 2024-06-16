<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sewa.In</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script>
        function resetSearch() {
            document.querySelector('input[name="search"]').value = '';
            document.querySelector('form').submit();
        }
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('.result-container').classList.add('animate__fadeIn');
        });
    </script>
</head>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <main>
        <section class="w-full h-full py-10">
            <h1 class="text-3xl font-bold text-center">Daftar Mobil</h1>

            <?php
            include 'includes/config.php';

            $results_per_page = 10;

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM cars WHERE car_model LIKE '%$search%' OR car_make LIKE '%$search%'";
            } else {
                $sql = "SELECT * FROM cars";
            }

            $offset = ($page - 1) * $results_per_page;
            $sql .= " LIMIT $offset, $results_per_page";
            $result = $conn->query($sql);
            ?>
            <div class="flex items-center justify-center w-full h-auto py-5">
                <div class="relative p-3 border border-gray-200 rounded-lg w-full max-w-lg">
                    <form action="list_cars.php" method="GET">
                        <div class="relative p-3 border border-gray-200 rounded-lg w-full max-w-lg">
                            <input type="text" name="search" class="rounded-md p-3 w-full" placeholder="Cari mobil...">
                            <?php if (!empty($search)): ?>
                                <button type="button" class="absolute right-6 top-6" onclick="resetSearch()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            <?php else: ?>
                                <button type="submit" class="absolute right-6 top-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </button>
                            <?php endif; ?>
                        </div>
                    </form>

                </div>
            </div>
            <?php
            echo '<div class="p-1 flex flex-wrap items-center justify-center">';
            while ($row = $result->fetch_assoc()) {
                ?>
                <a class="flex-shrink-0 m-6 relative overflow-hidden bg-gray-700 rounded-lg max-w-xs shadow-lg transform duration-300 ease-in-out hover:scale-105 result-container"
                    href="car_booking.php?car_id=<?php echo $row['car_id']; ?>">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
                        style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)"
                            fill="white" />
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
                                    <span
                                        class="block font-semibold text-center text-xl"><?php echo $row['car_make']; ?></span>
                                </div>
                            </div>
                            <img class="relative w-40 rounded-lg" src="<?php echo $row['image1']; ?>" alt="">
                        </div>
                    </div>
                    <div class="relative text-center items-center flex justify-center px-6 pb-6 mt-6">
                        <span
                            class="block bg-white text-center rounded-full text-gray-700 text-xs font-bold px-3 py-2 leading-none flex items-center"><?php echo 'Rp&nbsp' . number_format($row['rate']) . '/Day'; ?></span>
                    </div>
                </a>
                <?php
            }
            echo '</div>';

            $result_count = $conn->query("SELECT COUNT(*) AS total FROM cars")->fetch_assoc();
            $total_records = $result_count['total'];

            $total_pages = ceil($total_records / $results_per_page);

            echo '<div class="flex justify-center mt-5">';
            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<a class="mx-1 px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400" href="list_cars.php?page=' . $i . '">' . $i . '</a>';
            }
            echo '</div>';

            $conn->close();
            ?>
        </section>
    </main>
    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>