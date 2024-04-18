$(document).ready(function(){    
    var recipeData = $('#recipeList').DataTable({
        "lengthChange": false,
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"chef/action.php",
            type:"POST",
            data:{action:'listRecipe'}, // Change 'listEmployee' to 'listRecipe'
            dataType:"json"
        },
        "columnDefs":[
            {
                "targets":[0, 6, 7],
                "orderable":false,
            },
        ],
        "pageLength": 10
    });        
    $('#addRecipe').click(function(){
        $('#recipeModal').modal('show');
        $('#recipeForm')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Add Recipe");
        $('#action').val('addRecipe');
        $('#save').val('Add');
    });        
    $("#recipeList").on('click', '.update', function(){
        var recipeId = $(this).attr("id"); // 
        var action = 'getRecipe'; 
        $.ajax({
            url:'chef/action.php',
            method:"POST",
            data:{recipeId:recipeId, action:action}, 
            dataType:"json",
            success:function(data){
                $('#recipeModal').modal('show');
                $('#recipeId').val(data.recipe_id); 
                $('#recipeName').val(data.recipe_name); 
                $('#category').val(data.category);
                $('#duration').val(data.duration);
                $('#ingredients').val(data.ingredients);                
                $('#location').val(data.location);
                $('.modal-title').html("<i class='fa fa-plus'></i> Edit Recipe");
                $('#action').val('updateRecipe');
                $('#save').val('Save');
            }
        })
    });
    $("#recipeModal").on('submit','#recipeForm', function(event){
        event.preventDefault();
        $('#save').attr('disabled','disabled');
        var formData = $(this).serialize();
        $.ajax({
            url:"chef/action.php", 
            method:"POST",
            data:formData,
            success:function(data){                
                $('#recipeForm')[0].reset();
                $('#recipeModal').modal('hide');                
                $('#save').attr('disabled', false);
                recipeData.ajax.reload();
            }
        })
    });        
    $("#recipeList").on('click', '.delete', function(){
        var recipeId = $(this).attr("id");        
        var action = "recipeDelete"; // Change 'empDelete' to 'recipeDelete'
        if(confirm("Are you sure you want to delete this recipe?")) {
            $.ajax({
                url:"chef/action.php",
                method:"POST",
                data:{recipeId:recipeId, action:action}, // Change 'empId' to 'recipeId'
                success:function(data) {                    
                    recipeData.ajax.reload();
                }
            })
        } else {
            return false;
        }
    });    
});
