const archivedWikisContainer = document.getElementById("archived-wikis");
const restoreBtn = document.querySelectorAll(".restore-btn");


function getArchivedWikis() {
    archivedWikisContainer.innerHTML = "";
    $.get(
        "index.php?page=dashboard&getArchivedWikis=true",
        (data) => {
            let archivedWikis = JSON.parse(data);

            if (archivedWikis.length === 0) {
                archivedWikisContainer.innerHTML = `<h3 class="text-center">Archived Wikis</h3>
                                                        <div class="bg-gray-300 ml-32 border-gray-500 border rounded-sm w-full text-gray-700 mb-0.5">
                                                                <div class="text-center text-black">List is empty</div>
                                                        </div>`;
            }

            archivedWikis.forEach((archivedWiki) => {
                archivedWikisContainer.innerHTML += `         <h3 class="text-end">Archived Wikis</h3>
                                                    <div class="bg-gray-300 ml-32 border-gray-500 border rounded-sm w-full text-gray-700 mb-0.5">
                                            <div class="flex p-3 border-l-8 border-red-600">
                                                <div class="space-y-1 border-r-2 pr-3">
                                                    <div class="text-sm leading-5 font-semibold"><span class="text-xs leading-4 font-normal text-gray-500"> ID #</span> ${archivedWiki.wiki_id}</div>
                                                    <div class="text-sm leading-5 font-semibold">${formatTimestamp(archivedWiki.created_date)}</div>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="ml-3 space-y-1 border-r-2 pr-3">
                                                        <div class="text-base leading-6 font-normal">${archivedWiki.title}</div>
                                                        <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Creator</span> ${archivedWiki.username}</div>
                                                        <div class="text-sm leading-4 font-normal"><span class="text-xs leading-4 font-normal text-gray-500"> Creator email</span> ${archivedWiki.email}</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div data-wiki-id="${archivedWiki.wiki_id}" class="restore-btn ml-3 my-5 bg-red-600 p-1 w-20">
                                                        <button class="uppercase text-xs leading-4 font-semibold text-center text-red-100">Restore</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
            })
        }
    )

    $(document).ready(() => {
        $(archivedWikisContainer).on("click", ".restore-btn", function () {
            restoreWiki($(this).data("wiki-id"));
        })
    })

}

getArchivedWikis();

function restoreWiki(wikiId) {
    $.post(
        "index.php?page=dashboard",
        {
            wikiId,
            restore: true
        },
        (data) => {
            console.log(data);
            getArchivedWikis();
        }
    )
}

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