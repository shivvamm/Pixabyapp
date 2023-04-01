<?php
// Start session
session_start();

// Check if user is authenticated
if (!isset($_SESSION["user_id"])) {
	header("Location: login.php");
	exit;
}


// Database configuration
require_once('config.php');

// Retrieve user data from database
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$user_name = $row["name"];
	$user_picture = $row["picture"];
} else {
	die("Error: User not found");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<!-- Load Tailwind CSS CDN -->
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

	<!-- Navigation -->
	<header class="bg-gray-900">
		<nav class="container mx-auto px-6 py-4">
			<ul class="flex justify-between">
				<li class="font-semibold">
					< <a href="index.php" class="text-xl font-bold text-white">Pixaby App</a>
				</li>
				<li class="flex items-center">
					<a href="profile.php"><h1 class="text-gray-400 hover:text-white">Welcome <?php echo $user_name; ?></h1></a>
					<img class="h-10 w-10 rounded-full object-cover" src="<?php echo $user_picture; ?>" alt="Profile Picture">
				</li>
			</ul>
		</nav>
	</header>

	<!-- Content -->
	<main class="container mx-auto my-8">
		<ul class="flex justify-center">
			<li class="mr-6">
				<a class="text-gray-500 hover:text-black" href="dashboard.php">Dashboard</a>
			</li>
			<li class="mr-6">
				<a class="text-gray-500 hover:text-black" href="profile.php">Profile</a>
			</li>
			<li class="mr-6">
				<a class="text-gray-500 hover:text-black" href="search.php">Search</a>
			</li>
			<li>
        			<a href="logout.php" tite="Logout"><button class="bg-gray-900 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">Logout</button></a>
			</li>
		</ul>
	</main>

</body>
</html>

