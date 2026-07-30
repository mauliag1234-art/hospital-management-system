// =====================================
// MEDICORE HOSPITAL BILLING JAVASCRIPT
// =====================================

// Amount Validation
function validateBill() {

    let amount = document.getElementById("amount").value;

    if (amount <= 0) {
        alert("Amount should be greater than 0");
        return false;
    }

    return true;
}

// Print Bill
function printBill() {
    window.print();
}

// Success Message
function billSaved() {
    alert("✅ Bill Saved Successfully!");
}