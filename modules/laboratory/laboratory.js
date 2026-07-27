document.addEventListener("DOMContentLoaded", function () {

    // Delete Confirmation
    document.querySelectorAll(".btn-danger").forEach(function(btn){
        btn.addEventListener("click", function(e){
            if(!confirm("Are you sure you want to delete this laboratory test?")){
                e.preventDefault();
            }
        });
    });

    // Auto Hide Alerts
    setTimeout(function(){

        let alerts=document.querySelectorAll(".alert");

        alerts.forEach(function(alert){
            alert.style.display="none";
        });

    },3000);

    // Search Table
    let search=document.getElementById("searchInput");

    if(search){

        search.addEventListener("keyup",function(){

            let value=this.value.toLowerCase();

            document.querySelectorAll("tbody tr").forEach(function(row){

                row.style.display=row.innerText.toLowerCase().includes(value) ? "" : "none";

            });

        });

    }

});