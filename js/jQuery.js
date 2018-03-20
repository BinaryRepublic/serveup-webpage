$(document).ready(function() {
    $("#btnvision").click(function() {
        $('html, body').animate({
            scrollTop: $("#vision").offset().top
        }, 500);
    });

    $("#btncontact").click(function() {
        $('html, body').animate({
            scrollTop: $("#contact").offset().top
        }, 500);
    });
});