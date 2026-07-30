// Search Ward

const search = document.getElementById("searchWard");

if(search){

search.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

let rows=document.querySelectorAll("tbody tr");

rows.forEach(function(row){

row.style.display=row.innerText.toLowerCase().includes(value)?"":"none";

});

});

}

// Delete Confirmation

function deleteWard(){

return confirm("Are you sure you want to delete this ward?");

}