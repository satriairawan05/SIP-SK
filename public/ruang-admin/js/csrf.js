// Mendapatkan token CSRF dari meta tag
var csrfToken = $('meta[name="csrf-token"]').attr("content");

// Mengatur header default untuk setiap permintaan AJAX dengan token CSRF
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": csrfToken,
    },
});
