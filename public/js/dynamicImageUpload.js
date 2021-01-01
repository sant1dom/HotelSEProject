// var maxImg = 0;
$(".imgAdd").click(function () {
    //if (maxImg < 3) {
    $("#imageContainer").prepend('<div class="col-sm-6 imgUp">' +
        '<div class="imagePreview"></div>' +
        '<label class="btn btn-primary">Upload' +
        '<input id="image" name="images[]" type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label>' +
        '<i class="fa fa-times del"></i></div>');
    // maxImg++;
    // }
});


$(document).on("click", "i.del", function () {
    //maxImg--;
    $(this).parent().remove();
});
$(function () {
    $(document).on("change", ".uploadFile", function () {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function () { // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile.closest(".imgUp").find('.imagePreview').css({"background-image": "url(" + this.result + ")", "background-position" : "center"});
            }
        }

    });
});
