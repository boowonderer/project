$(document).ready(function() {
    $("#formButton").click(function() {
        const form = $("#form1")[0];
        form.style.display = form.style.display === "flex" ? "none" : "flex";
    });
});
