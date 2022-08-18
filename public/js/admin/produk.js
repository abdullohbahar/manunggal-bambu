// Delete function
$("body").on("click", "#deleteProduk", function () {
    var id = $(this).data("id");
    var produk = $(this).data("produk");

    Swal.fire({
        title: `Apakah Anda Benar-Benar Ingin Menghapus Produk ${produk}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/destroy-produk/" + id,
                dataType: "json",
                type: "DELETE",
                success: function (response) {
                    if (response.status == 200) {
                        redirectLocation = "/admin/produk";

                        success(response.message, redirectLocation);
                    }
                },
            });
        }
    });
});
