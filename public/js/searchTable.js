function searchTable(idTable) {
    // Declare variables
    let input, filter, table, tr, td, i, txtValue, td2, txtValue2;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById(idTable);
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        td2 = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            txtValue2 = td2.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function myFunction(idTable) {
    var input = document.getElementById("search");
    var filter = input.value.toUpperCase();
    var table = document.getElementById(idTable);
    var tr = table.getElementsByTagName("tr");
    for ( i = 0; i < tr.length; i++) {
        if (tr.textContent.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
