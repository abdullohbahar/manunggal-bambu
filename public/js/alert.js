function success(message) {
    $(".is-invalid").removeClass("is-invalid");

    Swal.fire({
        position: "center",
        icon: "success",
        title: message,
        showConfirmButton: false,
        timer: 1500,
    });

    setTimeout(function () {
        window.location = "";
    }, 1450);
}
