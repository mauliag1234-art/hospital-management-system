console.log("Patient Module Loaded");

// ============================
// Photo Preview
// ============================

const photoInput = document.getElementById("photo");
const preview = document.getElementById("preview");

if (photoInput && preview) {
    photoInput.addEventListener("change", function () {

        if (this.files && this.files[0]) {
            preview.src = URL.createObjectURL(this.files[0]);
        }

    });
}

// ============================
// Auto Age Calculate
// ============================

const dobInput = document.getElementById("dob");
const ageInput = document.getElementById("age");

if (dobInput && ageInput) {

    dobInput.addEventListener("change", function () {

        const dob = new Date(this.value);
        const today = new Date();

        let age = today.getFullYear() - dob.getFullYear();

        const month = today.getMonth() - dob.getMonth();

        if (
            month < 0 ||
            (month === 0 && today.getDate() < dob.getDate())
        ) {
            age--;
        }

        ageInput.value = age;

    });

}