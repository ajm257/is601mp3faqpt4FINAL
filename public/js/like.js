$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.like').on('click', function (event) {
        event.preventDefault();
        answerId = event.target.parentNode.parentNode.dataset['answerid'];
        var isLike = event.target.previousElementSibling == null;
        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {isLike: isLike, answerId: answerId, _token: token},
            success: function (data) {
                console.dir(data);
            }
        })
            .done(function() {
                event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this answer' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this answer' : 'Dislike';
                if (isLike) {
                    event.target.nextElementSibling.innerText = 'Dislike';
                } else {
                    event.target.previousElementSibling.innerText = 'Like';
                }
            });
    });
});

