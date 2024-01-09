const addTagBtn = document.getElementById("addTagBtn");
const addTagInput = document.getElementById("tag-input");
const editTagInput = document.getElementById("edit-tag-input");
const tagSection = document.getElementById("tag-section");
let currentTagId;
let currentTag;

addTagBtn.addEventListener("click", (event) => {
    event.preventDefault();
    if (addTagInput.value.length !== 0) {
        $.post(
            "index.php?page=dashboard",
            {
                add_tag: true,
                tag: addTagInput.value
            },
            (data) => {
                console.log(data);
                addTagInput.style.border = ""
                addTagInput.value = "";
                getTags();
            }
        )
    } else
        addTagInput.style.border = "1px solid red";
})
