const manageWikisBtn = document.getElementById("manage-wikis-btn");
const addWikiBtn = document.getElementById("add-wiki-btn");
const wikiSubmitBtn = document.getElementById("wiki-submit");
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

function getWikis() {
    wikisList.innerHTML = "";
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
                    <td class="w-24 h-6 text-center rounded-lg">${wiki.category}</td>
                    <td class="w-24 h-6 text-center rounded-lg">${wiki.created_date}</td>
                    <td class="w-24 h-6 text-center rounded-lg">
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>`;

            })
        }
    )
}

getWikis();