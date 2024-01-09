const addCategoryBtn = document.getElementById("addCategoryBtn");
const addCategoryInput = document.getElementById("category-input");
const editCategoryInput = document.getElementById("edit-category-input");
const categorySection = document.getElementById("category-section");
let currentCategoryId;
let currentCategory;

addCategoryBtn.addEventListener("click", (event) => {
    event.preventDefault();
    console.log("test");
    if (addCategoryInput.value.length !== 0) {
        $.post(
            "index.php?page=dashboard",
            {
                add_category: true,
                category: addCategoryInput.value
            },
            (data) => {
                console.log(data);
                addCategoryInput.style.border = ""
                addCategoryInput.value = "";
                getCategories();
            }
        )
    } else
        addCategoryInput.style.border = "1px solid red";
})
