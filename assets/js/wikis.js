const manageWikisBtn = document.getElementById("manage-wikis-btn");
const addWikiBtn = document.getElementById("add-wiki-btn");
$("#wikis-section").hide();
manageWikisBtn.addEventListener("click", () => {
    $("#home-section").hide();
    $("#wikis-section").show();
    $("#wikis-container").show();
    $("#form-section").hide();
})


$(addWikiBtn).click(()=> {
    $("#wikis-container").hide();
    $("#form-section").show();

})