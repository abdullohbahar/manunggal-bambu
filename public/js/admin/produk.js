//  function Delete Produk
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

// Membuat Rupiah
$("#harga").on("keyup", function (e) {
    var number_string = $(this)
            .val()
            .replace(/[^,\d]/g, "")
            .toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    $(this).val(rupiah);
});

// Preview Image
function previewImage() {
    const image = document.querySelector("#gambar");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}
