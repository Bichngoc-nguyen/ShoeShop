$(document).ready(function () {
    // post
    $('.sidebar-posts').click(function (e) { 
        e.preventDefault();
        $('.posts-item').addClass('hiden').slideToggle();
    });
    
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
    
    // users
    $('.sidebar-users').click(function (e) { 
        e.preventDefault();
        $('.users-item').addClass('hiden').slideToggle();
    });
});