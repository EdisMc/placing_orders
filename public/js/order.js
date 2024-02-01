$(document).ready(function () {

    $('#order-form').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/order',
            data: $(this).serialize(),
            success: function (response) {
                console.log('Order created successfully!');
            },
            error: function (error) {
                console.error('Error while creating order:', error);
            }
        });
    });

});
