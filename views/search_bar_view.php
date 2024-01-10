<script>
    const searchInput = document.getElementById("search-input")
    const searchBtn = document.getElementById("search-btn")

    $(searchBtn).click(() => {
        console.log(searchInput.value);
    })
</script>