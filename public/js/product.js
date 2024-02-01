$(document).ready(function () {

    $('#product-form').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/product',
            data: $(this).serialize(),
            success: function (response) {
                console.log('Product created successfully!');
            },
            error: function (error) {
                console.error('Error while creating product:', error);
            }
        });
    });

});
