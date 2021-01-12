$(document).on("click", "i.formAdd", function () {
    $("#guestContainer").append('<div class="col-sm-6 my-3">' +
        '<div class="card">' +
        '<div class="card-body">' +
        '<label For="names">First name:</label>' +
        '<input class="form-control " type="text" id="name" name="names[]" form="sub-form">' +
        '<label for="surnames">Last name:</label>' +
        '<input class="form-control " type="text" id="surname" name="surnames[]" form="sub-form">' +
        '<label for="doctypes">Document type:</label>' +
        '<input class="form-control " type="text" id="doctype" name="doctypes[]" form="sub-form">' +
        '<label for="numdocs">Document number:</label>' +
        '<input class="form-control " type="text" id="numdoc" name="numdocs[]" form="sub-form">' +
        '<label for="birthdates">Birth date:</label>' +
        '<input class="form-control " type="date" id="birthdate" name="birthdates[]" form="sub-form" max="  <?php echo date(\'Y-m-d\'); ?>  ">' +
        '</div> </div> <i class = "fa fa-times del"> </i> ');
});

$(document).on("click", "i.del", function () {
    $(this).parent().remove();
});

