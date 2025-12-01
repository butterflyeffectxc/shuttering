// password eye visibility start
function visiblePassword() {
    const x = document.getElementById("password");
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

// button toggle register end
// Membuka input file yang disembunyikan
function openInput() {
    document.getElementById("imageInput").click();
}

// Menampilkan preview gambar
function previewImage(input) {
    const file = input.files[0];
    const preview = document.getElementById("imagePreview");

    if (!file) return;

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
