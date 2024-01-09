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


$(addWikiBtn).click(()=> {
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

