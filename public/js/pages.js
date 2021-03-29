$(document).ready(function () {
    // btn prev
    $('#btn-prev').click(function (event) {
        var img_next = $('.active').prev();
        if(img_next.length!=0){
            $('.active').addClass('out-prev').one('webkitAnimationEnd', function (event) {
                $('.out-prev').removeClass('active').removeClass('out-prev');
            });
            img_next.addClass('in-prev').addClass('active').one('webkitAnimationEnd', function(event) {
                $('.in-prev').removeClass('in-prev');
            });
        }
        else{
            $('.active').addClass('out-prev').one('webkitAnimationEnd', function(e) {
                e.preventDefault();
                $('.out-prev').removeClass('active').removeClass('out-prev');
            });
            $('.slide-list_item:last-child').addClass('active').addClass('in-prev').one('webkitAnimationEnd', function(event) {
                $('.in-prev').removeClass('in-prev');
            });
        }
    });
    // btn next
    $('#btn-next').click(function (e) { 
        var img_next = $('.active').next();
        e.preventDefault();
        if (img_next.length!=0) {
            $('.active').addClass('out-next').one('webkitAnimationEnd', function(e) {
                e.preventDefault();
                $('.out-next').removeClass('active').removeClass('out-next');
            });
            img_next.addClass('active').addClass('active').addClass('in-next').one('webkitAnimationEnd', function(e) {
                e.preventDefault();
                $('.in-next').removeClass('in-next');
            });
        }else{
            $('.active').addClass('out-next').one('webkitAnimationEnd', function(e) {
                e.preventDefault();
                $('.out-next').removeClass('out-next').removeClass('active');
            });
            $('.slide-list_item:first-child').addClass('active').addClass('in-next').one('webkitAnimationEnd', function(e) {
                e.preventDefault();
                $('.in-next').removeClass('in-next');
            });
        }
       
    });

    // show image
    $('.show_image .small_img > img').click(function(){
        var smallImg = $(this).attr('src');
        var show = $('.big_img > img').attr('src', smallImg);
        console.log(show);
    });

    // cart
    $(function(){
        $('input[type="number"]').niceNumber();
    });
    // size
    $("#size").zInput();

    // btn UP
    $(".btnUp").click(function (e) { 
        e.preventDefault();
        $("html, body").animate({transition: '0.4s', scrollTop: 0}, 1000);
        $(".btnUp").addClass('hiden');
        $(".btnUp").removeClass('show');
        $(".btnDown").addClass('show');
        $(".btnDown").removeClass('hiden');
    });

    // btn Down 
    $(".btnDown").click(function (e) { 
        e.preventDefault();
        $("html, body").animate({transition: '0.4s', scrollTop: $(document).height() }, 1000);
        $(".btnDown").addClass('hiden');
        $(".btnDown").removeClass("show");
        $(".btnUp").removeClass('hiden');
        $(".btnUp").addClass('show');
        // $(window).load(function() {
        //   console.log("ddddddd");  
        //     $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        //   });
    });
    

});
        