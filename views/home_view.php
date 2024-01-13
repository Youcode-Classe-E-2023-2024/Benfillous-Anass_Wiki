<main id="home-main" class="mt-12">

    <div id="home-section">

        <!-- featured section -->

        <div id="hero-container" class="flex flex-wrap md:flex-no-wrap space-x-0 md:space-x-6 mb-16">


        </div>
        <div class="flex justify-between">
            <div id="home-wikis-container" class="flex flex-wrap md:flex-no-wrap space-x-0 md:space-x-6 mb-16">
                <!-- main post -->

                <!-- sub-main posts -->

                <!-- end featured section -->

            </div>

            <!-- component -->
            <div class="fixe container flex w-1/2 items-center justify-end">
                <ul class="flex flex-col bg-gray-300 p-4">
                <h3 class="mb-4">Categories</h3>
                    <?php foreach ($categories as $category) { ?>
                    <li class="border-gray-400 flex flex-row mb-2">
                        <div class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                            <img src="https://source.unsplash.com/random/?category&<?= $category["category_id"] ?>" class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                            <div class="flex-1 pl-1 mr-16">
                                <div class="font-medium"> <?= $category["category"] ?></div>
                            </div>
                        </div>
                    </li>
                    <?php }?>
                </ul>

            </div>

        </div>
</main>
<!-- main ends here -->

<!--
--><?php
if ((isset($_GET["page"]) && $_GET["page"] == "home") || !isset($_GET["page"]))
    include "views/search_bar_view.php";
?>

<?php if (!isset($_GET["wikis"])) { ?>
    <script>
        $("#wikis-section").hide();
    </script>
<?php } ?>


<script>

    const homeWikisContainer = document.getElementById("home-wikis-container");
    const heroContainer = document.getElementById("hero-container");
    let checker = 0;

    $.get(
        "index.php?page=home&getWikis=true&home=true",
        (data) => {
            let wikis = JSON.parse(data);
            console.log(wikis)
            wikis.forEach((wiki) => {
                if (checker === 0) {
                    heroContainer.innerHTML = `<div class="mb-4 lg:mb-0  p-4 lg:p-0 w-full md:w-4/7 relative rounded block">
                <img src="https://source.unsplash.com/random"
                     class="rounded-md object-cover w-full h-64">
                <span class="text-green-700 text-sm hidden md:block mt-4"> ${wiki.wiki_infos.category} </span>
                <h1 class="text-gray-800 text-4xl font-bold mt-2 mb-2 leading-tight">
                    ${wiki.wiki_infos.title}
                </h1>
                <p class="text-gray-600 mb-4">
                    ${wiki.wiki_infos.content}
                </p>
                <a href="index.php?page=wiki&id=${wiki.wiki_infos.wiki_id}" class="inline-block px-6 py-3 mt-2 rounded-md bg-green-700 text-gray-100">
                    Read more
                </a>
            </div>`;
                    checker++;
                } else {
                    homeWikisContainer.innerHTML += `<div class="w-full md:w-4/7">
                <!-- post 1 -->
                <div class="rounded w-full flex flex-col md:flex-row mb-10">
                    <img src="https://source.unsplash.com/random/?news&${wiki.wiki_infos.wiki_id}"
                         class="block md:hidden lg:block rounded-md h-64 md:h-32 m-4 md:m-0"/>
                    <div class="bg-white rounded px-4">
                        <span class="text-green-700 text-sm hidden md:block"> ${wiki.wiki_infos.category} </span>
                        <div class="md:mt-0 text-gray-800 font-semibold text-xl mb-2">
                            ${wiki.wiki_infos.content}
                        </div>
                        <p class="block md:hidden p-2 pl-0 pt-1 text-sm text-gray-600">
                            ${wiki.wiki_infos.content}
                        </p>
                         <a href="index.php?page=wiki&id=${wiki.wiki_infos.wiki_id}" class="inline-block px-6 py-3 mt-2 rounded-md bg-green-700 text-gray-100">
                            Read more
                        </a>
                    </div>

                </div>

            </div>`;
                }

            })
        }
    )
</script>
