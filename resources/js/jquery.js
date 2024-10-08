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


window.vote = async (id) => {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formData = new FormData();
    formData.append('post_id', id);
    await fetch('/vote', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token, // Include the CSRF token
            'Accept': 'application/json' // Optional: for JSON response
        },
        body: formData
    }).then(response => response.json())
        .then(result => {
            if(result.unvoted)
            {
                const currentVoteCount = $(`#${id}voteCount`);
                currentVoteCount.text(parseInt(currentVoteCount.text()) - 1);
                $(`#${id}vote`).removeClass('text-orange-700');
            }
            if(result.voted)
            {
                const currentVoteCount = $(`#${id}voteCount`);
                currentVoteCount.text(parseInt(currentVoteCount.text()) + 1);
                $(`#${id}vote`).addClass('text-orange-700');
            }
        })
        .catch(err => console.log(err))
}

window.commentSection = (id) => {
    $(`#${id}commentSection`).fadeToggle(100);
}

window.showCommentOptions = (id) => {
    $(`#${id}commentOptions`).toggleClass('hidden');
}

window.sharePost = async (id) => {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formData = new FormData();
    formData.append('post_id', id);
    await fetch('/share', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token, // Include the CSRF token
            'Accept': 'application/json' // Optional: for JSON response
        },
        body: formData
    }).then(response => response.text())
        .then(result => console.log(result))
        .catch(err => console.log(err));
}

