<?php
// Start session
session_start();
if (!isset($_SESSION["user_id"])) {
	header("Location: login.php");
	exit;
}

// Handle search query
if (isset($_GET["q"])) {
	$q = urlencode($_GET["q"]);
	$api_key = "34239216-7f4fd6f3499972698ada1cde7";
	$per_page = isset($_GET["r"]) ? $_GET["r"] : 10;
	$image_url = "https://pixabay.com/api/?key=$api_key&q=$q&image_type=photo&per_page=$per_page";
	$video_url = "https://pixabay.com/api/videos/?key=$api_key&q=$q&per_page=$per_page";
	$image_response = file_get_contents($image_url);
	$video_response = file_get_contents($video_url);
	$image_data = json_decode($image_response, true);
	$video_data = json_decode($video_response, true);
} else {
	$image_data = array();
	$video_data = array();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
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
<div class="max-w-4xl mx-auto px-4 py-8">
		<h1 class="text-4xl font-bold mb-4">Search Images/Videos</h1>
		<form method="get" class="flex mb-4">
			<label for="q" class="mr-4">Search text</label>
			<input type="text" name="q" class="border border-gray-400 px-4 py-2 flex-1 rounded-lg" required>
			<label for="r" class="ml-4 mr-2">Number of images/vedios</label>
			<input type="number" name="r" min="1" max="50" value="<?php echo isset($_GET['r']) ? $_GET['r'] : 10 ?>" class="border border-gray-400 px-4 py-2 rounded-lg w-24">
			<button type="submit" class="bg-gray-900 text-white px-4 py-2 rounded-lg ml-4">Search</button>
		</form>

		<?php if (!empty($image_data) && $image_data["totalHits"] > 0): ?>
			<h2 class="text-2xl font-bold mb-4">Images</h2>
			<div class="grid grid-cols-3 gap-4">
				<?php foreach ($image_data["hits"] as $item): ?>
					<div>
						<img src="<?php echo $item["webformatURL"]; ?>" alt="<?php echo $item["tags"]; ?>" class="rounded-lg">
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if (!empty($video_data) && $video_data["totalHits"] > 0): ?>
			<h2 class="text-2xl font-bold mb-4">Videos</h2>
			<div class="grid grid-cols-3 gap-4">
				<?php foreach ($video_data["hits"] as $item): ?>
					<div>
						<video controls class="rounded-lg">
							<source src="<?php echo $item["videos"]["large"]["url"]; ?>" type="video/mp4">
						</video>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if (empty($image_data) && empty($video_data)): ?>
			<p class="text-lg">No results found</p>
		<?php endif; ?>
	</div>
</body>
</html>

