$(document).ready(function () {
    // products-cate
    $('.sidebar-cate').click(function (e) { 
        e.preventDefault();
        $('.cate-item').addClass('hiden').slideToggle();
    });
    
    // products
    $('.sidebar-products').click(function (e) { 
        e.preventDefault();
        $('.products-item').addClass('hiden').slideToggle();
    });
    
    // products-sneakers
    $('.sneakers').click(function (e) { 
        e.preventDefault();
        $('.sneakers-item').addClass('hiden').slideToggle();
    });

    // products-sandals
    $('.sandals').click(function (e) { 
        e.preventDefault();
        $('.sandals-item').addClass('hiden').slideToggle();
    });

    // products-got
    $('.got').click(function (e) { 
        e.preventDefault();
        $('.got-item').addClass('hiden').slideToggle();
    });

    // products-bupbe
    $('.bupbe').click(function (e) { 
        e.preventDefault();
        $('.bupbe-item').addClass('hiden').slideToggle();
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