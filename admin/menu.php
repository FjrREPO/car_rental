<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="../css/style.css">
	<style>
		.navbar-item.active {
			color: white !important;
		}
	</style>
</head>

<body>
	<?php
	session_start();
	error_reporting(E_NOTICE);
	if (!$_SESSION['admin_email']) {
		header("location: ../index.php");
	}

	$currentPage = basename($_SERVER['SCRIPT_NAME']);
	?>

	<?php if (!$_SESSION['user_email']) { ?>
		<nav class="relative px-4 py-4 flex flex-row justify-between items-center bg-black">
			<a href="index.php">
				<img class="relative w-20 h-auto"
					src="https://res.cloudinary.com/dutlw7bko/image/upload/v1718443581/project-orang/logo_hd1xuk.png"
					alt="">
			</a>
			<div class="lg:hidden">
				<button class="navbar-burger flex items-center text-blue-600 p-3">
					<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<title>Mobile menu</title>
						<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
					</svg>
				</button>
			</div>
			<ul
				class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
				<li><a class="text-sm text-gray-400 hover:text-gray-500 <?php if ($currentPage == 'index.php')
					echo 'navbar-item active'; ?>" href="index.php">Dashboard</a></li>
				<li><a class="text-sm text-gray-400 hover:text-gray-500 <?php if ($currentPage == 'cars_list.php')
					echo 'navbar-item active'; ?>" href="cars_list.php">Daftar Mobil</a></li>
				<li><a class="text-sm text-gray-400 hover:text-gray-500 <?php if ($currentPage == 'client_requests.php')
					echo 'navbar-item active'; ?>" href="client_requests.php">Permintaan</a></li>
				<li><a class="text-sm text-gray-400 hover:text-gray-500 <?php if ($currentPage == 'transaction.php')
					echo 'navbar-item active'; ?>" href="transaction.php">Transaksi</a></li>
				<li><a class="text-sm text-gray-400 hover:text-gray-500 <?php if ($currentPage == 'users.php')
					echo 'navbar-item active'; ?>" href="users.php">Pengguna</a></li>
				<li><a class="text-sm text-gray-400 hover:text-gray-500 <?php if ($currentPage == 'message.php')
					echo 'navbar-item active'; ?>" href="message.php">Inbox</a></li>
			</ul>
			<a class="px-4 py-3 hidden lg:block leading-loose text-xs text-center font-semibold leading-none bg-red-600 hover:bg-red-700 duration-300 hover:scale-105 text-white rounded-xl"
				href="logout.php">Log out</a>
		</nav>
		<div class="navbar-menu relative z-50 hidden">
			<div class="navbar-backdrop fixed inset-0 bg-black opacity-25"></div>
			<nav
				class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-black border-r overflow-y-auto">
				<div class="flex items-center mb-8">
					<a href="index.php" class="mr-auto">
						<img class="relative w-20 h-auto"
							src="https://res.cloudinary.com/dutlw7bko/image/upload/v1718443581/project-orang/logo_hd1xuk.png"
							alt="">
					</a>
					<button class="navbar-close">
						<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
							xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
							</path>
						</svg>
					</button>
				</div>
				<div>
					<ul>
						<li class="mb-1">
							<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded <?php if ($currentPage == 'index.php')
								echo 'navbar-item active'; ?>" href="index.php">Dashboard</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded <?php if ($currentPage == 'cars_list.php')
								echo 'navbar-item active'; ?>" href="cars_list.php">Daftar Mobil</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded <?php if ($currentPage == 'client_requests.php')
								echo 'navbar-item active'; ?>" href="client_requests.php">Permintaan</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded <?php if ($currentPage == 'transaction.php')
								echo 'navbar-item active'; ?>" href="transaction.php">Transaksi</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded <?php if ($currentPage == 'users.php')
								echo 'navbar-item active'; ?>" href="users.php">Pengguna</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded <?php if ($currentPage == 'message.php')
								echo 'navbar-item active'; ?>" href="message.php">Inbox</a>
						</li>
					</ul>
				</div>
				<div class="mt-auto">
					<div class="pt-6">
						<a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl"
							href="logout.php">Log out</a>
					</div>
					<p class="my-4 text-xs text-center text-gray-400">
						<span>Copyright © 2024</span>
					</p>
				</div>
			</nav>
		</div>
	<?php } ?>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			// open
			const burger = document.querySelectorAll('.navbar-burger');
			const menu = document.querySelectorAll('.navbar-menu');

			if (burger.length && menu.length) {
				for (var i = 0; i < burger.length; i++) {
					burger[i].addEventListener('click', function () {
						for (var j = 0; j < menu.length; j++) {
							menu[j].classList.toggle('hidden');
						}
					});
				}
			}

			// close
			const close = document.querySelectorAll('.navbar-close');
			const backdrop = document.querySelectorAll('.navbar-backdrop');

			if (close.length) {
				for (var i = 0; i < close.length; i++) {
					close[i].addEventListener('click', function () {
						for (var j = 0; j < menu.length; j++) {
							menu[j].classList.toggle('hidden');
						}
					});
				}
			}

			if (backdrop.length) {
				for (var i = 0; i < backdrop.length; i++) {
					backdrop[i].addEventListener('click', function () {
						for (var j = 0; j < menu.length; j++) {
							menu[j].classList.toggle('hidden');
						}
					});
				}
			}
		});
	</script>
</body>

</html>