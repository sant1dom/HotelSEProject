$(document).on("click", "i.formAdd", function () {
    $("#guestContainer").append('<div class="col-sm-6">' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<label For="name">First name:</label>' +
        '<input class="form-control " type="text" id="name" name="name[]" form="sub-form">' +
        '<label for="surname">Last name:</label>' +
        '<input class="form-control " type="text" id="surname" name="surname[]" form="sub-form">' +
        '<label for="doctype">Document type:</label>' +
        '<input class="form-control " type="text" id="doctype" name="doctype[]" form="sub-form">' +
        '<label for="numdoc">Document number:</label>' +
        '<input class="form-control " type="text" id="numdoc" name="numdoc[]" form="sub-form">' +
        '<label for="birthdate">Birth date:</label>' +
        '<input class="form-control " type="date" id="birthdate" name="birthdate[]" form="sub-form" max="  <?php echo date(\'Y-m-d\'); ?>  ">' +
        '</div> </div> <i class = "fa fa-times del"> </i> ');
});

$(document).on("click", "i.del", function () {
    $(this).parent().remove();
});

