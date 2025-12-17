// password eye visibility start
function visiblePassword() {
    const x = document.getElementById("password");
    if (!x) return;
    const icon = x.nextElementSibling;
    if (x.type === "password") {
        x.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        x.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
function visiblePasswordConfirmation() {
    const x = document.getElementById("password_confirmation");
    if (!x) return;
    const icon = x.nextElementSibling;
    if (x.type === "password") {
        x.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        x.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
function visiblePasswordPhotographer() {
    const x = document.getElementById("password_photographer");
    if (!x) return;
    const icon = x.nextElementSibling;
    if (x.type === "password") {
        x.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        x.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
function visiblePasswordConfirmationPhotographer() {
    const x = document.getElementById("password_confirmation_photographer");
    if (!x) return;
    const icon = x.nextElementSibling;
    if (x.type === "password") {
        x.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        x.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
function visiblePasswordAdmin() {
    const x = document.getElementById("new_password");
    if (!x) return;
    const icon = x.nextElementSibling;
    if (x.type === "password") {
        x.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        x.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
function visiblePasswordAdminConfirmation() {
    const x = document.getElementById("new_password_confirmation");
    if (!x) return;
    const icon = x.nextElementSibling;
    if (x.type === "password") {
        x.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        x.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
// password eye visibility end

// fill star review start
document.querySelectorAll(".modal").forEach((modal) => {
    let stars = modal.querySelectorAll(".star");

    // Ambil hidden input yang ID-nya dinamis
    let ratingInput = modal.querySelector("input[id^='ratingInput_']");

    if (!stars.length || !ratingInput) return;

    stars.forEach((star) => {
        star.addEventListener("click", function () {
            let value = this.getAttribute("data-value");
            ratingInput.value = value;

            // Fill/unfill stars inside this modal only
            stars.forEach((s) => {
                if (s.getAttribute("data-value") <= value) {
                    s.classList.remove("bi-star");
                    s.classList.add("bi-star-fill");
                } else {
                    s.classList.remove("bi-star-fill");
                    s.classList.add("bi-star");
                }
            });
        });
    });
});
// fill star review end
// reusable sweetalert swal instances start
const Swal2 = Swal.mixin({
    customClass: { input: "form-control" },
});

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});
// reusable sweetalert swal instances end

// button toggle register start
document.addEventListener("DOMContentLoaded", () => {
    // button toggle register
    const btnCustomer = document.getElementById("btnCustomer");
    const btnPhotographer = document.getElementById("btnPhotographer");
    const customerForm = document.getElementById("customerForm");
    const photographerForm = document.getElementById("photographerForm");

    if (btnCustomer && btnPhotographer && customerForm && photographerForm) {
        btnCustomer.classList.add("active");
        customerForm.style.display = "block";
        photographerForm.style.display = "none";

        btnCustomer.addEventListener("click", () => {
            btnCustomer.classList.add("active");
            btnPhotographer.classList.remove("active");
            customerForm.style.display = "block";
            photographerForm.style.display = "none";
        });

        btnPhotographer.addEventListener("click", () => {
            btnPhotographer.classList.add("active");
            btnCustomer.classList.remove("active");
            customerForm.style.display = "none";
            photographerForm.style.display = "block";
        });
    }

    // total price start
    const durationSelect = document.getElementById("duration");
    const totalPriceDisplay = document.getElementById("total_price"); // formatted
    const totalPriceRaw = document.getElementById("total_price_raw"); // integer

    if (durationSelect) {
        durationSelect.addEventListener("change", function () {
            const rate = parseInt(this.dataset.rate);
            const duration = parseFloat(this.value);

            if (!duration || isNaN(duration)) {
                totalPriceDisplay.value = "";
                totalPriceRaw.value = "";
                return;
            }

            const total = Math.round(rate * duration);

            // 👀 Tampilan ke user
            totalPriceDisplay.value = "Rp" + total.toLocaleString("id-ID");

            // 📦 Dikirim ke backend
            totalPriceRaw.value = total;
        });
    }
    // format number start price start
    const rateDisplay = document.getElementById("start_rate_display");
    const rateRaw = document.getElementById("start_rate");

    rateDisplay.addEventListener("input", function () {
        // Ambil angka saja
        let value = this.value.replace(/\D/g, "");

        if (!value) {
            rateRaw.value = "";
            this.value = "";
            return;
        }

        // Simpan integer ke hidden input
        rateRaw.value = value;

        // Format ke Rupiah
        this.value = "Rp " + parseInt(value).toLocaleString("id-ID");
    });
    // document.addEventListener("DOMContentLoaded", () => {
    //     const raw = document.getElementById("start_rate").value;
    //     if (raw) {
    //         document.getElementById("start_rate_display").value =
    //             "Rp " + parseInt(raw).toLocaleString("id-ID");
    //     }
    // });
    // format number start price end
    // const durationSelect = document.getElementById("duration");
    // const totalPriceInput = document.getElementById("total_price"); // tampilan
    // const totalPriceRaw = document.getElementById("total_price_raw"); // hidden

    // if (durationSelect) {
    //     durationSelect.addEventListener("change", function () {
    //         const rate = parseInt(durationSelect.dataset.rate);
    //         const duration = parseFloat(durationSelect.value);

    //         if (!duration || isNaN(duration)) return;

    //         const total = Math.round(rate * duration);

    //         totalPriceRaw.value = total;
    //         totalPriceInput.value = "Rp " + total.toLocaleString("id-ID");
    //     });
    // }

    // const durationInput = document.getElementById("duration");
    // const totalPriceInput = document.getElementById("total_price"); // tampilan
    // const totalPriceRaw = document.getElementById("total_price_raw"); // hidden

    // if (durationInput) {
    //     durationInput.addEventListener("change", function () {
    //         let rate = parseInt(durationInput.dataset.rate);
    //         let duration = durationInput.value;

    //         if (!duration) return;

    //         let [hour, minute] = duration.split(":").map(Number);
    //         let durInHours = hour + minute / 60;

    //         let total = Math.round(rate * durInHours);

    //         totalPriceRaw.value = total;
    //         totalPriceInput.value = "Rp " + total.toLocaleString("id-ID");
    //     });
    // }

    // carousel thumbs
    const thumbs = document.querySelectorAll(".thumb");
    if (thumbs.length > 0) {
        const carousel = new bootstrap.Carousel("#weddingCarousel");
        thumbs.forEach((thumb, index) => {
            thumb.addEventListener("click", () => {
                carousel.to(index);
                thumbs.forEach((t) => t.classList.remove("active-thumb"));
                thumb.classList.add("active-thumb");
            });
        });
    }
});
