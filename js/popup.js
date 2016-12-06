$(document).ready(function () {
    $("#setCookie").click(function () {
        $.cookie("popup", "24house", {expires: 0});
        $("#bg_popup").hide();
    });

    if ($.cookie("popup") == null) {
        setTimeout(function () {
            $("#bg_popup").show();
        }, 15000)
    }
    else {
        $("#bg_popup").hide();
    }
});