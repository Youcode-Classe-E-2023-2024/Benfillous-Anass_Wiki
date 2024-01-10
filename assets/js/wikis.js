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
    getWikis();
})

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // Use 'auto' for instant scrolling
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

            wikis.forEach((wiki) => {
                wikisList.innerHTML += `<tr class="p-6">
                    <td class="h-6 w-10 text-center rounded">${wiki.wiki_id}</td>
                    <td class="h-6 w-32 text-center rounded">${wiki.title}</td>
                    <td class="w-32 h-6 text-center rounded-lg">${wiki.content}</td>
                    <td class="w-24 h-6 text-center rounded-lg">${wiki.creator}</td>
                    <td class="w-24 h-6 text-center rounded-lg">tag</td>
                    <td class="w-24 h-6 text-center rounded-lg">${wiki.category_id}</td>
                    <td class="w-24 h-6 text-center rounded-lg">${wiki.created_date}</td>
                    <td class="w-24 h-6 text-center rounded-lg">
                        <button class="edit-btn" data-wiki-id="${wiki.wiki_id}" data-wiki-title="${wiki.title}"
                        data-wiki-content="${wiki.content}" data-wiki-tag="tag"
                        data-wiki-category="${wiki.category_id}">Edit</button>
                        <button class="delete-btn" data-wiki-id="${wiki.wiki_id}">Delete</button>
                    </td>
                </tr>`;
            })

            if(wikis.length === 0) {
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
            $(tagInput).val(currentWikiTags);
            categoryInput.value = currentWikiCategory;
            $("#wikis-container").hide();
            $(wikiSubmitBtn).hide();
            $(editWikiSubmitBtn).show();
            $("#form-section").show();
            $("#empty-list-container").html("");
        });
    })

    $(wikisList).ready(() => {
        $(wikisList).off("click", ".delete-btn").on("click", ".delete-btn", function () {
            currentWikiId = $(this).data("wiki-id");
            deleteWiki();
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
    editWiki();
    titleInput.value = "";
    contentInput.value = "";
    $(tagInput).val("");
    categoryInput.value = "";
    $("#wikis-container").show();
    $("#form-section").hide();
    scrollToTop();
})

getWikis();