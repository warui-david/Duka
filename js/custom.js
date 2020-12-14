$(document).ready(function () {
    $('.navbar-light .dmenu').hover(function () {
        $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
    });
});


$('.addcategory').click(function (e) {
    e.preventDefault();
    $.get('addcategory', function (data) {
        $('#addcategory').modal('show')
            .find('#addcategoryContent')
            .html(data);
    });
});

$('.addbrand').click(function (e) {
    e.preventDefault();
    $.get('addbrand', function (data) {
        $('#addbrand').modal('show')
            .find('#addbrandContent')
            .html(data);
    });
});

$('.addtocart').click(function (e) {
    e.preventDefault();
    var shoe_id = $(this).attr('val');
    $.get('addtocart?shoe_id='+shoe_id, function (data) {
        $('#addtocart').modal('show')
            .find('#addtocartContent')
            .html(data);
    });
});
