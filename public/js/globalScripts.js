$(".alert").fadeTo(20000, 500).slideUp(500, function(){     //20 seconds
    $(".alert").alert('close');
});

$(function () {
    $('.popover-dismiss').popover({
        container: 'body',
        trigger: 'focus'
    })
});
