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
// sweetalert start

// sweetalert end
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
    const durationInput = document.getElementById("duration");
    const totalPriceInput = document.getElementById("total_price"); // tampilan
    const totalPriceRaw = document.getElementById("total_price_raw"); // hidden

    if (durationInput) {
        durationInput.addEventListener("change", function () {
            let rate = parseInt(durationInput.dataset.rate);
            let duration = durationInput.value;

            if (!duration) return;

            let [hour, minute] = duration.split(":").map(Number);
            let durInHours = hour + minute / 60;

            let total = Math.round(rate * durInHours);

            totalPriceRaw.value = total;
            totalPriceInput.value = "Rp " + total.toLocaleString("id-ID");
        });
    }

    // const durationInput = document.getElementById("duration");
    // const totalPriceInput = document.getElementById("total_price");
    // const totalPriceRaw = document.getElementById("total_price_raw");

    // if (!durationInput) return;

    // durationInput.addEventListener("change", function () {
    //     let rate = parseInt(durationInput.dataset.rate); // start rate
    //     let duration = durationInput.value;

    //     if (!duration) return;

    //     // Hitung durasi dalam jam
    //     let [hour, minute] = duration.split(":").map(Number);
    //     let durInHours = hour + minute / 60;

    //     // Hitung harga
    //     let total = Math.round(rate * durInHours);

    //     // Masukkan ke hidden input (nilai bersih)
    //     totalPriceRaw.value = total;

    //     // Format rupiah untuk user
    //     totalPriceInput.value = formatRupiah(total.toString());
    // });

    // function formatRupiah(angka) {
    //     return "Rp " + angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    // }
    // total price end
    // modal booking detail start
    // const detailModal = document.getElementById("detailBooking");

    // detailModal.addEventListener("show.bs.modal", function (event) {
    //     const button = event.relatedTarget;

    //     // Ambil semua data-* dari button
    //     const name = button.getAttribute("data-name");
    //     const status = button.getAttribute("data-status");
    //     const photo = button.getAttribute("data-photo");
    //     const date = button.getAttribute("data-date");
    //     const duration = button.getAttribute("data-duration");
    //     const location = button.getAttribute("data-location");
    //     const types = button.getAttribute("data-types");

    //     // Ambil element di modal
    //     const elPhoto = document.getElementById("dataPhoto");
    //     const elName = document.getElementById("dataName");
    //     const elStatus = document.getElementById("dataStatus");
    //     const elDateText = document.getElementById("dataDateText");
    //     const elDuration = document.getElementById("dataDuration");
    //     const elLocation = document.getElementById("dataLocation");
    //     const elType = document.getElementById("dataType");

    //     // Isi modal
    //     elPhoto.src = photo;
    //     elName.textContent = name;
    //     elType.textContent = types;

    //     elDateText.textContent = date;
    //     elDuration.textContent = duration;
    //     elLocation.textContent = location;

    //     // Set status warna
    //     elStatus.className = "chip-status chip-" + status;
    //     elStatus.textContent = status.charAt(0).toUpperCase() + status.slice(1);
    // });

    // modal booking detail end

    // preview image
    // const imageInput = document.getElementById("imageInput");
    // const preview = document.getElementById("imagePreview");

    // if (imageInput && preview) {
    //     imageInput.addEventListener("change", function () {
    //         const file = this.files[0];
    //         if (!file) return;

    //         const reader = new FileReader();
    //         reader.onload = (e) => {
    //             preview.src = e.target.result;
    //             preview.classList.remove("d-none");
    //         };
    //         reader.readAsDataURL(file);
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
