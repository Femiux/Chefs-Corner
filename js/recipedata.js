$(document).ready(function() {
    $('.recipe-card-link').click(function(e) {
        e.preventDefault(); // Prevent default link behavior

        // Extract recipe ID from data attribute
        var recipeId = $(this).closest('.recipe-card').data('recipe-id');

        // Call showRecipeDetails function with recipe ID
        showRecipeDetails(recipeId);
    });
});

// Function to show recipe details using AJAX
function showRecipeDetails(recipeId) {
    // Make AJAX request to fetch recipe details from the server
    $.ajax({
        type: 'POST',
        url: 'load_recipe.php', // Replace with your server-side script to fetch recipe details
        data: { recipeId: recipeId },
        success: function(response) {
            // Populate modal with recipe details
            $('#recipeDetails').html(response);
            $('#recipeModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}
