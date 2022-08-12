// Submit Function
$("#submitData").on("submit", function (e) {
    e.preventDefault();

    var data = $("#submitData").serialize();

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

// Edit Function
$("#editData").on("submit", function (e) {
    e.preventDefault();
    var data = $("#editData").serialize();
    var id = $("#id").val();

    console.log(data);

    $.ajax({
        data: data,
        url: "/admin/update-whatsapp/" + id,
        method: "PUT",
        dataType: "json",
        success: function (response) {
            console.log(response);
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

// Delete function
$("body").on("click", "#deleteWhatsapp", function () {
    var id = $(this).data("id");
    var no = $(this).data("no");

    Swal.fire({
        title: `Apakah Anda Benar-Benar Ingin Menghapus Nomor ${no}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/destroy-whatsapp/" + id,
                dataType: "json",
                type: "DELETE",
                success: function (response) {
                    if (response.status == 200) {
                        redirectLocation = "/admin/whatsapp";

                        success(response.message, redirectLocation);
                    }
                },
            });
        }
    });
});
