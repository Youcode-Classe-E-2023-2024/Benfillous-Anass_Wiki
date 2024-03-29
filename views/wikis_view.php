<div class="bg-gray-50 min-h-screen flex justify-center w-full">
    <div class="relative w-full max-w-4xl">
        <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        <div id="wikis-container" class="m-8 relative space-y-4">
            <div class="flex justify-end">
                <button id="add-wiki-btn" class="w-1/4 bg-yellow-300 rounded-sm hover:bg-yellow-400">Add New Wiki</button>
            </div>
            <section id="wikis-list" class="text-gray-600 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 w-full gap-4  body-font">

            </section>
        </div>

        <div id="empty-list-container" class="text-center"></div>

        <!--form section-->
        <div id="form-section" class="container w-full flex flex-wrap mx-auto px-2 lg:pt-4">

            <!--Section container-->
            <section class="w-full lg:w-4/5">

                <!--Title-->
                <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Create New Wiki</h2>

                <!--Card-->
                <div id='section2' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                    <form id="wiki-form">

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4"
                                       for="my-textfield">
                                    Text Field
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input placeholder="Write Title here" class="form-input block w-full focus:bg-white"
                                       id="title-input" type="text" value="">
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4"
                                       for="my-textarea">
                                    Category
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="" class="form-select block w-full focus:bg-white" id="category-input">
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category["category_id"] ?>"><?= $category["category"] ?></option>
                                    <?php } ?>
                                </select>

                                <p class="py-2 text-sm text-gray-600">Chose the category</p>
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4"
                                       for="my-multiselect">
                                    Select Tag
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select class="form-multiselect block w-full" required multiple id="tag-input">
                                    <?php foreach ($tags as $tag) { ?>
                                        <option value="<?= $tag["tag_id"] ?>"><?= $tag["tag"] ?></option>
                                    <?php } ?>
                                </select>
                                <p class="py-2 text-sm text-gray-600">Chose tags</p>
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4"
                                       for="my-textarea">
                                    Content
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea placeholder="Write The Content Here"
                                          class="form-textarea block w-full focus:bg-white" id="content-input" value=""
                                          rows="8"></textarea>
                                <p class="py-2 text-sm text-gray-600">Add ore details about your Wiki</p>
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                    type="button" id="wiki-submit">
                                Save
                            </button>
                        </div>
                        <div class="md:flex md:items-center">
                            <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                    type="button" id="edit-wiki-submit">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
                <!--/Card-->

                <!--divider-->
                <hr class="bg-gray-300 my-12">


            </section>
            <!--/Section container-->

        </div>
        <!--/container-->

        <!-- Scroll Spy -->
        <script>
            /* http://jsfiddle.net/LwLBx/ */

            // Cache selectors
            var lastId,
                topMenu = $("#menu-content"),
                topMenuHeight = topMenu.outerHeight() + 175,
                // All list items
                menuItems = topMenu.find("a"),
                // Anchors corresponding to menu items
                scrollItems = menuItems.map(function () {
                    var item = $($(this).attr("href"));
                    if (item.length) {
                        return item;
                    }
                });

            // Bind click handler to menu items
            // so we can get a fancy scroll animation
            menuItems.click(function (e) {
                var href = $(this).attr("href"),
                    offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
                $('html, body').stop().animate({
                    scrollTop: offsetTop
                }, 300);
                if (!helpMenuDiv.classList.contains("hidden")) {
                    helpMenuDiv.classList.add("hidden");
                }
                e.preventDefault();
            });

            // Bind to scroll
            $(window).scroll(function () {
                // Get container scroll position
                var fromTop = $(this).scrollTop() + topMenuHeight;

                // Get id of current scroll item
                var cur = scrollItems.map(function () {
                    if ($(this).offset().top < fromTop)
                        return this;
                });
                // Get the id of the current element
                cur = cur[cur.length - 1];
                var id = cur && cur.length ? cur[0].id : "";

                if (lastId !== id) {
                    lastId = id;
                    // Set/remove active class
                    menuItems
                        .parent().removeClass("font-bold border-yellow-600")
                        .end().filter("[href='#" + id + "']").parent().addClass("font-bold border-yellow-600");
                }
            });
            let admin = false;
        </script>

        <?php if (isset($_SESSION["login"]) && isset($_GET["wikis"])) { ?>
            <script>
                $("#home-section").hide();
                $("#wikis-section").show();
                $("#form-section").hide();
            </script>
        <?php } ?>



        <?php if (isset($_SESSION["admin"])) { ?>
            <script>
                admin = true;
            </script>
        <?php } ?>


    </div>
</div>


<script src="assets/js/wikis.js"></script>