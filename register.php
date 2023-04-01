<?php
require_once('config.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
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
		$max_size = 5024 * 5024; // 1MB
		if (in_array($picture_type, $allowed_types) && $picture_size <= $max_size && $picture_error == 0) {
			// Generate a unique filename and move the file to the uploads directory
			$picture = "uploads/" . uniqid() . "_" . $picture_name;
			move_uploaded_file($picture_temp, $picture);
		} else {
			echo "Error: Invalid file type or size";
		}
	}

	// Insert user data into database
	$sql = "INSERT INTO users (name, email, password, picture) VALUES ('$name', '$email', '$password', '$picture')";
	if (mysqli_query($conn, $sql)) {
		header("Location: http://pictures.infinityfreeapp.com/");
die();

	} else {
		echo "Error: " . mysqli_error($conn);
	}
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
	<div class="max-w-md mx-auto my-8 bg-white p-6 rounded-md shadow-md">
		<h2 class="text-2xl font-bold text-center mb-6">Register</h2>
		<form method="post" enctype="multipart/form-data">
			<label class="block font-medium mb-2">Name:</label>
			<input type="text" name="name" required class="w-full px-4 py-2 rounded-md border border-gray-300 mb-4 focus:outline-none focus:border-blue-500" placeholder="Enter your name">
			<label class="block font-medium mb-2">Email:</label>
			<input type="email" name="email" required class="w-full px-4 py-2 rounded-md border border-gray-300 mb-4 focus:outline-none focus:border-blue-500" placeholder="Enter your email">
			<label class="block font-medium mb-2">Password:</label>
			<input type="password" name="password" required class="w-full px-4 py-2 rounded-md border border-gray-300 mb-4 focus:outline-none focus:border-blue-500" placeholder="Enter your password">
			<label class="block font-medium mb-2">Picture:</label>
			<input type="file" name="picture" class="w-full mb-4">
			<button type="submit" name="submit" class="w-full px-4 py-2 rounded-md bg-gray-900 text-white hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Register</button>
		</form>
	</div>
</body>
</html>

