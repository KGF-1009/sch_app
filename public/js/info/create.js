$(function() {
    $("#createInfo").validate({
        rules: {
            info_name: {
                required: true,
                maxlength: 25,
                minlength: 2
            },
            info: {
                required: true,
                maxlength: 100,
                minlength: 2
            },
            author: {
                required: true,
                maxlength: 20,
                minlength: 1
            }
        }
    });
});
