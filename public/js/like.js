$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.like').on('click', function(event) {
        event.preventDefault();
        answerId = event.target.parentNode.parentNode.dataset['answerid'];
        var isLike = event.target.previousElementSibling == null;
        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {isLike: isLike, answerId: answerId, _token: token}
        })
            .done(function() {

                // this is where you add functionality to change the button link text once everything is working
            });
    });
});

