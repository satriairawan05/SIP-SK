(function ($) {
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on("click", function (e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $(".sidebar .collapse").collapse("hide");
        }
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function () {
        if ($(window).width() < 768) {
            $(".sidebar .collapse").collapse("hide");
        }
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $("body.fixed-nav .sidebar").on(
        "mousewheel DOMMouseScroll wheel",
        function (e) {
            if ($(window).width() > 768) {
                var e0 = e.originalEvent,
                    delta = e0.wheelDelta || -e0.detail;
                this.scrollTop += (delta < 0 ? 1 : -1) * 30;
                e.preventDefault();
            }
        }
    );

    // Scroll to top button appear
    $(document).on("scroll", function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $(".scroll-to-top").fadeIn();
        } else {
            $(".scroll-to-top").fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on("click", "a.scroll-to-top", function (e) {
        var $anchor = $(this);
        $("html, body")
            .stop()
            .animate(
                {
                    scrollTop: $($anchor.attr("href")).offset().top,
                },
                1000,
                "easeInOutExpo"
            );
        e.preventDefault();
    });
})(jQuery); // End of use strict

// Modal Javascript

$(document).ready(function () {
    $("#myBtn").click(function () {
        $(".modal").modal("show");
    });

    $("#modalLong").click(function () {
        $(".modal").modal("show");
    });

    $("#modalScroll").click(function () {
        $(".modal").modal("show");
    });

    $("#modalCenter").click(function () {
        $(".modal").modal("show");
    });
});

// Popover Javascript

$(function () {
    $('[data-toggle="popover"]').popover();
});
$(".popover-dismiss").popover({
    trigger: "focus",
});

// Title blur or focus
const mainTitle = document.title;
window.addEventListener("blur", () => {
    document.title = "Terima Kasih telah berkunjung :)";
});

window.addEventListener("focus", () => {
    document.title = mainTitle;
});

// Version in Sidebar

var version = document.getElementById("version-ruangadmin");

version.innerHTML = "Version 1.0";

const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');

togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.querySelector('i').classList.toggle('fa-eye');
    this.querySelector('i').classList.toggle('fa-eye-slash');
});

const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
const passwordInputConfirm = document.getElementById('password-confirm');

togglePasswordConfirm.addEventListener('click', function () {
    const type = passwordInputConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInputConfirm.setAttribute('type', type);
    this.querySelector('i').classList.toggle('fa-eye');
    this.querySelector('i').classList.toggle('fa-eye-slash');
});
