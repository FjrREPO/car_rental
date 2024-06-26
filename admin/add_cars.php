<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tambah Mobil</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<?php
	include 'menu.php';
	?>
	<main class="w-full h-full py-5">
		<div class="w-full h-full">
			<form class="max-w-lg mx-auto" method="post">
				<div class="grid md:grid-cols-2 md:gap-6">
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="car_make" id="car_make"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="car_make"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
							Mobil</label>
					</div>
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="car_model" id="car_model"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="car_model"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Model</label>
					</div>
				</div>
				<div class="grid md:grid-cols-2 md:gap-6">
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="rate" id="rate"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="rate"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga</label>
					</div>
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="year" id="year"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="year"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tahun
							dibuat</label>
					</div>
				</div>
				<div class="grid md:grid-cols-2 md:gap-6">
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="transmission" id="transmission"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="transmission"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Transmisi</label>
					</div>
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="fuel_type" id="fuel_type"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="fuel_type"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tipe
							Bahan Bakar</label>
					</div>
				</div>
				<div class="grid md:grid-cols-2 md:gap-6">
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="license_plate" id="license_plate"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="license_plate"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plat</label>
					</div>
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="car_location" id="car_location"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="car_location"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Lokasi
							Mobil</label>
					</div>
				</div>
				<div class="grid md:grid-cols-2 md:gap-6">
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="image1" id="image1"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="image1"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Foto
							1 (URL/Link)</label>
					</div>
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="image2" id="image2"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="image2"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Foto
							2 (URL/Link)</label>
					</div>
				</div>
				<div class="grid md:grid-cols-2 md:gap-6">
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="image3" id="image3"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="image3"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Foto
							3 (URL/Link)</label>
					</div>
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="image4" id="image4"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="image4"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Foto
							4 (URL/Link)</label>
					</div>
				</div>
				<div class="grid md:grid-cols-2 md:gap-6">
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="image5" id="image5"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="image5"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Foto
							5 (URL/Link)</label>
					</div>
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="capacity" id="capacity"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="capacity"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kapasitas</label>
					</div>
				</div>
				<div class="grid md:grid-cols-1 md:gap-6">
					<div class="relative z-0 w-full mb-5 group">
						<input type="text" name="mileage" id="mileage"
							class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
							placeholder=" " required />
						<label for="mileage"
							class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
							Kilometer</label>
					</div>
				</div>

				<button type="submit" name="send"
					class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
			</form>
			<?php
			include '../includes/config.php';
			if (isset($_POST['send'])) {
				$sql = "INSERT INTO cars (image1, image2, image3, image4, image5, car_make, car_model, rate, capacity, year, transmission, fuel_type, mileage, license_plate, car_location, availability) 
				VALUES (
				'$_POST[image1]',
				'$_POST[image2]',
				'$_POST[image3]',
				'$_POST[image4]',
				'$_POST[image5]',
				'$_POST[car_make]',
				'$_POST[car_model]',
				'$_POST[rate]',
				'$_POST[capacity]',
				'$_POST[year]',
				'$_POST[transmission]',
				'$_POST[fuel_type]',
				'$_POST[mileage]',
				'$_POST[license_plate]',
				'$_POST[car_location]',
				1)";

				$result = $conn->query($sql);

				if ($result === TRUE) {
					echo "<script type = \"text/javascript\">
					alert(\"Vehicle Succesfully Added\");
					window.location = (\"cars_list.php\")
					</script>";
				}
			} else
				'Failed';
			?>
		</div>
	</main>
</body>

</html>