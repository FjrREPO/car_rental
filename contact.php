<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact Us</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
  <?php
  include 'includes/header.php';
  include 'includes/config.php';
  ?>
  <div class="container my-12 mx-auto px-2 md:px-4">

    <section class="mb-32">

      <div class="flex justify-center">
        <div class="text-center md:max-w-xl lg:max-w-3xl">
          <h2 class="mb-12 px-6 text-3xl font-bold">
            Contact us
          </h2>
        </div>
      </div>

      <div class="flex flex-wrap">

        <form method="post" class="mb-12 w-full shrink-0 grow-0 basis-auto md:px-3 lg:mb-0 lg:w-5/12 lg:px-6">

          <div class="mb-3 w-full">
            <label class="block font-medium mb-[2px] text-teal-700" htmlFor="name">
              Nama
            </label>
            <input type="text" name="name" class="px-2 py-2 border w-full outline-none rounded-md" id="name"
              placeholder="Nama..." />
          </div>

          <div class="mb-3 w-full">
            <label class="block font-medium mb-[2px] text-teal-700" htmlFor="email">
              Email
            </label>
            <input type="email" name="email" class="px-2 py-2 border w-full outline-none rounded-md" id="email"
              placeholder="Email..." />
          </div>

          <div class="mb-3 w-full">
            <label class="block font-medium mb-[2px] text-teal-700" htmlFor="message">
              Pesan
            </label>
            <textarea placeholder="Pesan..." class="px-2 py-2 border rounded-[5px] w-full outline-none" name="message" id="message"></textarea>
          </div>

          <button type="submit" name="submit"
            class="mb-6 inline-block duration-200 w-full rounded bg-teal-400 px-6 py-2.5 font-medium uppercase leading-normal text-white hover:shadow-md hover:bg-teal-500">
            Kirim
          </button>

        </form>

        <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
          <div class="flex flex-wrap">
            <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
              <div class="flex items-start">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-teal-400-100 p-4 text-teal-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" class="h-6 w-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold">
                    Technical support
                  </p>
                  <p class="text-neutral-500 ">
                    sewain@gmail.com
                  </p>
                  <p class="text-neutral-500 ">
                    +62 8123456789
                  </p>
                </div>
              </div>
            </div>
            <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
              <div class="flex items-start">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-teal-400-100 p-4 text-teal-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" class="h-6 w-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold ">
                    Alamat
                  </p>
                  <p class="text-neutral-500 ">
                    PT. Sewa In Kendaraan, TBK
                  </p>
                  <p class="text-neutral-500 ">
                    Jl. Samping Gunung No. 48, Sinduharjo, Ngaglik, Sleman, Yogyakarta, Indonesia
                  </p>
                </div>
              </div>
            </div>
            <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
              <div class="align-start flex">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-teal-400-100 p-4 text-teal-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" class="h-6 w-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold ">Solution Center</p>
                  <p class="text-neutral-500 ">
                    1500-4848
                  </p>
                </div>
              </div>
            </div>
            <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
              <div class="align-start flex">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-teal-400-100 p-4 text-teal-700">
                    <img src="https://cdn-icons-png.flaticon.com/128/4423/4423697.png" class="w-6 h-6" alt="">
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold">
                    Whatsapp
                  </p>
                  <p class="text-neutral-500 ">
                    <a href="https://api.whatsapp.com/send?phone=6281911500369" class="hover:underline hover:text-green-500 duration-300">+62 81911500369</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
      echo "<script type = \"text/javascript\">
            alert(\"Message Sent Successfully!\");
            window.location = (\"contact.php\")
            </script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  }
  include 'includes/footer.php';
  ?>
</body>

</html>