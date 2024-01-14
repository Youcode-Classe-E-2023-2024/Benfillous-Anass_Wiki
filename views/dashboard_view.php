<!-- component -->
<div>
    <div class="min-h-screen flex flex-col antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

        <!-- Header -->
        <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
            <div class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-blue-800 dark:bg-gray-800 border-none">
                <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden"
                     src="assets/img/<?= $admin->picture ?>"/>
                <span class="hidden md:block">ADMIN</span>
            </div>
            <div class="flex justify-between items-center h-14 bg-blue-800 dark:bg-gray-800 header-right">
                <div class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
                    <button class="outline-none focus:outline-none">
                        <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    <input type="search" name="" id="" placeholder="Search"
                           class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent"/>
                </div>
                <ul class="flex items-center">
                    <li>
                        <form action="index.php?page=home" method="post"
                              class="flex items-center mr-4 hover:text-blue-100">
                <span class="inline-flex mr-1">
                  <svg class="w-5 h-5" fill="none" stroke="red" viewBox="0 0 24 24"
                       xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </span>
                            <button name="logout"> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./Header -->

        <!-- Sidebar -->
        <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
            <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5 hidden md:block">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                        </div>
                    </li>
                    <li>
                        <a href="#"
                           class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?page=wikis"
                           class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Wikis</span>
                            <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full"><?= $wikisNumber ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="#tag-container"
                           class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                           <span class="inline-flex justify-center items-center ml-4">
                              <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                   viewBox="0 0 24 24"><path
                                          d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18l-1.45-1.34C7.91 14.9 4 12.25 4 9.5 4 7.02 6.02 5 8.5 5c1.74 0 3.41.81 4.5 2.09C15.09 5.81 16.76 5 18.5 5 21.5 5 24 7.5 24 10.5 24 13.76 19.4 17.57 12 20z"/></svg>
                           </span>

                            <span class="ml-2 text-sm tracking-wide truncate">Tags</span>
                            <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full"><?= $tagsNumber ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="#category-container"
                           class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                           <span class="inline-flex justify-center items-center ml-4">
                              <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                   viewBox="0 0 24 24"><path
                                          d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18l-1.45-1.34C7.91 14.9 4 12.25 4 9.5 4 7.02 6.02 5 8.5 5c1.74 0 3.41.81 4.5 2.09C15.09 5.81 16.76 5 18.5 5 21.5 5 24 7.5 24 10.5 24 13.76 19.4 17.57 12 20z"/></svg>
                           </span>

                            <span class="ml-2 text-sm tracking-wide truncate">Categories</span>
                            <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full"><?= $categoriesNumber ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="#archived-wikis"
                           class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Archived Wikis</span>
                            <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span>
                        </a>
                    </li>
                </ul>
                <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright WIKI @2024</p>
            </div>
        </div>
        <!-- ./Sidebar -->

        <div class="h-full ml-14 mt-14 mb-10 md:ml-64">


            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl"><?= $usersNumber ?></p>
                        <p>Users</p>
                    </div>
                </div>
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl"><?= $wikisNumber ?></p>
                        <p>Wikis</p>
                    </div>
                </div>
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl"><?= $categoriesNumber ?></p>
                        <p>Categories</p>
                    </div>
                </div>
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <svg fill="#000000" stroke="currentColor" height="30px" width="30px" version="1.1" id="Capa_1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             viewBox="0 0 490 490" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M64.333,490h58.401l33.878-137.69h122.259L245.39,490h58.401l33.878-137.69h119.92v-48.162h-108.24l29.2-117.324h79.04 v-48.162H390.23L424.108,0H365.31l-33.878,138.661H208.79L242.668,0h-58.415l-33.864,138.661H32.411v48.162h106.298l-28.818,117.324 h-77.48v48.162h65.8L64.333,490z M197.11,186.824h122.642l-29.2,117.324H168.292L197.11,186.824z"></path>
                            </g>
                        </svg>

                    </div>
                    <div class="text-right">
                        <p class="text-2xl"><?= $tagsNumber ?></p>
                        <p>Tags</p>
                    </div>
                </div>
            </div>
            <!-- ./Statistics Cards -->
            <div class="flex justify-center">
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
            <!-- Client Table -->
            <div class="mt-4 mx-4">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Client</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Role</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php foreach ($users as $user) { ?>
                                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><?= $user["user_id"] ?></td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                     src="assets/img/<?= $user["picture"] ?>"
                                                     alt="" loading="lazy"/>
                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                     aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold"><?= $user["username"] ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm"><?= $user["email"] ?></td>
                                    <td class="px-4 py-3 text-xs">
                                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> <?= $user["role"] ?> </span>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                        <span class="flex items-center col-span-3"> Showing Last 10 Registered Users </span>
                        <span class="col-span-2"></span>
                    </div>
                </div>
            </div>
            <!-- ./Client Table -->
        </div>

        <div class="grid grid-cols-1 px-12 sm:px-10 md:px-16 lg:pl-20 py-6 md:py-10 lg:py-14">
            <!-- categories -->
            <?php include "views/categories.php"; ?>
            <!--tags-->
            <?php include "views/tags.php"; ?>

        </div>
        <!-- start  -->
        <div id="archived-wikis" class="flex flex-col justify-center px-6 md:px-32 py-6 md:py-10 lg:py-14 dark:bg-gray-800">

        </div>
        <!-- end -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

<script src="assets/js/tag.js"></script>
<script src="assets/js/category.js"></script>
<script src="assets/js/dashboard.js"></script>

