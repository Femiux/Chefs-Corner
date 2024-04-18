$.ajax({
    url: 'load_recipe.php',
    type: 'POST',
    data: {
        recipe_id: some_recipe_id,
        rating: some_rating
    },
    dataType: 'json', // Expecting JSON response
    success: function(response) {
        if (response.success) {
            // Handle success
        } else {
            console.error('Error:', response.message);
        }
    },
    error: function(xhr, status, error) {
        console.error('AJAX Error:', error);
    }
});
