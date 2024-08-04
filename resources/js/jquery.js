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


window.vote = (id) => {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formData = new FormData();
    formData.append('post_id', id);
    fetch('/vote', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token, // Include the CSRF token
            'Accept': 'application/json' // Optional: for JSON response
        },
        body: formData
    }).then(response => response.text())
        .then(result => console.log(result))
        .catch(err => console.log(err))
}


