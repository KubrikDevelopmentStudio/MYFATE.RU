/**
 * Created by root on 30.10.16.
 */
$(document).ready(function(){
    setInterval(function() {
        $('.aMore').on('mouseover', function() {
            $('.other').css({'display':'table'});
            $('.other').animate({'margin-top':'50px', 'opacity':'1'}, {queue:false, duration:500});
        });
    }, 500);

    setInterval(function() {
        $('.aMore').on('mouseout', function() {
            $('.other').animate({'margin-top':'350px', 'opacity':'0'}, {queue:false, duration:500});
        })
    }, 500);

    $('.reg').on('click', function() {
        $('.main-signin').animate({'margin-left':'-1000px'}, {queue:false, duration:500});
        $('.main-signin1').animate({'margin':'-501px 257px', 'left': '475px'}, {queue:false, duration:500}).css({'display':'block'});
    });
    setInterval(function() {
        $('.revertToAut').on('click', function() {
            $('.main-signin').animate({'margin-left':'725px'}, {queue:false, duration:500});
            $('.main-signin1').animate({'margin':'-501px 3000px', 'left':'-467px'}, {queue:false, duration:500});
        })
    }, 500);
});

