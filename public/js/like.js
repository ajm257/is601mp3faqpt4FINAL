$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.like').on('click', function(event) {
        var isLike = event.target.previousElementSibling == null ? true : false;
       console.log(isLike);
    });
});