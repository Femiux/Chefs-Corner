function filterRecipes() {
    var category = document.getElementById("categoryFilter").value;
    var cuisine = document.getElementById("cuisineFilter").value;
    var keyword = document.getElementById("searchInput").value;

    console.log

    // Send AJAX request to server to fetch filtered recipes
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "filter_recipes.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("recipeList").innerHTML = xhr.responseText;
        }
    };
    xhr.send("category=" + category + "&cuisine=" + cuisine + "&keyword=" + keyword);
}
