<!DOCTYPE html>
<html>
<head>
  <title>My Website</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
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
          <li class="mt-3 md:mt-0 md:ml-6"><a href="register.php" class="text-gray-400 hover:text-white">Register</a></li>
          <li class="mt-3 md:mt-0 md:ml-6"><a href="login.php" class="text-gray-400 hover:text-white">Login</a></li>
          <?php if(isset($_SESSION['user'])): ?>
          <li class="mt-3 md:mt-0 md:ml-6"><a href="dashboard.php" class="text-gray-400 hover:text-white">Dashboard</a></li>
          <?php endif; ?>
        </ul>
      </div>
      <div class="md:hidden">
        <ul class="px-2 pt-2 pb-4">
          <li><a href="index.php" class="block text-gray-400 hover:text-white">Home</a></li>
          <li class="mt-2"><a href="register.php" class="block text-gray-400 hover:text-white">Register</a></li>
          <li class="mt-2"><a href="login.php" class="block text-gray-400 hover:text-white">Login</a></li>
          <?php if(isset($_SESSION['user_id'])): ?>
          <li class="mt-2"><a href="dashboard.php" class="block text-gray-400 hover:text-white">Dashboard</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
  </header>
  
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-800 text-center">Welcome to the Website</h1>
    <?php if(isset($_SESSION['user_id'])): ?>
    <div class="text-center mt-4">
      <a href="dashboard.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Dashboard</a>
    </div>
    <?php endif; ?>
  </div>
</body>
</html>
