<?php
// Start session
session_start();
if (!isset($_SESSION["user_id"])) {
	header("Location: login.php");
	exit;
}

// Database configuration
include 'config.php';

// Handle form submission
if (isset($_POST["update"])) {
	$user_id = $_SESSION["user_id"];
	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$picture = "";

	// Handle file upload
	if (isset($_FILES["picture"])) {
		$picture_name = $_FILES["picture"]["name"];
		$picture_temp = $_FILES["picture"]["tmp_name"];
		$picture_type = $_FILES["picture"]["type"];
		$picture_size = $_FILES["picture"]["size"];
		$picture_error = $_FILES["picture"]["error"];

		// Validate file type and size
		$allowed_types = array("image/jpeg", "image/png");
		$max_size = 1024 * 1024; // 1MB
		if (in_array($picture_type, $allowed_types) && $picture_size <= $max_size && $picture_error == 0) {
			// Generate a unique filename and move the file to the uploads directory
			$picture = "uploads/" . uniqid() . "_" . $picture_name;
			move_uploaded_file($picture_temp, $picture);
		} else {
			echo "Error: Invalid file type or size";
		}
	}

	// Update user data in database
	$sql = "UPDATE users SET name = '$name', email = '$email'";
	if (!empty($picture)) {
		$sql .= ", picture = '$picture'";
	}
	$sql .= " WHERE id = $user_id";
	if (mysqli_query($conn, $sql)) {
		$_SESSION["message"] = "Profile updated successfully";
header("Location: profile.php");
exit;
} else {
echo "Error: " . mysqli_error($conn);
}
}

// Retrieve user data from database
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
$user_name = $row["name"];
$user_email = $row["email"];
$user_picture = $row["picture"];
} else {
die("Error: User not found");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
 <header class="bg-gray-900">
    <nav class="container mx-auto px-4 py-6 md:flex md:justify-between md:items-center">
      <div class="flex items-center justify-between">
        <a href="#" class="text-xl font-bold text-white">Pixaby App</a>
        <button class="md:hidden text-white focus:outline-none focus:shadow-outline" aria-label="Toggle menu">
          <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
            <path fill-rule="evenodd" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
          </svg>
        </button>
      </div>
      <div class="hidden md:flex md:items-center">
        <ul class="md:flex md:items-center">
          <li class="mt-3 md:mt-0 md:ml-6"><a href="index.php" class="text-gray-400 hover:text-white">Home</a></li>
          <li class="mt-3 md:mt-0 md:ml-6"><a href="dashboard.php" class="text-gray-400 hover:text-white">Dashboard</a></li>
        </ul>
      </div>
      <div class="md:hidden">
        <ul class="px-2 pt-2 pb-4">
          <li><a href="index.php" class="block text-gray-400 hover:text-white">Home</a></li>
          <li class="mt-2"><a href="register.php" class="block text-gray-400 hover:text-white">Register</a></li>
          <li class="mt-2"><a href="login.php" class="block text-gray-400 hover:text-white">Login</a></li>
        </ul>
      </div>
    </nav>
  </header>
	<div class="container mx-auto py-10">
		<h1 class="text-2xl font-bold mb-5">Update Profile</h1>
		<form method="post" enctype="multipart/form-data">
			<div class="mb-4">
				<label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
				<input type="text" id="name" name="name" value="<?php echo $user_name; ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
			</div>
			<div class="mb-4">
				<label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
				<input type="email" id="email" name="email" value="<?php echo $user_email; ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
			</div>
			<div class="mb-4">
				<label for="picture" class="block text-gray-700 font-bold mb-2">Profile Picture:</label>
				<input type="file" id="picture" name="picture" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
			</div>
			<input type="submit" name="update" value="Update" class="bg-gray-900 hover:bg-black-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
		</form>
	</div>
</body>
</html>
