$("#submitData").on("submit", function (e) {
    e.preventDefault();

    var data = $("#submitData").serialize();
    console.log(data);

    $.ajax({
        data: data,
        url: "/admin/store-whatsapp",
        method: "POST",
        dataType: "json",
        success: function (response) {
            if (response.status == 400) {
                if (response.errors.no_whatsapp != null) {
                    var element = document.getElementById("nomorValidation");
                    element.classList.add("is-invalid");
                }
            } else {
                var message = response.message;
                redirectLocation = "/admin/whatsapp";

                success(message, redirectLocation);
            }
        },
    });
});
