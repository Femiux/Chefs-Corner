// Function to fetch recipes based on selected category and location
function fetchRecipes(category, location) {
    var url = "fetch_recipes.php?category=" + category + "&location=" + location;
    fetch(url)
        .then(response => response.text())
        .then(data => {
            // Update the "filteredRecipes" div with the fetched recipes
            document.getElementById("filteredRecipes").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

document.getElementById("categoryFilter").addEventListener("change", function() {
    var selectedCategory = this.value;
    var selectedLocation = document.getElementById("categoryCuisine").value;
    fetchRecipes(selectedCategory, selectedLocation);
});

document.getElementById("categoryCuisine").addEventListener("change", function() {
    var selectedCategory = document.getElementById("categoryFilter").value;
    var selectedLocation = this.value;
    fetchRecipes(selectedCategory, selectedLocation);
});