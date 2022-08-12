function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
        $("#iconShowPassword").addClass("fa-eye-slash").removeClass("fa-eye");
    } else {
        x.type = "password";
        $("#iconShowPassword").addClass("fa-eye").removeClass("fa-eye-slash");
    }
}
