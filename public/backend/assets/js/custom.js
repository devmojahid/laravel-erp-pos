// jquery document ready function
$(document).ready(function () {
    // sweet alert delete
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you Want to delete?",
            text: "Once Delete, This will be Permanently Delete!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
    });
    // sweet alert logout
    $(document).on("click", "#logout", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you Want to logout?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Not Logout!");
                }
            });
    });
});
function showError(field, message) {
    if (!message) {
        $("#" + field).addClass("is-valid").removeClass("is-invalid").siblings(".invalid-feedback")
            .text("");
    } else {
        $("#" + field).addClass("is-invalid").removeClass("is-valid").siblings(".invalid-feedback")
            .text(message);
    }
}

function removeValidationClass(form) {
    $(form).each(function () {
        $(form).find(":input").removeClass('is-invalid is-invalid');
    })
}

function showMessage(type, message) {
    return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
        <strong>${message}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
}
