window.addEventListener("DOMContentLoaded", (event) => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById("datatablesSimple");
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
    const bannerdatatable = document.getElementById("bannerdatatable");
    if (bannerdatatable) {
        new simpleDatatables.DataTable(bannerdatatable);
    }
    const youtubedatatable = document.getElementById("youtubedatatable");
    if (youtubedatatable) {
        new simpleDatatables.DataTable(youtubedatatable);
    }
});
