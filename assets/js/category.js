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

function getCategories() {
    categorySection.innerHTML = "";
    $.get(
        "index.php?page=dashboard&get_categories=true",
        (data) => {
            console.log(data);
            let categories = JSON.parse(data);

            categories.forEach((category) => {
                categorySection.innerHTML += `<tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${category.category_id}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">${category.category}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <a href="#category-form" class="edit-category text-blue-600 dark:text-blue-500 hover:underline"
                                                data-category-id="${category.category_id}" data-category-name="${category.category}">Edit</a>
                                            </td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <a data-category-id="${category.category_id}" class="delete-category cursor-pointer text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                            </td>
                                        </tr>`;
            })
        }
    )

    $(categorySection).ready(() => {
        $(categorySection).on("click", ".edit-category", function () {
            currentCategoryId = $(this).data("category-id");
            currentCategory = $(this).data("category-name");
            console.log(document.querySelector("#edit-category-form").classList);
            document.querySelector("#edit-category-form").classList.remove("hidden");
            document.querySelector("#category-form").classList.add("hidden");
            document.querySelector("#edit-category-input").value = currentCategory;
        })

        $(categorySection).on("click", ".delete-category", function () {
            currentCategoryId = $(this).data("category-id");
            deleteCategory(currentCategoryId);
        });
    })


}

function updateCategory(categoryId) {
    event.preventDefault();
    if (editCategoryInput.value.length !== 0) {
        $.post(
            "index.php?page=dashboard",
            {
                edit_category: true,
                category: editCategoryInput.value,
                category_id: categoryId
            },
            (data) => {
                console.log(data);
                editCategoryInput.style.border = ""
                editCategoryInput.value = "";
            }
        )
    } else
        editCategoryInput.style.border = "1px solid red";
}

