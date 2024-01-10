<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucfirst($page) ?></title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet"/>
</head>
<body class="max-w-screen-lg mx-auto">

<!-- header -->
<header class="flex items-center justify-between py-2">
    <a href="index.php" class="px-2 lg:px-0 font-bold capitalize">
        WIKI
    </a>
    <div class="relative">
        <label for="Search" class="sr-only"> Search </label>
        <select id="search-type">
            <option value="title">Title</option>
            <option value="tag">Tag</option>
        </select>
        <input
                type="text"
                id="search-input"
                placeholder="Search for..."
                class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm"
        />

        <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
    <button type="button" id="search-btn" class="text-gray-600 hover:text-gray-700">
      <span class="sr-only">Search</span>

      <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-4 w-4"
      >
        <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
        />
      </svg>
    </button>
  </span>
    </div>
    <ul class="hidden md:inline-flex items-center">
        <li class="px-2 md:px-4">
            <a href="index.php" class="text-green-800 font-semibold hover:text-green-600"> Home </a>
        </li>
        <li class="px-2 md:px-4">
            <a href="#" class="text-gray-500 font-semibold hover:text-green-600"> About </a>
        </li>
        <li class="px-2 md:px-4">
            <a href="#" class="text-gray-500 font-semibold hover:text-green-600"> Press </a>
        </li>
        <li class="px-2 md:px-4">
            <a href="#" class="text-gray-500 font-semibold hover:text-green-600"> Contact </a>
        </li>
        <?php if (isset($_SESSION["login"])) {

            if (empty($_SESSION["admin"])) {
                ?>
                <li class="px-2 md:px-4 hidden md:block">
                    <a id="manage-wikis-btn" class="cursor-pointer text-gray-500 font-semibold hover:text-green-600"> Manage My Wikis </a>
                </li>
            <?php } else { ?>
                <li class="px-2 md:px-4 hidden md:block">
                    <a id="manage-wikis-btn" class="cursor-pointer text-gray-500 font-semibold hover:text-green-600"> Manage Wikis </a>
                </li>
                <li class="px-2 md:px-4 hidden md:block">
                    <a href="index.php?page=dashboard" class="text-gray-500 font-semibold hover:text-green-600"> Dashboard </a>
                </li>
            <?php } ?>
            <li class="px-2 md:px-4 hidden md:block">
                <form action="index.php?page=home" method="post">
                    <button name="logout" class="text-gray-500 font-semibold hover:text-green-600"> Logout</button>
                </form>
            </li>
        <?php } else { ?>
            <li class="px-2 md:px-4 hidden md:block">
                <a href="index.php?page=login" class="text-gray-500 font-semibold hover:text-green-600"> Login </a>
            </li>
            <li class="px-2 md:px-4 hidden md:block">
                <a href="index.php?page=register" class="text-gray-500 font-semibold hover:text-green-600">
                    Register </a>
            </li>

        <?php } ?>
    </ul>

</header>
<!-- header ends here -->

<?php include_once 'views/' . $page . '_view.php'; ?>

<!-- footer -->
<footer class="border-t mt-12 pt-12 pb-32 px-4 lg:px-0">
    <div class="flex flex-wrap">
        <div class="w-full lg:w-2/5">
            <p class="text-gray-600 hidden lg:block p-0 lg:pr-12">
                Boisterous he on understood attachment as entreaties ye devonshire.
                In mile an form snug were been sell.
                Extremely ham any his departure for contained curiosity defective.
                Way now instrument had eat diminution melancholy expression sentiments stimulated.
            </p>
        </div>

        <div class="w-full mt-6 lg:mt-0 md:w-1/2 lg:w-1/5">
            <h6 class="font-semibold text-gray-700 mb-4">Company</h6>
            <ul>
                <li><a href="#" class="block text-gray-600 py-2">Team</a></li>
                <li><a href="#" class="block text-gray-600 py-2">About us</a></li>
                <li><a href="#" class="block text-gray-600 py-2">Press</a></li>
            </ul>
        </div>

        <div class="w-full mt-6 lg:mt-0 md:w-1/2 lg:w-1/5">
            <h6 class="font-semibold text-gray-700 mb-4">Content</h6>
            <ul>
                <li><a href="#" class="block text-gray-600 py-2">Blog</a></li>
                <li><a href="#" class="block text-gray-600 py-2">Privacy Policy</a></li>
                <li><a href="#" class="block text-gray-600 py-2">Terms & Conditions</a></li>
                <li><a href="#" class="block text-gray-600 py-2">Documentation</a></li>
            </ul>
        </div>

        <div class="w-full mt-6 lg:mt-0 md:w-1/2 lg:w-1/5">
            <h6 class="font-semibold text-gray-700 mb-4">Company</h6>
            <ul>
                <li><a href="#" class="block text-gray-600 py-2">Team</a></li>
                <li><a href="#" class="block text-gray-600 py-2">About us</a></li>
                <li><a href="#" class="block text-gray-600 py-2">Press</a></li>
            </ul>
        </div>

    </div>
</footer>
<script src="<?= PATH ?>assets/js/main.js"></script>
</body>
</html>