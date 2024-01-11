<main class="h-auto" id="search-results-container">
    <div class="justify-center flex items-center h-screen">list is empty</div>
</main>

<script>
    const searchInput = document.getElementById("search-input");
    const resultsContainer = document.getElementById("search-results-container");
    const searchType = document.getElementById("search-type");

    searchInput.addEventListener("input", () => {
        if (searchInput.value !== "")
            getSearchedResults();
        else
            resultsContainer.innerHTML = '<div class="justify-center flex items-center h-screen">list is empty</div>';
    })

    function getSearchedResults() {
        resultsContainer.innerHTML = "";
        $.get(
            "index.php?page=search_bar&search_" + searchType.value + "=true&input_value=" + searchInput.value,
            (data) => {
                let searchedData = JSON.parse(data);

                searchedData.forEach((item) => {
                    let tags = item.tags;
                    let tagHtml = "";
                    console.log(item.wiki_infos);
                    tags.forEach((tag) => {
                        if (tag) {
                            tagHtml += `<div class="flex justify-start">
                                        <span class="px-2 py-1 text-xs rounded-full dark:bg-violet-400 dark:text-gray-900">${tag.tag}</span>
                                       </div>`;
                        }
                    })

                    resultsContainer.innerHTML += ` <div class="searched-item dark:bg-gray-800 my-6 dark:text-gray-50">
        <div class="container grid grid-cols-12 mx-auto dark:bg-gray-900">
            <div class="bg-no-repeat bg-cover dark:bg-gray-700 col-span-full lg:col-span-4" style="background-image: url('https://source.unsplash.com/random/640x480'); background-position: center center; background-blend-mode: multiply; background-size: cover;"></div>
            <div class="flex flex-col p-6 col-span-full row-span-full lg:col-span-8 lg:p-10">
                <div class="flex justify-start">
                    <span class="px-2 py-1 text-xs rounded-full dark:bg-violet-400 dark:text-gray-900">${item.wiki_infos.category}</span>
                </div>
                <h1 class="text-3xl font-semibold">${item.wiki_infos.title}</h1>
                <p class="flex-1 pt-2">${item.wiki_infos.content}</p>
                <a rel="noopener noreferrer" href="#" class="inline-flex items-center pt-2 pb-6 space-x-2 text-sm dark:text-violet-400">
                    <span>Read more</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <div class="flex items-center justify-between pt-2">
                    <div class="flex space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 dark:text-gray-400">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="self-center text-sm">by Leroy Jenkins</span>
                    </div>
                     ${tagHtml}
                    <span class="text-xs">3 min read</span>
                </div>
            </div>
        </div>
    </div>`;
                })
            }
        )
    }
</script>