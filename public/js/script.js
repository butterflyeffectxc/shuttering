document.addEventListener("DOMContentLoaded", function () {
    initTotalPrice();
});
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
// password eye visibility end

// button toggle register start

const btnCustomer = document.getElementById("btnCustomer");
const btnPhotographer = document.getElementById("btnPhotographer");
const customerForm = document.getElementById("customerForm");
const photographerForm = document.getElementById("photographerForm");
if (btnCustomer && btnPhotographer && customerForm && photographerForm) {
    document.addEventListener("DOMContentLoaded", () => {
        btnCustomer.classList.add("active");
        btnPhotographer.classList.remove("active");
        customerForm.style.display = "block";
        photographerForm.style.display = "none";
    });
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

// button toggle register end

// total price start
function initTotalPrice() {
    const durationInput = document.getElementById("duration");
    const totalPriceInput = document.getElementById("total_price");

    if (!durationInput || !totalPriceInput) return;

    durationInput.addEventListener("input", function () {
        let timeValue = this.value;
        let rate = parseInt(this.dataset.rate);

        if (!timeValue || !rate) {
            totalPriceInput.value = "";
            return;
        }

        let parts = timeValue.split(":");
        let hours = parseInt(parts[0]) || 0;
        let minutes = parseInt(parts[1]) || 0;
        let durationInHours = hours + minutes / 60;

        let total = durationInHours * rate;
        let formatted = total.toLocaleString("id-ID");

        totalPriceInput.value = "Rp " + formatted;
    });
}

// total price end

// Membuka input file yang disembunyikan
function openInput() {
    const imageInput = document.getElementById("imageInput");
    if (imageInput) {
        imageInput.click();
    }
}

// Menampilkan preview gambar
function previewImage(input) {
    const file = input.files[0];
    const preview = document.getElementById("imagePreview");

    if (!file || !preview) return;

    const reader = new FileReader();

    reader.onload = function (e) {
        preview.src = e.target.result;
        preview.classList.remove("d-none"); // Menampilkan gambar
    };

    reader.readAsDataURL(file);
}

// preview image end
const thumbs = document.querySelectorAll(".thumb");
const carousel = new bootstrap.Carousel("#weddingCarousel");

thumbs.forEach((thumb, index) => {
    thumb.addEventListener("click", () => {
        carousel.to(index);
        thumbs.forEach((t) => t.classList.remove("active-thumb"));
        thumb.classList.add("active-thumb");
    });
});
