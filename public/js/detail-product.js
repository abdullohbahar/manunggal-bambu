// Selecting images
$("body").on("click", "#selectImage", function () {
    var image = $(this).data("image");
    $("img").removeClass("selectedImage");
    $(this).addClass("selectedImage");
    $("#firstImage").attr("src", image);
});
