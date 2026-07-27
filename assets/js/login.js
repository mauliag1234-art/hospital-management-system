// ==========================================
// MediCore HMS Login JS
// ==========================================

document.addEventListener("DOMContentLoaded", function () {

    // ==========================
    // Password Show / Hide
    // ==========================

    const password = document.getElementById("password");
    const toggle = document.getElementById("togglePassword");

    if (password && toggle) {

        toggle.addEventListener("click", function () {

            const icon = this.querySelector("i");

            if (password.type === "password") {

                password.type = "text";

                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");

            } else {

                password.type = "password";

                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");

            }

        });

    }

    // ==========================
    // Input Focus Effect
    // ==========================

    const inputs = document.querySelectorAll(".form-control");

    inputs.forEach(function (input) {

        input.addEventListener("focus", function () {

            this.parentElement.style.boxShadow =
                "0 0 15px rgba(13,110,253,0.30)";

        });

        input.addEventListener("blur", function () {

            this.parentElement.style.boxShadow = "none";

        });

    });

    // ==========================
    // Login Button Animation
    // ==========================

    const loginBtn = document.querySelector(".login-btn");

    if (loginBtn) {

        loginBtn.addEventListener("mouseenter", function () {

            this.style.transform = "translateY(-3px) scale(1.02)";

        });

        loginBtn.addEventListener("mouseleave", function () {

            this.style.transform = "translateY(0) scale(1)";

        });

    }

});