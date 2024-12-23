
// ajax delete image from post, category, course editing

function deleteImage(tag) {
    var tag = $(tag);
    var imageId = tag.attr('data-imageId')
    var ajaxRoute = tag.attr('data-route')

    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: ajaxRoute,
                type: 'POST',
                data: {
                    imageId: imageId
                },
                success: function(data) {
                    $('.image-show').empty()
                }
            })

        }
    })
}


// ajax delete image from post, category, course editing

function deleteVideo(tag) {
    var tag = $(tag);
    var imageId = tag.attr('data-videoId')
    var ajaxRoute = tag.attr('data-route')

    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: ajaxRoute,
                type: 'DELETE',
                data: {
                   
                },
                success: function(data) {
                    $('.video-show').empty()
                }
            })

        }
    })
}


function deleteQuestion(tag) {

    var form = $(tag).children('form');

    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Item!",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
           form.submit();
        }else{
            return false;
        }
    })
}




