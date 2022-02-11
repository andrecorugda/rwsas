$(document).ready(function() {
    $('#locations').DataTable();
    $('#signages').DataTable();
});

function tab(value){
    window.location.href = `dashboard?tab=${value}`;
}