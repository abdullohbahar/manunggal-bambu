// Submit Function
$("#submitData").on("submit", function (e) {
    e.preventDefault();

    var data = $("#submitData").serialize();
    Swal.fire({
        title: "Data Sedang Diproses",
        didOpen: () => {
            Swal.showLoading();
        },
    });

    $.ajax({
        data: data,
        url: "/admin/store-whatsapp",
        method: "POST",
        dataType: "json",
        success: function (response) {
            if (response.status == 400) {
                Swal.close();
                if (response.errors.no_whatsapp != null) {
                    var element = document.getElementById("nomorValidation");
                    element.classList.add("is-invalid");
                }
            } else {
                Swal.close();
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

    Swal.fire({
        title: "Data Sedang Diproses",
        didOpen: () => {
            Swal.showLoading();
        },
    });

    $.ajax({
        data: data,
        url: "/admin/update-whatsapp/" + id,
        method: "PUT",
        dataType: "json",
        success: function (response) {
            if (response.status == 400) {
                Swal.close();
                if (response.errors.no_whatsapp != null) {
                    var element = document.getElementById("nomorValidation");
                    element.classList.add("is-invalid");
                }
            } else {
                Swal.close();
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
            Swal.fire({
                title: "Data Sedang Dihapus",
                didOpen: () => {
                    Swal.showLoading();
                },
            });
            $.ajax({
                url: "/admin/destroy-whatsapp/" + id,
                dataType: "json",
                type: "DELETE",
                success: function (response) {
                    if (response.status == 200) {
                        Swal.close();
                        redirectLocation = "/admin/whatsapp";

                        success(response.message, redirectLocation);
                    } else {
                        Swal.close();
                    }
                },
            });
        }
    });
});
