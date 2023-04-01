<?php
// Database configuration
include 'config.php';


// Handle form submission
if (isset($_POST["submit"])) {
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = ($_POST["password"]);

	// Retrieve user data from database
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	if ($result && mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// Authentication successful, start session and redirect to dashboard
			session_start();
			$_SESSION["user_id"] = $row["id"];
			$_SESSION["user_name"] = $row["name"];
			$_SESSION["user_picture"] = $row["picture"];
			header("Location: dashboard.php");
			exit;
		} else {
			echo "Error: Invalid email or password";
		}
	} else {
		echo "Error: Invalid email or password";
	}
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md">
      <h2 class="text-xl font-bold mb-4">Login</h2>
      <form method="post">
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="email">Email:</label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" required>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 font-bold mb-2" for="password">Password:</label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" required>
        </div>
        <div class="flex items-center justify-between">
          <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit" value="Login">
        </div>
      </form>
    </div>
  </div>
</body>
</html>

