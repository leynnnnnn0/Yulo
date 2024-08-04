$(document).ready(function (){
    const createPostContainer = $('#createPostContainer');
    $('#hideCreatePost').click(function(){
        createPostContainer.addClass('hidden');
    });
    $('#showCreatePost').click(function(){
        createPostContainer.removeClass('hidden');
    })
    $('#hideEditPost').click(function() {
        $('#editPostContainer').addClass('hidden');
    })
});

// Show post options
window.showPostOptions = (id) => {
    $(`#${id}`).toggleClass('hidden');
}



