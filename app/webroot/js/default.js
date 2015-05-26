$(document).ready(function() {
    // Quitar link a active
    var active = $("ul.breadcrumb li.active a").text();
    $("ul.breadcrumb li.active").html(active);
})