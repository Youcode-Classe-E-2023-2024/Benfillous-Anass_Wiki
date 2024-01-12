const manageWikisBtn = document.getElementById("manage-wikis-btn");
const addWikiBtn = document.getElementById("add-wiki-btn");
const wikiSubmitBtn = document.getElementById("wiki-submit");
const editWikiSubmitBtn = document.getElementById("edit-wiki-submit");

$("#wikis-section").hide();
manageWikisBtn.addEventListener("click", () => {
    $("#home-section").hide();
    $("#wikis-section").show();
    $("#wikis-container").show();
    $("#form-section").hide();
})


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
            let archiveBtn = "";
            wikis.forEach((wiki) => {
                if (admin) {
                    archiveBtn = `<button class="action-button archive-btn" data-wiki-id="${wiki.wiki_infos.wiki_id}">Archive</button>`
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
                    <tr class="table-row">
                        <td class="cell-id">${wiki.wiki_infos.wiki_id}</td>
                        <td class="cell-title">${wiki.wiki_infos.title}</td>
                        <td class="cell-content">${content}</td>
                        <td class="cell-username">${wiki.wiki_infos.username}</td>
                        <td class="cell-tag flex">${tagHtml}</td>
                        <td class="cell-category">${wiki.wiki_infos.category}</td>
                        <td class="cell-created-date">${wiki.wiki_infos.created_date}</td>
                        <td class="cell-actions flex px-20 align-center">
                            <button class="action-button"><a href="index.php?page=wiki&id=${wiki.wiki_infos.wiki_id}">See More</a></button>
                            <button class="action-button edit-btn" data-wiki-id="${wiki.wiki_infos.wiki_id}" data-wiki-title="${wiki.wiki_infos.title}"
                                data-wiki-content="${wiki.wiki_infos.content}" data-wiki-tag="${tags}" data-wiki-category="${wiki.wiki_infos.category_id}">Edit
                            </button>
                            <button class="action-button delete-btn" data-wiki-id="${wiki.wiki_infos.wiki_id}">Delete</button>
                            ${archiveBtn}
                        </td>
                    </tr>`;
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