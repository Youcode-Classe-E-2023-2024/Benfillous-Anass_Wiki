<main class="h-screen">
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="form">
        <h3 class="text-black">Login Here</h3>

        <label for="username">Email</label>
        <input class="login-input" name="email" type="text" placeholder="Email" id="loginEmail" required>

        <label for="password">Password</label>
        <input class="login-input" name="password" type="password" placeholder="Password" id="loginPassword" required>

        <div class="social bg-gray-200 hover:bg-gray-300 flex justify-center">
            <button class="bg-gray" type="button" name="login" id="login-btn">Sign In</button>
        </div>
        <div class="social items-center flex-col">
            <p class="text-sm mb-4">Or</p>
            <div class="w-full flex justify-center bg-gray-200 hover:bg-gray-300">
                <a href="index.php?page=register">
                    <div class="cursor-pointer">Sign Up</div>
                </a>
            </div>
        </div>
    </form>
</main>

<script src="assets/js/login.js"></script>
