<!-- component -->
<!-- This is an example component -->
<div id="tag-container" class="max-w-2xl mx-auto">

    <div class="flex flex-col">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <div class="flex justify-between m-4">
                        <h3>Tags</h3>
                        <a href="#tag-form" onclick="showTagForm()" class="w-40 dark:hover:bg-gray-600">Add new Category</a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Tag Id
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Tag
                            </th>
                            <th scope="col" class="p-4">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="p-4">
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="tag-section" class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <section id="tag-form" class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-20">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add New Tag</h2>

        <form>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="tag-input">Tag</label>
                <input id="tag-input" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-800 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-800 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div class="flex justify-end mt-6">
                <button id="addTagBtn" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>

    <section id="edit-tag-form" class="hidden max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-20">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Update tag <span id="category-id">#</span></h2>

        <form>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="tag-input">tag</label>
                <input id="edit-tag-input" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-800 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-800 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div class="flex justify-end mt-6">
                <button id="editTagBtn" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
</div>