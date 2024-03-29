<!-- component -->
<!-- This is an example component -->
<div id="category-container" class="max-w-2xl mx-auto">

    <div class="flex flex-col">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <div class="flex justify-between md:mx-4">
                        <h3>Categories</h3>
                        <a href="#category-form" onclick="showForm()" class="w-32 md:w-40 dark:hover:bg-gray-600">Add new Category</a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Category Id
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Category
                            </th>
                            <th scope="col" class="p-4">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="p-4">
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="category-section" class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <section id="category-form" class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-8 md:mt-16">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add New Category</h2>

        <form>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="category-input">Category</label>
                    <input id="category-input" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-800 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-800 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

            <div class="flex justify-end mt-6">
                <button id="addCategoryBtn" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>

    <section id="edit-category-form" class="hidden max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-8 md:mt-16">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Update Category <span id="category-id">#</span></h2>

        <form>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="category-input">Category</label>
                <input id="edit-category-input" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-800 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-800 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div class="flex justify-end mt-6">
                <button id="editCategoryBtn" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
</div>