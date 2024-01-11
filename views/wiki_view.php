<main class="mt-10">

    <div class="mb-4 md:mb-0 w-full mx-auto relative">
        <div class="px-4 lg:px-0">
            <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
                <?= $wikiInfos["title"] ?>
            </h2>
            <div class="flex justify-between">

                <a
                        href="#"
                        class="py-2 text-green-700 inline-flex items-center justify-center mb-2"
                >
                    <?= $wikiInfos["category"] ?>
                </a>
                <div>
                    <?php foreach ($tags as $tag) { ?>
                        <span class="border border-yellow-600 rounded-full px-4 text-sm mx-3 text-yellow-600 py-0.5">
                          <?= $tag["tag"] ?>
                        </span>
                    <?php } ?>
                </div>

                <div id="create-date" class="rounded-full py-1 px-4 font-medium border bg-white border-gray-300">

                </div>
            </div>
        </div>

        <img src="https://images.unsplash.com/photo-1587614387466-0a72ca909e16?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80"
             class="w-full object-cover lg:rounded" style="height: 28em;"/>
    </div>

    <div class="flex flex-col lg:flex-row lg:space-x-12">

        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
            <p class="pb-6"><?= $wikiInfos["content"] ?></p>

        </div>

        <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
            <div class="p-4 border-t border-b md:border md:rounded">
                <div class="flex py-2">
                    <img src="assets/img/<?= $wikiInfos["picture"] ?>"
                         class="h-10 w-10 rounded-full mr-2 object-cover"/>
                    <div>
                        <p class="font-semibold text-gray-700 text-sm"> <?= $wikiInfos["username"] ?></p>
                        <p class="font-semibold text-gray-500 text-sm"> <?= $wikiInfos["email"] ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<!-- main ends here -->


<script>

    $("#create-date").html("created In " + formatTimestamp(<?=  $wikiInfos["created_date"] ?>));

    function formatTimestamp(timestamp) {
        // Convert timestamp to milliseconds
        const date = new Date(timestamp * 1000);

        // Extract components
        const day = date.getDate();
        const month = date.getMonth() + 1; // Months are zero-based
        const year = date.getFullYear();

        const hours = date.getHours();
        const minutes = date.getMinutes();

        // Check if it's a full date or just time
        if (day !== 1 || month !== 1 || year !== 1970) {
            return `${day}/${month < 10 ? '0' : ''}${month}/${year}, ${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
        } else {
            return `${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
        }
    }
</script>