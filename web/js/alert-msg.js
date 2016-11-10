/**
 * Created by ruslan on 04.11.16.
 */
$(document).ready(function () {

    $('.error').fadeIn(1000).on('click', function () {
       $(this).fadeOut(1000);
   })

    $('.success').fadeIn(1000);

   /* setInterval(function () {
        $('.error').fadeOut(1000);
    }, 5000);*/
});