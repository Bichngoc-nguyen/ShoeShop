$(document).ready(function () {
    // products
    $('.sidebar-products').click(function (e) { 
        e.preventDefault();
        $('.products-item').addClass('hiden').slideToggle();
    });
    // orders
    $('.sidebar-orders').click(function (e) { 
        e.preventDefault();
        $('.orders-item').addClass('hiden').slideToggle();
    });
    
    // customers
    $('.sidebar-customers').click(function (e) { 
        e.preventDefault();
        $('.customers-item').addClass('hiden').slideToggle();
    });
    
    // users
    $('.sidebar-users').click(function (e) { 
        e.preventDefault();
        $('.users-item').addClass('hiden').slideToggle();
    });

    
});