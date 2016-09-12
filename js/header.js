jQuery(document).ready(function( $ ) {

	$("#btnLogin").click(function (e) {
		e.preventDefault();
        $('#popUpLogin').show();
        $('#overlay').addClass('overlay');
    });

    $("#btnFermer").click(function (e) {
		e.preventDefault();
        $('#popUpLogin').hide();
        $('#overlay').removeClass('overlay');
    });
});