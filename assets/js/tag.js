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

function getTags() {
    tagSection.innerHTML = "";
    $.get(
        "index.php?page=dashboard&get_tags=true",
        (data) => {
            console.log(data);
            let tags = JSON.parse(data);

            tags.forEach((tag) => {
                tagSection.innerHTML += `<tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${tag.tag_id}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">${tag.tag}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <a href="#tag-form" class="edit-tag text-blue-600 dark:text-blue-500 hover:underline"
                                                data-tag-id="${tag.tag_id}" data-tag-name="${tag.tag}">Edit</a>
                                            </td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <a data-tag-id="${tag.tag_id}" class="delete-tag cursor-pointer text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                            </td>
                                        </tr>`;
            })
        }
    )

    $(tagSection).ready(() => {
        $(tagSection).on("click", ".edit-tag", function () {
            currentTagId = $(this).data("tag-id");
            currentTag = $(this).data("tag-name");
            console.log(document.querySelector("#edit-tag-form").classList);
            document.querySelector("#edit-tag-form").classList.remove("hidden");
            document.querySelector("#tag-form").classList.add("hidden");
            document.querySelector("#edit-tag-input").value = currentTag;
        })

        $(tagSection).on("click", ".delete-tag", function () {
            currentTagId = $(this).data("tag-id");
            deleteTag(currentTagId);
        });
    })


}

function updateTag(tagId) {
    event.preventDefault();
    if (editTagInput.value.length !== 0) {
        $.post(
            "index.php?page=dashboard",
            {
                edit_tag: true,
                tag: editTagInput.value,
                tag_id: tagId
            },
            (data) => {
                console.log(data);
                editTagInput.style.border = ""
                editTagInput.value = "";
            }
        )
    } else
        editTagInput.style.border = "1px solid red";
}
