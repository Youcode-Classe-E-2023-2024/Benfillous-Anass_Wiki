<main id="home-main" class="mt-12">

    <div id="home-section">

        <!-- featured section -->
        <div id="home-wikis-container" class="flex flex-wrap md:flex-no-wrap space-x-0 md:space-x-6 mb-16">
            <!-- main post -->

            <!-- sub-main posts -->

            <!-- end featured section -->


        </div>
    </div>

        <?php if (isset($_SESSION["login"])) { ?>
            <div id="wikis-section"><?php include "views/wikis.php" ?></div>
        <?php } ?>
</main>
<!-- main ends here -->

<!--
--><?php
if (!isset($_GET["page"]) || (isset($_GET["page"]) && $_GET["page"] == "home"))
    include "views/search_bar_view.php";
?>

<?php if (isset($_SESSION["login"])) { ?>
    <script src="assets/js/wikis.js"></script>
<?php } ?>


<script>

    const homeWikisContainer = document.getElementById("home-wikis-container");
    let checker = 0;

    $.get(
        "index.php?page=home&getWikis=true",
        (data) => {
            let wikis = JSON.parse(data);
            console.log(wikis)
            wikis.forEach((wiki) => {
                if (checker === 0) {
                    homeWikisContainer.innerHTML = `<div class="mb-4 lg:mb-0  p-4 lg:p-0 w-full md:w-4/7 relative rounded block">
                <img src="https://images.unsplash.com/photo-1427751840561-9852520f8ce8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60"
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
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60"
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


    function formatTimestamp(timestamp) {
        // Convert timestamp to milliseconds
        const date = new Date(timestamp * 1000);

        // Extract components
        const day = date.getDate();
        const month = date.getMonth() + 1; // Months are zero-based
        const year = date.getFullYear();

        const hours = date.getHours();
        const minutes = date.getMinutes();

        // Check if it's a full date or just time
        if (day !== 1 || month !== 1 || year !== 1970) {
            return `${day}/${month < 10 ? '0' : ''}${month}/${year}, ${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
        } else {
            return `${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
        }
    }
</script>
