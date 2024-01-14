const manageWikisBtn = document.getElementById("manage-wikis-btn");
const addWikiBtn = document.getElementById("add-wiki-btn");
const wikiSubmitBtn = document.getElementById("wiki-submit");
const wikiSection = document.getElementById("wikis-section");
const editWikiSubmitBtn = document.getElementById("edit-wiki-submit");

$("#form-section").hide();

$(addWikiBtn).click(() => {
    $("#wikis-container").hide();
    $("#form-section").show();
    $(editWikiSubmitBtn).hide();
    $("#empty-list-container").html("");
    titleInput.value = "";
    contentInput.value = "";
    $(tagInput).val("");
    categoryInput.value = "";
    tagInput.style.border = "";
})

$(wikiSubmitBtn).click(() => {
    createWiki();
    titleInput.value = "";
    contentInput.value = "";
    $(tagInput).val("");
    categoryInput.value = "";
    $("#wikis-container").show();
    $("#form-section").hide();
    scrollToTop();
    setTimeout(getWikis, 4000);
})

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

//wiki inputs
const titleInput = document.getElementById("title-input");
const contentInput = document.getElementById("content-input");
const tagInput = document.getElementById("tag-input");
const categoryInput = document.getElementById("category-input");

function createWiki() {
    $.post(
        "index.php?page=home",
        {
            title: titleInput.value,
            content: contentInput.value,
            tag: $(tagInput).val(),
            category: categoryInput.value,
            create_wiki: true
        },
        (data) => {
            console.log(data);
        }
    )
}

const wikisList = document.getElementById("wikis-list");

let currentWikiId;
let currentWikiTitle;
let currentWikiContent;
let currentWikiTags;
let currentWikiCategory;


function getWikis() {
    wikisList.innerHTML = "";
    $("#empty-list-container").html("");
    $.get(
        "index.php?page=home&getWikis=true",
        (data) => {
            let wikis = JSON.parse(data);
            console.log(wikis)
            let archiveBtn = "";
            wikis.forEach((wiki) => {
                if (admin) {
                    archiveBtn = `<button class="action-button archive-btn dark:hover:text-yellow-500 text-yellow-700" data-wiki-id="${wiki.wiki_infos.wiki_id}">Archive</button>`
                }

                let tags = wiki.tags;
                let tagHtml = "";
                tags.forEach((tag) => {
                    if (tag) {
                        tagHtml += `<div class="flex flex-row justify-center">
                                        <span class="px-2 py-1 my-1 text-xs rounded-full dark:bg-orange-400 dark:text-gray-900">${tag.tag}</span>
                                       </div>`;
                    }
                })

                let content = wiki.wiki_infos.content.length > 20 ? wiki.wiki_infos.content.substring(0, 20) + "..." : wiki.wiki_infos.content;
                wikisList.innerHTML += `
                    <div>
    <div class="bg-gray-100 p-6 rounded-lg">
        <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://source.unsplash.com/random/?news&${wiki.wiki_infos.wiki_id}" alt="content">
        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">${wiki.wiki_infos.title}</h2>
        <p class="leading-relaxed text-balance">${content}</p>
        <div class="flex justify-between items-center mt-6">
            <button class="action-button dark:hover:text-blue-500 text-blue-700"><a href="index.php?page=wiki&id=${wiki.wiki_infos.wiki_id}">See More</a></button>
            <button class="action-button edit-btn dark:hover:text-green-500 text-green-700" data-wiki-id="${wiki.wiki_infos.wiki_id}" data-wiki-title="${wiki.wiki_infos.title}"
                data-wiki-content="${content}" data-wiki-tag="${tags}" data-wiki-category="${wiki.wiki_infos.category_id}">Edit
            </button>
            <button class="action-button delete-btn dark:hover:text-red-500 text-red-700" data-wiki-id="${wiki.wiki_infos.wiki_id}">Delete</button>
            ${archiveBtn}
        </div>
    </div>
</div>
`;
            })

            if (wikis.length === 0) {
                $("#empty-list-container").html("<div>List is Empty</div>");
            }
        }
    )

    $(wikisList).ready(() => {
        $(wikisList).off("click", ".edit-btn").on("click", ".edit-btn", function () {
            currentWikiId = $(this).data("wiki-id");
            currentWikiTitle = $(this).data("wiki-title");
            currentWikiContent = $(this).data("wiki-content");
            currentWikiTags = $(this).data("wiki-tag");
            currentWikiCategory = $(this).data("wiki-category");
            titleInput.value = currentWikiTitle;
            contentInput.value = currentWikiContent;
            categoryInput.value = currentWikiCategory;
            $("#wikis-container").hide();
            $(wikiSubmitBtn).hide();
            $(editWikiSubmitBtn).show();
            $("#form-section").show();
            $("#empty-list-container").html("");
        });

        $(wikisList).off("click", ".delete-btn").on("click", ".delete-btn", function () {
            currentWikiId = $(this).data("wiki-id");
            deleteWiki();
        });

        $(wikisList).off("click", ".archive-btn").on("click", ".archive-btn", function () {
            currentWikiId = $(this).data("wiki-id");
            archiveWiki();
        });
    })
}

function deleteWiki() {
    $.post(
        "index.php?page=home",
        {
            wiki_id: currentWikiId,
            delete_wiki: true
        },
        (data) => {
            getWikis();
        }
    )
}

function editWiki() {
    $.post(
        "index.php?page=home",
        {
            wiki_id: currentWikiId,
            title: titleInput.value,
            content: contentInput.value,
            tag: $(tagInput).val(),
            category: categoryInput.value,
            edit_wiki: true
        },
        (data) => {
            console.log(data);
            getWikis();
        }
    )
}

$(editWikiSubmitBtn).click(() => {
    let tagsInput = $(tagInput).val();
    console.log(tagsInput.length);
    if (tagsInput.length === 0) {
        tagInput.style.border = "1px solid red";
    } else {
        editWiki();
        titleInput.value = "";
        contentInput.value = "";
        $(tagInput).val("");
        categoryInput.value = "";
        $("#wikis-container").show();
        $("#form-section").hide();
        tagInput.style.border = "";
    }
    scrollToTop();
})


function archiveWiki() {
    $.post(
        "index.php?page=home",
        {
            wiki_id: currentWikiId,
            archive_wiki: true
        },
        (data) => {
            getWikis();
        }
    )
}

getWikis();

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